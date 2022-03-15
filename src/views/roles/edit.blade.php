@extends('multiauth::adminLayouts.app')
@section('title', 'تعديل وظيفة')

@section('breadcrumb')
<a class="breadcrumb-item" href="{{ route('admin.home') }}">لوحة التحكم</a>
<a class="breadcrumb-item" href="">الوظائف والصلاحيات</a>
<span class="breadcrumb-item active">تعديل وظيفة</span>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تعديل وظيفة</div>

                <div class="card-body">
                    <form action="{{ route('admin.role.update', $role->id) }}" method="post">
                        @csrf @method('patch')
                        <div class="form-group">
                            <label for="role">اسم الوظيفة</label>
                            <input type="text" value="{{ $role->name }}" name="name" class="form-control" id="role">
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
                                        <input type="checkbox" name="permissions[]" class="form-control" @if(in_array($permission->id,$role->permissions->pluck('id')->toArray()))
                                        checked
                                        @endif
                                        value="{{$permission->id}}" id="{{$permission->id}}">
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">تعديل</button>
                        <a href="{{ route('admin.roles') }}" class="btn btn-danger btn-sm float-left">عودة</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection