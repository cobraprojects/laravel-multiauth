@extends('multiauth::adminLayouts.app')
@section('title', 'الوظائف')

@section('breadcrumb')
<a class="breadcrumb-item" href="{{ route('admin.home') }}">لوحة التحكم</a>
<span class="breadcrumb-item active">الوظائف والصلاحيات</span>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    الوظائف
                    @permitTo('CreateRole')
                    <span class="float-left">
                        <a href="{{ route('admin.role.create') }}" class="btn btn-sm btn-success">وظيفة جديدة</a>
                    </span>
                    @endpermitTo
                </div>

                <div class="card-body">
                    @include('multiauth::message')
                    <ol class="list-group">
                        @foreach ($roles as $role)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $role->name }}
                            <span class="badge badge-primary badge-pill">{{ $role->admins->count() }}
                                مستخدم </span>
                            <span class="badge badge-warning badge-pill">{{ $role->permissions->count() }}
                                الصلاحيات</span>
                            <div class="float-left">
                                @permitTo('DeleteRole,UpdateRole')
                                <a href="" class="btn btn-sm btn-secondary ml-3"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">حذف</a>
                                <form id="delete-form-{{ $role->id }}" action="{{ route('admin.role.delete',$role->id) }}" method="POST" style="display: none;">
                                    @csrf @method('delete')
                                </form>
                                @endpermitTo

                                @permitTo('UpdateRole')
                                <a href="{{ route('admin.role.edit',$role->id) }}" class="btn btn-sm btn-primary mr-3">تعديل</a>
                                @endpermitTo
                            </div>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection