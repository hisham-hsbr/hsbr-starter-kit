<x-backend.sidebar.menu-title menuTitle="Menu" />
<x-backend.sidebar.menu-item menuName="Dashboard" menuBadge="" menuIcon="bx bx-calendar"
    menuHref="{{ route('backend.dashboard') }}" />
<x-backend.sidebar.menu-item-group menuName="My New" menuBadge="" menuIcon="bx bx-file" menuId="id1">
    <x-backend.sidebar.menu-item-single itemName="My New" itemBadge="23" itemIcon="bx bx-calendar" itemHref="/" />
</x-backend.sidebar.menu-item-group>
