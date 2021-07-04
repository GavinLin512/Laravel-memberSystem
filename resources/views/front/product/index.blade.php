@extends('layouts.template')

@section('title', '產品列表')

@section('css')
    <style>
        .product-img {
            width: 100%;
            height: 250px;
            background-size: cover;
            background-position: center;
        }

    </style>

@endsection

@section('main')
    <div class="row mb-4">
        <a href="{{ '/product' }}" class="btn btn-outline-success mr-2">All</a>
        @foreach ($types as $type)
            <a href="/product?type_id={{ $type->id }}" class="btn btn-outline-success mr-2">{{ $type->type_name }}</a>
        @endforeach
        @foreach ($products as $product)
    </div>
    <div class="row  d-flex justify-content-between">
            <div class="card" style="width: 18rem;">
                <div class="product-img" style="background-image: url('{{ asset($product->photo) }}')"></div>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="card-text">{{ $product->discript }}</p>
                    <a href="#" class="btn btn-primary">新增到購物車</a>
                </div>
            </div>
        @endforeach

    </div>

@endsection

@section('js')

@endsection
