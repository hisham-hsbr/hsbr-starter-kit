<x-backend.sidebar.sidebar-level-single navTitle="User Management"
    menu_open="{{ request()->is('admin/user-management/*') ? 'menu-open' : '' }}"
    active="{{ request()->is('admin/user-management/*') ? 'active' : '' }}" :angleLeft="true" navBadge=""
    navBadgeClass="" navIcon="fas fa-users">
    <x-backend.sidebar.sidebar-level-multi navTitle="Users"
        menu_open="{{ request()->is('admin/user-management/users*') ? 'menu-open' : '' }}"
        active="{{ request()->is('admin/user-management/users*') ? 'active' : '' }}" :angleLeft="false" navBadge=""
        navBadgeClass="" navIcon="fas fa-bolt" href="{{ route('users.index') }}">
    </x-backend.sidebar.sidebar-level-multi>
</x-backend.sidebar.sidebar-level-single>
