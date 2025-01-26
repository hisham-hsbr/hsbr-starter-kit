<!-- Spinner Overlay with Logo -->
<div id="spinner-overlay" class="d-none justify-content-center align-items-center"
    style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.8); z-index: 1050; display: flex;">

    <!-- Logo Image in Center -->
    <div style="position: relative;">
        <div class="spinner-border text-primary" role="status" style="width: 6rem; height: 6rem;">
            <span class="sr-only">Loading...</span>
        </div>
        <img src="{{ asset('app/images/logo/hsbr_logo_icon.png') }}" alt="Logo"
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 4.5rem; height: 4.5rem;">
    </div>
</div>






<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>@yield('page_header_name')</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @yield('breadcrumbs')

                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                @yield('main_content')
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
</div>
