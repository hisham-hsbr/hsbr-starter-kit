<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="{{ asset('backend/admin_lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="pb-3 mt-3 mb-3 user-panel d-flex">
            <div class="image">
                <img src="{{ asset('backend/admin_lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <x-backend.sidebar.sidebar-nav-header navHeader="Admin" />

                <x-backend.sidebar.sidebar-level-single navTitle="Home"
                    menu_open="{{ request()->is('admin/dashboard') ? 'menu-open' : '' }}"
                    active="{{ request()->is('admin/dashboard') ? 'active' : '' }}" :angleLeft="false" navBadge=""
                    href="{{ route('backend.dashboard') }}" navBadgeClass="" navIcon="fas fa-home" />


                <x-backend.sidebar.sidebar-level-single navTitle="Admin"
                    menu_open="{{ request()->is('admin/dashboard/*') ? 'menu-open' : '' }}"
                    active="{{ request()->is('admin/dashboard/*') ? 'active' : '' }}" :angleLeft="true" navBadge=""
                    navBadgeClass="" navIcon="fas fa-users">
                    <x-backend.sidebar.sidebar-level-multi navTitle="Two"
                        menu_open="{{ request()->is('admin/dashboard') ? 'menu-open' : '' }}"
                        active="{{ request()->is('admin/dashboard') ? 'active' : '' }}" :angleLeft="true" navBadge=""
                        navBadgeClass="" navIcon="fas fa-bolt">
                        <x-backend.sidebar.sidebar-level-multi navTitle="Three" :active="true" :angleLeft="true"
                            navBadge="" navBadgeClass="" navIcon="fas fa-bowling-ball">
                            <x-backend.sidebar.sidebar-level-multi navTitle="Four" :angleLeft="true" navBadge=""
                                navBadgeClass="" navIcon="fas fa-bookmark">
                                <x-backend.sidebar.sidebar-level-multi navTitle="Five" :angleLeft="true" navBadge=""
                                    navBadgeClass="" navIcon="fas fa-prescription-bottle">
                                    <x-backend.sidebar.sidebar-level-multi navTitle="Six" :angleLeft="true"
                                        navBadge="" navBadgeClass="" navIcon="fas fa-prescription-bottle">
                                        <x-backend.sidebar.sidebar-level-multi navTitle="Seven" :angleLeft="false"
                                            navBadge="" navBadgeClass="" navIcon="fas fa-prescription-bottle">
                                        </x-backend.sidebar.sidebar-level-multi>
                                    </x-backend.sidebar.sidebar-level-multi>
                                </x-backend.sidebar.sidebar-level-multi>
                            </x-backend.sidebar.sidebar-level-multi>
                        </x-backend.sidebar.sidebar-level-multi>
                    </x-backend.sidebar.sidebar-level-multi>
                </x-backend.sidebar.sidebar-level-single>

                <x-backend.sidebar.sidebar_partials.test-menu />


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
