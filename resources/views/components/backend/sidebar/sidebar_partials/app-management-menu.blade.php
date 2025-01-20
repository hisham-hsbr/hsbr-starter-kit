    <x-backend.sidebar.sidebar-level-single navTitle="App Management"
        menu_open="{{ request()->is('admin/app-management/*') ? 'menu-open' : '' }}"
        active="{{ request()->is('admin/app-management/*') ? 'active' : '' }}" :angleLeft="true" navBadge=""
        navBadgeClass="" navIcon="fas fa-sliders">
        @can('App Config Read')
            <x-backend.sidebar.sidebar-level-multi navTitle="App Config"
                menu_open="{{ request()->is('admin/app-management/app-config*') ? 'menu-open' : '' }}"
                active="{{ request()->is('admin/app-management/app-config*') ? 'active' : '' }}" :angleLeft="false"
                navBadge="" navBadgeClass="" navIcon="fa fa-screwdriver-wrench" href="{{ route('backups.index') }}">
            </x-backend.sidebar.sidebar-level-multi>
        @endcan
        @can('Backup Read')
            <x-backend.sidebar.sidebar-level-multi navTitle="Backup"
                menu_open="{{ request()->is('admin/app-management/backups*') ? 'menu-open' : '' }}"
                active="{{ request()->is('admin/app-management/backups*') ? 'active' : '' }}" :angleLeft="false"
                navBadge="" navBadgeClass="" navIcon="fas fa-database" href="{{ route('backups.index') }}">
            </x-backend.sidebar.sidebar-level-multi>
        @endcan
        @can('Queue Read')
            <x-backend.sidebar.sidebar-level-multi navTitle="Queue"
                menu_open="{{ request()->is('admin/app-management/queues*') ? 'menu-open' : '' }}"
                active="{{ request()->is('admin/app-management/queues*') ? 'active' : '' }}" :angleLeft="false"
                navBadge="" navBadgeClass="" navIcon="fas fa-tasks" href="{{ route('queues.index') }}">
            </x-backend.sidebar.sidebar-level-multi>
        @endcan
    </x-backend.sidebar.sidebar-level-single>
