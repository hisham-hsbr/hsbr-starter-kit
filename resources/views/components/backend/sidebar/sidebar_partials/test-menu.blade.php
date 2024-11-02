<x-backend.sidebar.menu-title menuTitle="Test" />
<x-backend.sidebar.menu-item menuName="Test" menuBadge="" menuIcon="bx bx-calendar"
    menuHref="{{ route('backend.dashboard') }}" />
<x-backend.sidebar.menu-item-group menuName="Test Demo" menuBadge="" menuIcon="bx bx-file" menuId="id2">
    <x-backend.sidebar.menu-item-single itemName="Index" itemBadge="23" itemIcon="bx bx-calendar"
        itemHref="{{ route('test-demos.index') }}" />
    <x-backend.sidebar.menu-item-single itemName="Create" itemBadge="23" itemIcon="bx bx-calendar"
        itemHref="{{ route('test-demos.create') }}" />
</x-backend.sidebar.menu-item-group>
