<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | لوحة التحكم</title>

    <!-- Styles -->
    <link href="{{ asset('vendor/multiauth/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/multiauth/css/katniss.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Cairo&amp;subset=arabic" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/multiauth/css/rtl.css') }}">
</head>

<body class="rtl">
    <div class="signpanel-wrapper">
        <div class="signbox">
            <div class="signbox-header">
                <h4>لوحة التحكم</h4>
                <p class="mg-b-0">{{ config('app.name') }}</p>
            </div><!-- signbox-header -->

            <div class="signbox-body">
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">البريد الإلكتروني:</label>
                        <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required
                            autofocus>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label class="form-control-label">كلمة المرور:</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div><!-- form-group -->
                    <div class="form-group">
                    </div><!-- form-group -->
                    <button class="btn btn-dark btn-block">تسجيل الدخول</button>
                </form>
            </div><!-- signbox-body -->
        </div><!-- signbox -->
    </div><!-- signpanel-wrapper -->
</body>

</html>