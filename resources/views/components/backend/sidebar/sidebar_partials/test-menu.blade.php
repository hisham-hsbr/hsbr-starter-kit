<x-backend.sidebar.sidebar-level-single navTitle="Test"
    menu_open="{{ request()->is('admin/test/demos*') ? 'menu-open' : '' }}"
    active="{{ request()->is('admin/test/demos*') ? 'active' : '' }}" :angleLeft="true" navBadge="" navBadgeClass=""
    navIcon="fas fa-users">
    <x-backend.sidebar.sidebar-level-multi navTitle="Demo 1"
        menu_open="{{ request()->is('admin/test/demos') ? 'menu-open' : '' }}"
        active="{{ request()->is('admin/test/demos*') ? 'active' : '' }}" :angleLeft="false" navBadge=""
        navBadgeClass="" navIcon="fas fa-bolt" href="{{ route('test.demos.index') }}">
    </x-backend.sidebar.sidebar-level-multi>
</x-backend.sidebar.sidebar-level-single>
