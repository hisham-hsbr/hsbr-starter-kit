<x-backend.sidebar.sidebar-level-single head="Techso" href="#"
    menu_open="{{ request()->is('admin/techso*') ? 'menu-open' : '' }}"
    active="{{ request()->is('admin/techso/*') ? 'active' : '' }}" menu_icon="fa fa-folder-open"
    drop_icon="fas fa-angle-left">

    @can('Service Read')
        <x-backend.sidebar.sidebar-level-multi head="Service" href="" menu_open=""
            active="{{ request()->is('admin/techso/services*') ? 'active' : '' }}" menu_icon="fa fa-toolbox"
            drop_icon="" />
    @endcan
    @can('Purchase Read')
        <x-backend.sidebar.sidebar-level-multi head="Purchase" href="" menu_open=""
            active="{{ request()->is('admin/techso/purchases*') ? 'active' : '' }}" menu_icon="fa fa-cart-shopping"
            drop_icon="" />
    @endcan
    @can('Sale Read')
        <x-backend.sidebar.sidebar-level-multi head="Sale" href="" menu_open=""
            active="{{ request()->is('admin/techso/sales*') ? 'active' : '' }}" menu_icon="fa fa-cart-shopping"
            drop_icon="" />
    @endcan
    {{-- @can('Image Controller Read')
        <x-backend.sidebar.sidebar-level-multi head="Image Controller" href="{{ route('images.index') }}"
            menu_open="" active="{{ request()->is('admin/techso/image*') ? 'active' : '' }}"
            menu_icon="fa fa-images" drop_icon="" />
    @endcan  --}}


    <!-- techso masters Start -->
    @canany(['Customer Read', 'Job Type Read', 'Work Status Read', 'Job Status Read', 'Complaint Read', 'Brand Read'])
        <x-backend.sidebar.sidebar-level-multi head="Masters" href="#"
            menu_open="{{ request()->is('admin/techso/masters*') ? 'menu-open' : '' }}"
            active="{{ request()->is('admin/techso/masters/*') ? 'active' : '' }}" menu_icon="fa fa-folder-tree"
            drop_icon="fas fa-angle-left">

            @can('Customer Read')
                <x-backend.sidebar.sidebar-level-multi head="Customers" href="" menu_open=""
                    active="{{ request()->is('admin/techso/masters/customers*') ? 'active' : '' }}" menu_icon="fa fa-asterisk"
                    drop_icon="" />
            @endcan
            @can('Product Read')
                <x-backend.sidebar.sidebar-level-multi head="Products" href="" menu_open=""
                    active="{{ request()->is('admin/techso/masters/products*') ? 'active' : '' }}" menu_icon="fa fa-asterisk"
                    drop_icon="" />
            @endcan
            @can('Brand Read')
                <x-backend.sidebar.sidebar-level-multi head="Brands" href="" menu_open=""
                    active="{{ request()->is('admin/techso/masters/brands*') ? 'active' : '' }}" menu_icon="fa fa-asterisk"
                    drop_icon="" />
            @endcan
            @can('Complaint Read')
                <x-backend.sidebar.sidebar-level-multi head="Complaints" href="" menu_open=""
                    active="{{ request()->is('admin/techso/masters/complaints*') ? 'active' : '' }}" menu_icon="fa fa-asterisk"
                    drop_icon="" />
            @endcan
            @can('Job Status Read')
                <x-backend.sidebar.sidebar-level-multi head="Job Statuses" href="" menu_open=""
                    active="{{ request()->is('admin/techso/masters/job-statuses*') ? 'active' : '' }}"
                    menu_icon="fa fa-asterisk" drop_icon="" />
            @endcan
            @can('Job Type Read')
                <x-backend.sidebar.sidebar-level-multi head="Job Types" href="" menu_open=""
                    active="{{ request()->is('admin/techso/masters/job-types*') ? 'active' : '' }}" menu_icon="fa fa-asterisk"
                    drop_icon="" />
            @endcan
            @can('Product Type Read')
                <x-backend.sidebar.sidebar-level-multi head="Product Types" href="" menu_open=""
                    active="{{ request()->is('admin/techso/masters/product-types*') ? 'active' : '' }}"
                    menu_icon="fa fa-asterisk" drop_icon="" />
            @endcan
            @can('Customer Accessories Read')
                <x-backend.sidebar.sidebar-level-multi head="Customer Accessories" href="" menu_open=""
                    active="{{ request()->is('admin/techso/masters/customer-accessories*') ? 'active' : '' }}"
                    menu_icon="fa fa-asterisk" drop_icon="" />
            @endcan
        </x-backend.sidebar.sidebar-level-multi>
    @endcanany
    <!-- techso masters end -->
    <!-- techso Inventory Start -->
    @canany(['Stock Valuation Read', 'Stock Reports Read'])
        <x-backend.sidebar.sidebar-level-multi head="Inventory" href="#"
            menu_open="{{ request()->is('admin/techso/inventory*') ? 'menu-open' : '' }}"
            active="{{ request()->is('admin/techso/inventory/*') ? 'active' : '' }}" menu_icon="fa fa-folder-tree"
            drop_icon="fas fa-angle-left">

            @can('Stock Valuation Read')
                <x-backend.sidebar.sidebar-level-multi head="Stock Valuation" href="" menu_open=""
                    active="{{ request()->is('admin/techso/inventory/stock-valuation*') ? 'active' : '' }}"
                    menu_icon="fa fa-asterisk" drop_icon="" />
            @endcan
            @can('Stock Reports Read')
                <x-backend.sidebar.sidebar-level-multi head="Stock Ledger" href="" menu_open=""
                    active="{{ request()->is('admin/techso/inventory/stock-ledger*') ? 'active' : '' }}"
                    menu_icon="fa fa-asterisk" drop_icon="" />
            @endcan
        </x-backend.sidebar.sidebar-level-multi>
    @endcanany
    <!-- techso Inventory end -->
    <!-- techso financial Start -->
    @canany(['Ledger Read', 'Stock Reports Read'])
        <x-backend.sidebar.sidebar-level-multi head="financial" href="#"
            menu_open="{{ request()->is('admin/techso/financial*') ? 'menu-open' : '' }}"
            active="{{ request()->is('admin/techso/financial/*') ? 'active' : '' }}" menu_icon="fa-solid fa-coins"
            drop_icon="fas fa-angle-left">

            <x-backend.sidebar.sidebar-level-multi head="Transection" href="#"
                menu_open="{{ request()->is('admin/techso/financial*') ? 'menu-open' : '' }}"
                active="{{ request()->is('admin/techso/financial/*') ? 'active' : '' }}"
                menu_icon="fa-solid fa-down-left-and-up-right-to-center" drop_icon="fas fa-angle-left">

                <x-backend.sidebar.sidebar-level-multi head="Cash and Bank" href="#"
                    menu_open="{{ request()->is('admin/techso/financial*') ? 'menu-open' : '' }}"
                    active="{{ request()->is('admin/techso/financial/*') ? 'active' : '' }}"
                    menu_icon="fa-solid fa-money-bills" drop_icon="fas fa-angle-left">

                    @can('Receipts Read')
                        <x-backend.sidebar.sidebar-level-multi head="Receipts" href="" menu_open=""
                            active="{{ request()->is('admin/techso/financial/stock-valuation*') ? 'active' : '' }}"
                            menu_icon="fa-solid fa-receipt" drop_icon="" />
                    @endcan
                    @can('Cash Payment Read')
                        <x-backend.sidebar.sidebar-level-multi head="Cash Payment" href="" menu_open=""
                            active="{{ request()->is('admin/techso/financial/stock-ledger*') ? 'active' : '' }}"
                            menu_icon="fa-solid fa-money-bill-wave" drop_icon="" />
                    @endcan
                </x-backend.sidebar.sidebar-level-multi>

                {{-- @can('Ledger Read')
                    <x-backend.sidebar.sidebar-level-multi head="Ledger"
                        href="{{ route('inventories.stock.valuation') }}" menu_open=""
                        active="{{ request()->is('admin/techso/financial/stock-valuation*') ? 'active' : '' }}"
                        menu_icon="fa-solid fa-file-invoice-dollar" drop_icon="" />
                @endcan --}}
                @can('Stock Reports Read')
                    <x-backend.sidebar.sidebar-level-multi head="Stock Ledger" href="" menu_open=""
                        active="{{ request()->is('admin/techso/financial/stock-ledger*') ? 'active' : '' }}"
                        menu_icon="fa fa-asterisk" drop_icon="" />
                @endcan
            </x-backend.sidebar.sidebar-level-multi>




            @can('Ledger Read')
                <x-backend.sidebar.sidebar-level-multi head="Ledger" href="" menu_open=""
                    active="{{ request()->is('admin/techso/financial/stock-valuation*') ? 'active' : '' }}"
                    menu_icon="fa-solid fa-file-invoice-dollar" drop_icon="" />
            @endcan
        </x-backend.sidebar.sidebar-level-multi>
    @endcanany
    <!-- techso financial end -->

</x-backend.sidebar.sidebar-level-single>
