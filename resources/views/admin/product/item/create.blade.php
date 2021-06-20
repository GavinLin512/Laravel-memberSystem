@extends('layouts.app')

@section('page-title', '新增產品品項資料')

@section('css')
    <link rel="stylesheet" href="#">
@endsection

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ asset('admin/home') }}">首頁</a></li>
                <li class="breadcrumb-item active" aria-current="page">產品管理</li>
                <li class="breadcrumb-item"><a href="{{ asset('admin/product/item') }}">產品品項</a></li>
                <li class="breadcrumb-item active" aria-current="page">新增產品品項</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ __('新增產品品項') }}</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ asset('/admin/product/item/store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="product_type_id">{{ __('產品種類') }}</label>
                                    <select class="form-control" id="product_type_id" name="product_type_id">
                                        @foreach ($type as $item)
                                            <option value="{{ $item->id }}">{{ $item->type_name }}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="form-group">
                                <label for="product_name" >{{ __('產品品項名稱') }}</label>
                                    <input id="product_name" type="text" class="form-control " name="product_name" required
                                        autocomplete="product_name" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="price" >{{ __('產品品項價錢') }}</label>
                                    <input id="price" type="number" class="form-control " name="price" required
                                        autocomplete="price" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="photos" >{{ __('產品品項圖片') }}</label>
                                    <input id="photos" type="file" multiple class="form-control " name="photos[]" required
                                        autocomplete="photos" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="discript">{{ __('產品品項描述') }}</label>
                                <textarea class="form-control" id="discript" rows="8" name="discript"></textarea>
                              </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('新增') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
