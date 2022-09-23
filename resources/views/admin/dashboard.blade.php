@extends('admin.layouts.main')
@section('style')
    <style>
        body {
            height: 100vh;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        @include('admin.inc.validation_message')
        @include('admin.inc.auth_message')
        <div class="col-lg-12 position-relative z-index-2">
            <div class="card card-plain mb-4">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                                <h2 class="font-weight-bolder mb-0">Dashboard</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
