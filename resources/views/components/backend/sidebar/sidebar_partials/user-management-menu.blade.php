    <x-backend.sidebar.sidebar-level-single navTitle="User Management"
        menu_open="{{ request()->is('admin/user-management/*') ? 'menu-open' : '' }}"
        active="{{ request()->is('admin/user-management/*') ? 'active' : '' }}" :angleLeft="true" navBadge=""
        navBadgeClass="" navIcon="fas fa-users">
        @can('User Read')
            <x-backend.sidebar.sidebar-level-multi navTitle="Users"
                menu_open="{{ request()->is('admin/user-management/users*') ? 'menu-open' : '' }}"
                active="{{ request()->is('admin/user-management/users*') ? 'active' : '' }}" :angleLeft="false" navBadge=""
                navBadgeClass="" navIcon="fa fa-users" href="{{ route('users.index') }}">
            </x-backend.sidebar.sidebar-level-multi>
        @endcan
        @can('Role Read')
            <x-backend.sidebar.sidebar-level-multi navTitle="Roles"
                menu_open="{{ request()->is('admin/user-management/roles*') ? 'menu-open' : '' }}"
                active="{{ request()->is('admin/user-management/roles*') ? 'active' : '' }}" :angleLeft="false"
                navBadge="" navBadgeClass="" navIcon="fa fa-user-secret" href="{{ route('roles.index') }}">
            </x-backend.sidebar.sidebar-level-multi>
        @endcan
        @can('Permission Read')
            <x-backend.sidebar.sidebar-level-multi navTitle="Permissions"
                menu_open="{{ request()->is('admin/user-management/permissions*') ? 'menu-open' : '' }}"
                active="{{ request()->is('admin/user-management/permissions*') ? 'active' : '' }}" :angleLeft="false"
                navBadge="" navBadgeClass="" navIcon="fa fa-lock" href="{{ route('permissions.index') }}">
            </x-backend.sidebar.sidebar-level-multi>
        @endcan
        @can('Notification Read')
            <x-backend.sidebar.sidebar-level-multi navTitle="Notifications"
                menu_open="{{ request()->is('admin/user-management/notifications*') ? 'menu-open' : '' }}"
                active="{{ request()->is('admin/user-management/notifications*') ? 'active' : '' }}" :angleLeft="false"
                navBadge="" navBadgeClass="" navIcon="fa fa-bell" href="{{ route('notifications.index') }}">
            </x-backend.sidebar.sidebar-level-multi>
        @endcan
        @can('Activity Log Read')
            <x-backend.sidebar.sidebar-level-multi navTitle="Activity Logs"
                menu_open="{{ request()->is('admin/user-management/activity-logs*') ? 'menu-open' : '' }}"
                active="{{ request()->is('admin/user-management/activity-logs*') ? 'active' : '' }}" :angleLeft="false"
                navBadge="" navBadgeClass="" navIcon="fa fa-history" href="{{ route('activity.logs.index') }}">
            </x-backend.sidebar.sidebar-level-multi>
        @endcan
        @can('Settings Read')
            <x-backend.sidebar.sidebar-level-multi navTitle="Settings"
                menu_open="{{ request()->is('admin/user-management/settings/*') ? 'menu-open' : '' }}"
                active="{{ request()->is('admin/user-management/settings/*') ? 'active' : '' }}" :angleLeft="true"
                navBadge="" navBadgeClass="" navIcon="fas fa-gears" href="">
                @can('Settings General Read')
                    <x-backend.sidebar.sidebar-level-multi navTitle="General Settings"
                        menu_open="{{ request()->is('admin/user-management/settings/general-settings*') ? 'menu-open' : '' }}"
                        active="{{ request()->is('admin/user-management/settings/general-settings*') ? 'active' : '' }}"
                        :angleLeft="false" navBadge="" navBadgeClass="" navIcon="fas fa-gear"
                        href="{{ route('settings.general.settings') }}">
                    </x-backend.sidebar.sidebar-level-multi>
                @endcan
            </x-backend.sidebar.sidebar-level-multi>
        @endcan
    </x-backend.sidebar.sidebar-level-single>
