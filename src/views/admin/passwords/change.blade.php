@extends('multiauth::adminLayouts.app')
@section('title', 'تغيير كلمة المرور')
@section('breadcrumb')
<a class="breadcrumb-item" href="{{ route('admin.home') }}">لوحة التحكم</a>
<span class="breadcrumb-item active">تغيير كلمة المرور</span>
@endsection

@section('pagetitle','تغيير كلمة المرور')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تغيير كلمة المرور</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.password.change') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="oldPassword" class="col-md-4 col-form-label text-md-right">كلمة المرور الحالية</label>

                            <div class="col-md-6">
                                <input id="oldPassword" type="password" class="form-control{{ $errors->has('oldPassword') ? ' is-invalid' : '' }}" name="oldPassword"
                                    value="{{ $oldPassword ?? old('oldPassword') }}" required autofocus> @if ($errors->has('oldPassword'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('oldPassword') }}</strong>
                                </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">كلمة المرور الجديدة</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">تأكيد كلمة المرور</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    تغيير كلمة المرور
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