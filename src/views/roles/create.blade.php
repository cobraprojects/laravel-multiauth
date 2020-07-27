@extends('multiauth::adminLayouts.app')
@section('title', 'اضافة وظيفة')

@section('breadcrumb')
<a class="breadcrumb-item" href="{{ route('admin.home') }}">لوحة التحكم</a>
<a class="breadcrumb-item" href="">الوظائف والصلاحيات</a>
<span class="breadcrumb-item active">اضافة وظيفة</span>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">اضافة وظيفة جديدة</div>

                <div class="card-body">
                    @include('multiauth::message')
                    <form action="{{ route('admin.role.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="role">اسم الوظيفة</label>
                            <input type="text" placeholder="Give an awesome name for role" name="name" class="form-control" id="role" required>
                        </div>
                        <div class="form-group">
                            <label for="role">تخصيص صلاحيات</label>
                            <div class="container">
                                @foreach($permissions as $key => $value)
                                <label for="role">{{$key}}</label>
                                <div class="d-flex justify-content-between">
                                    @foreach($value as $permission)
                                    <div class="form-group">
                                        <label for="{{$permission->id}}">{{$permission->name}}</label>
                                        <input type="checkbox" name="permissions[]" class="form-control" value="{{$permission->id}}" id="{{$permission->id}}">
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">حفظ</button>
                        <a href="{{ route('admin.roles') }}" class="btn btn-sm btn-danger float-left">عودة</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection