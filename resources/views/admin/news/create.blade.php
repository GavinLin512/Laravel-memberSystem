@extends('layouts.app')

@section('page-title', '新增最新消息資料')

@section('css')
    <link rel="stylesheet" href="#">
@endsection

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ asset('admin/home') }}">首頁</a></li>
                <li class="breadcrumb-item"><a href="{{ asset('admin/news') }}">最新消息</a></li>
                <li class="breadcrumb-item active" aria-current="page">新增最新消息資料</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ __('新增最新消息') }}</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ asset('/admin/news/store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="type">{{ __('分類') }}</label>
                                <select class="form-control" id="type" name="type">
                                    @foreach ($type as $key => $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="publish_date">{{ __('日期') }}</label>
                                <input id="publish_date" type="date" class="form-control " name="publish_date" required
                                    autocomplete="publish_date" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('標題') }}</label>
                                <input id="title" type="text" class="form-control " name="title" required
                                    autocomplete="title" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="img">{{ __('圖片') }}</label>
                                <input id="img" type="file" class="form-control " name="img" required
                                    autocomplete="img" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="content">{{ __('內容') }}</label>
                                <textarea class="form-control" id="content" rows="8" name="content"></textarea>
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
