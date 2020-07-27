<div class="kt-mainpanel">
    <div class="kt-pagetitle">
        <h5>@yield('pagetitle')</h5>
    </div>

    <div class="kt-pagebody">
        @include('multiauth::adminLayouts.parts.messages')
        @yield('content')

    </div>
</div>