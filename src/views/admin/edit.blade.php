@extends('multiauth::adminLayouts.app')
@section('title', 'تعديل مستخدم')
@section('breadcrumb')
<a class="breadcrumb-item" href="{{ route('admin.home') }}">لوحة التحكم</a>
<a class="breadcrumb-item" href="">المستخدمين</a>
<span class="breadcrumb-item active">تعديل مستخدم</span>
@endsection

@section('pagetitle','تعديل مستخدم')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تعديل المستخدم {{$admin->name}}</div>

                <div class="card-body">
                    @include('multiauth::message')
                    <form action="{{route('admin.update',[$admin->id])}}" method="post">
                        @csrf @method('patch')
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">الاسم</label>
                            <input type="text" value="{{ $admin->name }}" name="name" class="form-control col-md-6" id="role">
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">البريد الإلكتروني</label>
                            <input type="text" value="{{ $admin->email }}" name="email" class="form-control col-md-6" id="role">
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">كلمة المرور</label>
                            <input type="password" value="" name="password" class="form-control col-md-6" id="password">
                        </div>

                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">تخصيص وظيفة</label>

                            <select name="role_id[]" id="role_id" class="form-control col-md-6 {{ $errors->has('role_id') ? ' is-invalid' : '' }}" multiple>
                                <option disabled>اختر وظيفة</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @if (in_array($role->id,$admin->roles->pluck('id')->toArray()))
                                    selected
                                    @endif >{{ $role->name }}
                                </option>
                                @endforeach
                            </select>

                            @if ($errors->has('role_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('role_id') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="active" class="col-md-4 col-form-label text-md-right">نشيط</label>
                            <input type="checkbox" value="1" {{ $admin->active ? 'checked':'' }} name="activation" class="form-control col-md-6" id="active">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    تعديل
                                </button>
                                <a href="{{ route('admin.show') }}" class="btn btn-danger btn-sm float-left">عودة</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection