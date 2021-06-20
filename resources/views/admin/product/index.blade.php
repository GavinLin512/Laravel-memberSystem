@extends('layouts.app')

@section('page-title', '產品管理頁面')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product_index.css') }}">
@endsection

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ asset('admin/home') }}">首頁</a></li>
              <li class="breadcrumb-item active" aria-current="page">產品管理</li>
            </ol>
          </nav>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{ __('標題') }}</h2></div>

                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection



