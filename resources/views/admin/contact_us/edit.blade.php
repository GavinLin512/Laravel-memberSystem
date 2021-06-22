@extends('layouts.app')

@section('page-title', '聯絡我們查看頁面')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/news_index.css') }}">
@endsection

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('admin/home') }}">首頁</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('admin/contact_us') }}">聯絡我們</a></li>
            <li class="breadcrumb-item active" aria-current="page">查看聯絡我們</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('查看聯絡我們') }}</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ asset('/admin/contact_us/update') }}/{{ $record->id }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('姓名') }}</label>
                            <input id="name" type="text" class="form-control " name="name" value="{{ $record->name }}"
                                autocomplete="name" readonly autofocus>
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('信箱') }}</label>
                            <input id="email" type="text" class="form-control " name="email" value="{{ $record->email }}"
                                autocomplete="email" readonly autofocus>
                        </div>

                        <div class="form-group">
                            <label for="subject">{{ __('主旨') }}</label>
                            <input id="subject" type="text" class="form-control " name="subject" value="{{ $record->subject }}"
                                autocomplete="subject" readonly autofocus>
                        </div>

                        <div class="form-group">
                            <label for="message_return">{{ __('訊息') }}</label>
                            <textarea class="form-control" id="message_return" rows="8" name="message_return">{{ $record->message_return }}</textarea>
                        </div>

                        <div class="form-group mb-0">
                            <a href="{{ asset('/admin/contact_us') }}"  class="btn btn-primary">
                                {{ __('返回') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
