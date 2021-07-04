@extends('layouts.app')

@section('page-title', '編輯產品品項資料')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/product_edit.css') }}">
@endsection

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ asset('admin/home') }}">首頁</a></li>
                <li class="breadcrumb-item active" aria-current="page">產品管理</li>
                <li class="breadcrumb-item"><a href="{{ asset('admin/product/item') }}">產品品項</a></li>
                <li class="breadcrumb-item active" aria-current="page">編輯產品品項</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ __('編輯產品品項') }}</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ asset('/admin/product/item/update') }}/{{ $record->id }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="type_name">{{ __('產品種類') }}</label>
                                <select class="form-control" id="type_name" name="product_type_id">
                                    @foreach ($type as $item)
                                        <option @if ($item->id == $record->product_type_id) selected @endif value="{{ $item->id }}">
                                            {{ $item->type_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product_name">{{ __('產品品項名稱') }}</label>
                                <input id="product_name" type="text" class="form-control " name="product_name"
                                    value="{{ $record->product_name }}" required autocomplete="product_name" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="price">{{ __('產品品項價錢') }}</label>
                                <input id="price" type="number" class="form-control " name="price"
                                    value="{{ $record->price }}" required autocomplete="price" autofocus>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-12" for="">{{ __('產品主要圖片') }}</label>
                                <div class="col-md-3">
                                    <img class="w-100" src="{{ $record->photo }}" alt="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="photo">{{ __('修改產品主要圖片') }}</label>
                                <input id="photo" type="file" class="form-control " name="photo" autocomplete="photo"
                                    autofocus>
                            </div>
                            <hr>
                            {{-- 要讓使用者可以在編輯資料時刪除關聯的圖片 --}}
                            <div class="form-group d-flex flex-wrap">
                                <label class="col-12" for="">{{ __('產品其他圖片') }}</label>
                                @foreach ($record->photos as $photo)
                                    <div class="product-img" style="background-image: url({{ asset($photo->photo) }})">
                                        {{-- 點選到圖片刪除按鈕時，將該圖片的 ID 記錄下來，傳到後端 --}}
                                        {{-- 後端根據此 ID 找到該筆資料，進行刪除 --}}
                                        <div data-id="{{ $photo->id }}" class="del-img-btn">X</div>
                                        {{-- <img class="w-100" src="{{ $photo->photo }}" alt=""> --}}
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="photos">{{ __('新增產品其他圖片') }}</label>
                                <input id="photos" type="file" multiple class="form-control " name="photos[]"
                                    autocomplete="photos" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="discript">{{ __('產品品項描述') }}</label>
                                <textarea class="form-control" id="discript" rows="8"
                                    name="discript">{{ $record->discript }}</textarea>
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('編輯') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('.del-img-btn').click(function() {
            var id = $(this).attr('data-id');
            var parent_element = $(this).parent();
            // console.log(parent_element);
            var formdate = new FormData();
            // append('key', 'value')
            formdate.append('id', id);
            formdate.append('_token', '{{ csrf_token() }}')

            var yes = confirm('你確定要刪除這張圖片嗎？');
            // 送 POST 表單的時候會用 Form 表單送資料
            if (yes) {
                // fetch 格式
                // fetch('/admin/deleteImage',{
                //     'method': 'post'
                // }).then(function (response) {

                // }).then(function (result) {

                // })
                fetch('/admin/product/item/deleteImage', {
                    'method': 'post',
                    'body': formdate
                }).then(function(response) {
                    // console.log(response);
                    return response.text();
                }).then(function(result) {
                    if (result == 'sucess') {
                        // 前端畫面顯示
                        alert('刪除成功！');
                        parent_element.remove();
                    }
                });
            }
        })

        // js
        // var delBtns = document.querySelectorAll('.del-img-btn');
        // delBtns.forEach(function(delBtn) {
        //     delBtn.addEventListener('click', function() {
        //         var id = this.getAttribute('data-id');
        //         var parentElement = this.parentElement;
        //         var formData = new FormData();
        //         formData.append('_token', '{{ csrf_token() }}');
        //         formData.append('id', id);

        //         fetch('/admin/product/item/deleteImage', {
        //                 'method': 'POST',
        //                 'body': formData
        //             })
        //             .then(function(response) {
        //                 return response.text();
        //             })
        //             .then(function(result) {
        //                 if (result == 'success') {
        //                     alert('刪除成功');
        //                     parentElement.remove();
        //                 }
        //             })
        //     });
        // });
    </script>
@endsection
