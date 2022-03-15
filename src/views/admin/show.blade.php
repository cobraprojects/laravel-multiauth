@extends('multiauth::adminLayouts.app')
@section('title', 'المستخدمين')
@section('breadcrumb')
<a class="breadcrumb-item" href="{{ route('admin.home') }}">لوحة التحكم</a>
<span class="breadcrumb-item active">المستخدمين</span>
@endsection

@section('pagetitle','المستخدمين')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    قائمة المستخدمين
                    <span class="float-left">
                        <a href="{{route('admin.register')}}" class="btn btn-sm btn-success">اضافة مستخدم جديد</a>
                    </span>
                </div>
                <div class="card-body">
                    @include('multiauth::message')
                    <ul class="list-group">
                        @foreach ($admins as $admin)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $admin->name }}
                            <span class="badge">
                                @foreach ($admin->roles as $role)
                                <span class="badge-warning badge-pill ml-2">
                                    {{ $role->name }}
                                </span> @endforeach
                            </span>
                            {{ $admin->active? 'نشيط' : 'غير نشيط' }}
                            <div class="float-right">
                                <a href="{{route('admin.edit',[$admin->id])}}" class="btn btn-sm btn-primary ml-3">تعديل</a>

                                <a href="#" class="btn btn-sm btn-danger ml-3"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();">حذف</a>
                                <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete',[$admin->id]) }}" method="POST" style="display: none;">
                                    @csrf @method('delete')
                                </form>
                            </div>
                        </li>
                        @endforeach
                        @if($admins->count()==0)
                        <p>لا يوجد مستخدمين مسجلين</p>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection