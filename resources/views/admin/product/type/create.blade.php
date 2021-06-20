@extends('layouts.app')

@section('page-title', '新增產品種類資料')

@section('css')
    <link rel="stylesheet" href="#">
@endsection

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ asset('admin/home') }}">首頁</a></li>
                <li class="breadcrumb-item active" aria-current="page">產品管理</li>
                <li class="breadcrumb-item"><a href="{{ asset('admin/product/type') }}">產品種類</a></li>
                <li class="breadcrumb-item active" aria-current="page">新增產品種類</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ __('新增產品種類') }}</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ asset('/admin/product/type/store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="type_name" class="col-md-4 col-form-label text-md-right">{{ __('產品種類名稱') }}</label>

                                <div class="col-md-6">
                                    <input id="type_name" type="text" class="form-control " name="type_name" required autocomplete="type_name" autofocus>

                                    {{-- @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
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
