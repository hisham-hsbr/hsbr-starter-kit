<!-- start page title -->
<div class="py-3 py-lg-4">
    <div class="row">
        @yield('page_title')
        <div class="col-lg-6">
            <div class="d-none d-lg-block">
                @yield('page_breadcrumb')
            </div>
        </div>
    </div>
</div>
<!-- end page title -->


@yield('main_content')
