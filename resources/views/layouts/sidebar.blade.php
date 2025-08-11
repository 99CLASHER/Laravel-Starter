<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header bg-primary">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('dashboard') }}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0 text-white">SwiftReviews</h2>


                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                @can('view-dashboard')
                <li class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class=""><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>
                @endcan
                @can('view-role')
                <li class="nav-item {{ Route::is('roles.*') ? 'active' : '' }}">
                    <a href="/roles"><i class="fa fa-gears"></i><span class="menu-title" data-i18n="Roles">Roles</span></a>
                </li>
                @endcan
                @can('view-user')
                <li class="nav-item {{ Route::is('users.*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}"><i class="fa fa-users"></i><span class="menu-title" data-i18n="Roles">Users</span></a>
                </li>
                @endcan

{{--            <li class=" navigation-header"><span>Apps</span>--}}
{{--            </li>--}}
{{--            <li class=" nav-item"><a href="app-email.html"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Email">Email</span></a>--}}
{{--            </li>--}}

{{--            <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">User</span></a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li><a href="app-user-list.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">List</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="app-user-view.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">View</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="app-user-edit.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Edit</span></a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

        </ul>
    </div>
</div>
