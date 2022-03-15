<!-- ##### HEAD PANEL ##### -->
<div class="kt-headpanel">
    <div class="kt-headpanel-left">
        <a id="naviconMenu" href="" class="kt-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
        <a id="naviconMenuMobile" href="" class="kt-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
    </div><!-- kt-headpanel-left -->

    <div class="kt-headpanel-right">
        {{-- <div class="dropdown dropdown-notification">
            <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                <i class="icon ion-ios-bell-outline tx-24"></i>
                <!-- start: if statement -->
                <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
                <!-- end: if statement -->
            </a>
            <div class="dropdown-menu wd-300 pd-0-force">
                <div class="dropdown-menu-header">
                    <label>Notifications</label>
                    <a href="">Mark All as Read</a>
                </div><!-- d-flex -->

                <div class="media-list">
                    <!-- loop starts here -->
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0"><strong class="tx-medium">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                                <span class="tx-12">October 03, 2017 8:45am</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <!-- loop ends here -->
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0"><strong class="tx-medium">Mellisa Brown</strong> appreciated your work <strong class="tx-medium">The Social Network</strong></p>
                                <span class="tx-12">October 02, 2017 12:44am</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0">20+ new items added are for sale in your <strong class="tx-medium">Sale Group</strong></p>
                                <span class="tx-12">October 01, 2017 10:20pm</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0"><strong class="tx-medium">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium">Ronnie Mara</strong></p>
                                <span class="tx-12">October 01, 2017 6:08pm</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <div class="media-list-footer">
                        <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Notifications</a>
                    </div>
                </div><!-- media-list -->
            </div><!-- dropdown-menu -->
        </div><!-- dropdown --> --}}
        <div class="dropdown dropdown-profile">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                {{-- <img src="{{ asset('img/img3.jpg') }}" class="wd-32 rounded-circle" alt="">
                <span class="px-1"></span> --}}
                <span class="logged-name"><span class="hidden-xs-down">{{ Auth::check()?Auth::user()->name:'' }}</span><span class="px-1"></span><i
                        class="fa fa-angle-down mg-l-3"></i></span>
            </a>
            <div class="dropdown-menu wd-200">
                <ul class="list-unstyled user-profile-nav">
                    {{-- <li><a href=""><i class="icon ion-ios-person-outline"></i> الملف الشخصي</a></li>
                    <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                    <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
                    <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li> --}}
                    <li><a href="{{ route('admin.password.change') }}"><i class="icon ion-ios-locked-outline"></i> تغيير كلمة المرور</a></li>
                    <li><a href="#"><i class="icon ion-ios-gear-outline"></i> الإعدادات</a></li>
                    <li>
                        <a href="#" class="" onclick="event.preventDefault(); document.getElementById('logout').submit();"><i class="icon ion-power"></i> نسجيل الخروج</a>
                        <form id="logout" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
    </div><!-- kt-headpanel-right -->
</div><!-- kt-headpanel -->

<div class="kt-breadcrumb">
    <nav class="breadcrumb">
        @section('breadcrumb')
        @show
    </nav>
</div><!-- kt-breadcrumb -->