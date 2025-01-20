<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <x-app.logo.logo_icon />
        <x-app.logo.logo />

        {{-- <span class="brand-text font-weight-light">HSBR-Apps</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        {{-- <div class="pb-3 mt-3 mb-3 user-panel d-flex">
            <div class="image">
                <img src="{{ asset('backend/admin_lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> --}}

        <!-- SidebarSearch Form -->
        <div class="pt-4 form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview"
                role="menu" data-accordion="false">

                <x-backend.sidebar.sidebar-nav-header navHeader="Admin" />

                <x-backend.sidebar.sidebar-level-single navTitle="Home" id="homeButton"
                    menu_open="{{ request()->is('admin/dashboard') ? 'menu-open' : '' }}"
                    active="{{ request()->is('admin/dashboard') ? 'active' : '' }}" :angleLeft="false" navBadge=""
                    href="{{ route('backend.dashboard') }}" navBadgeClass="" navIcon="fas fa-home" />
                @can('User Profile Edit')
                    <x-backend.sidebar.sidebar-level-single navTitle="Profile" id="profileButton"
                        menu_open="{{ request()->is('admin/profile') ? 'menu-open' : '' }}"
                        active="{{ request()->is('admin/profile') ? 'active' : '' }}" :angleLeft="false" navBadge=""
                        href="{{ route('user.profile.edit') }}" navBadgeClass="" navIcon="fas fa-user" />
                @endcan
                @canany(['User Read', 'Role Read', 'Permission Read', 'Activity Logs Read'])
                    <x-backend.sidebar.sidebar-nav-header navHeader="User Management" />
                    <x-backend.sidebar.sidebar_partials.user-management-menu />
                @endcanany
                @canany(['Backup Read'])
                    <x-backend.sidebar.sidebar-nav-header navHeader="App Management" />
                    <x-backend.sidebar.sidebar_partials.app-management-menu />
                @endcanany
                @can('Test Demo Read')
                    <x-backend.sidebar.sidebar_partials.test-menu />
                @endcanany

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="sidebar-custom">
        <a href="#" class="btn btn-link"><i class="fas fa-cogs"></i></a>
        <a href="#" class="btn btn-secondary hide-on-collapse pos-right">Help</a>
    </div>
    <!-- /.sidebar-custom -->
</aside>
