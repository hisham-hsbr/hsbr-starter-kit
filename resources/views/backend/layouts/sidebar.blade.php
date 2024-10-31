<div class="main-menu">
    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="index.html" class="logo-light">
            <img src="{{ asset('backend/dashtrap/assets/images/logo-light.png') }}" alt="logo" class="logo-lg"
                height="28">
            <img src="{{ asset('backend/dashtrap/assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm"
                height="28">
        </a>

        <!-- Brand Logo Dark -->
        <a href="index.html" class="logo-dark">
            <img src="{{ asset('backend/dashtrap/assets/images/logo-dark.png') }}" alt="dark logo" class="logo-lg"
                height="28">
            <img src="{{ asset('backend/dashtrap/assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm"
                height="28">
        </a>
    </div>

    <!--- Menu -->
    <div data-simplebar>
        <ul class="app-menu">

            <x-backend.sidebar.sidebar_partials.app-menu />
            <x-backend.sidebar.menu-title menuTitle="User" />
            <x-backend.sidebar.menu-item menuName="User" menuBadge="" menuIcon="bx bx-calendar"
                menuHref="{{ route('backend.dashboard') }}" />
            <x-backend.sidebar.menu-item-group menuName="My New" menuBadge="" menuIcon="bx bx-file">
                <x-backend.sidebar.menu-item-single itemName="My New" itemBadge="23" itemIcon="bx bx-calendar"
                    itemHref="/" />
            </x-backend.sidebar.menu-item-group>


        </ul>
    </div>
</div>
