@extends('multiauth::adminLayouts.app')
@section('title', 'لوحة التحكم')
@section('breadcrumb')
<span class="breadcrumb-item active">لوحة التحكم</span>
@endsection

@section('pagetitle','أضافة مستخدم')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ucfirst(config('multiauth.prefix')) }} Dashboard</div>
                <div class="card-body">
                    @include('multiauth::message')
                    You are logged in to {{ config('multiauth.prefix') }} side!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection