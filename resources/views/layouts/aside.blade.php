<!-- begin::navigation -->
<div class="navigation">

    <!-- begin::logo -->
    <div id="logo">
        <a href="index.html">
            <img class="logo-dark" src="{{ asset('assets/media/image/logo.png') }}" alt="dark logo">
            <img class="logo-sm" src="{{ asset('assets/media/image/logo-sm.png') }}" alt="small logo">
        </a>
    </div>
    <!-- end::logo -->

    <!-- begin::navigation header -->
    <header class="navigation-header">
        <div>
            <h5>{{ $user->fullName }}</h5>
            <p class="text-muted line-height-20 m-b-25">{{ __('site.username') }} : {{ $user->username }}</p>
            <p class="text-muted line-height-20 m-b-25">{{ $curruntDate }}</p>
            <ul class="nav">
                <li class="nav-item">
                    <a href="{{ route('profile.index') }}" class="btn nav-link bg-info-bright" title="{{ __('site.profile') }}" data-toggle="tooltip">
                        <i data-feather="user"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="btn nav-link bg-danger-bright" title="{{ __('site.logout') }}" data-toggle="tooltip">
                        <i data-feather="log-out"></i>
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <!-- end::navigation header -->

    <!-- begin::navigation menu -->
    <div class="navigation-menu-body">
        <ul>
            {{--<li class="navigation-divider">اصلی</li>--}}
            {!! $menu !!}
        </ul>
    </div>
    <!-- end::navigation menu -->

</div>
<!-- end::navigation -->
