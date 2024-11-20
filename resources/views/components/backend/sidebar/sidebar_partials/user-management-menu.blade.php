<x-backend.sidebar.sidebar-level-single navTitle="User Management"
    menu_open="{{ request()->is('admin/user-management/*') ? 'menu-open' : '' }}"
    active="{{ request()->is('admin/user-management/*') ? 'active' : '' }}" :angleLeft="true" navBadge=""
    navBadgeClass="" navIcon="fas fa-users">
    <x-backend.sidebar.sidebar-level-multi navTitle="Users"
        menu_open="{{ request()->is('admin/user-management/users*') ? 'menu-open' : '' }}"
        active="{{ request()->is('admin/user-management/users*') ? 'active' : '' }}" :angleLeft="false" navBadge=""
        navBadgeClass="" navIcon="fas fa-bolt" href="{{ route('users.index') }}">
    </x-backend.sidebar.sidebar-level-multi>
    <x-backend.sidebar.sidebar-level-multi navTitle="Settings"
        menu_open="{{ request()->is('admin/user-management/settings/*') ? 'menu-open' : '' }}"
        active="{{ request()->is('admin/user-management/settings/*') ? 'active' : '' }}" :angleLeft="true"
        navBadge="" navBadgeClass="" navIcon="fas fa-gears" href="">
        <x-backend.sidebar.sidebar-level-multi navTitle="General Settings"
            menu_open="{{ request()->is('admin/user-management/settings/general-settings*') ? 'menu-open' : '' }}"
            active="{{ request()->is('admin/user-management/settings/general-settings*') ? 'active' : '' }}"
            :angleLeft="false" navBadge="" navBadgeClass="" navIcon="fas fa-gear"
            href="{{ route('settings.general.settings') }}">
        </x-backend.sidebar.sidebar-level-multi>
    </x-backend.sidebar.sidebar-level-multi>
</x-backend.sidebar.sidebar-level-single>
