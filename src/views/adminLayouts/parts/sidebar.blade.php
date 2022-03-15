<!-- ##### SIDEBAR LOGO ##### -->
<div class="kt-sideleft-header">
    <div class="kt-logo"><a href="/" target="_blank">{{ config('app.name') }}</a></div>
    <div id="ktDate" class="kt-date-today"></div>
    <div class="input-group kt-input-search">
        <input type="text" class="form-control" placeholder="بحث ...">
        <span class="input-group-btn mg-0">
            <button class="btn"><i class="fa fa-search"></i></button>
        </span>
    </div><!-- input-group -->
</div><!-- kt-sideleft-header -->

<!-- ##### SIDEBAR MENU ##### -->
@php($routeName = Str::of(Route::currentRouteName())->explode('.'))
<div class="kt-sideleft">
    <label class="kt-sidebar-label">القائمة</label>
    <ul class="nav kt-sideleft-menu">
        {{--لوحة التحكم--}}
        <li class="nav-item">
            <a href="{{ route('admin.home') }}" class="nav-link {{ $routeName->contains('dashboard') ? 'active' : '' }}">
                <i class="fa fa-home"></i>
                <span>لوحة التحكم</span>
            </a>
        </li><!-- nav-item -->

        {{--ادارة المستخدمين--}}
        @permitTo('ReadAdmin')
        <li class="nav-item">
            <a href="" class="nav-link with-sub {{ $routeName->contains('roles')||$routeName->contains('role')||request()->routeIs('admin.show') ? 'active' : '' }}">
                <i class="fa fa-users"></i>
                <span>إدارةالمستخدمين</span>
            </a>
            <ul class="nav-sub">
                @permitTo('ReadRole')
                <li class="nav-item"><a href="{{ route('admin.roles') }}"
                        class="nav-link {{ $routeName->contains('roles')||$routeName->contains('roles') ? 'active' : '' }}">الوظائف والصلاحيات</a></li>
                @endpermitTo
                <li class="nav-item"><a href="{{ route('admin.show') }}" class="nav-link {{ request()->routeIs('admin.show') ? 'active' : '' }} ">المستخدمين</a></li>
            </ul>
        </li><!-- nav-item -->
        @endpermitTo
    </ul>
</div><!-- kt-sideleft -->