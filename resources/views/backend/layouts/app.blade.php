<!DOCTYPE html>
<html lang="en" data-menu-color="dark" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">

{{-- data-menu-color="dark" --}}
{{-- <html lang="en" data-menu-color="dark" data-menu-color="brand" data-topbar-color="light"> --}}
{{-- <html lang="en" data-menu-color="light" data-topbar-color="light"> --}}

<head>
    @include('backend.layouts.head')
    @include('backend.layouts.head_links')
</head>

<body>

    <!-- Begin page -->
    <div class="layout-wrapper">

        <!-- ========== Left Sidebar ========== -->
        @include('backend.layouts.sidebar')



        <!-- Start Page Content here -->
        <div class="page-content">

            <!-- ========== Topbar Start ========== -->
            @include('backend.layouts.navbar')
            <!-- ========== Topbar End ========== -->

            <div class="px-3">

                <!-- Start Content-->
                <div class="container-fluid">

                    @include('backend.layouts.main_content')

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            @include('backend.layouts.footer')
            <!-- end Footer -->

        </div>
        <!-- End Page content -->


    </div>
    <!-- END wrapper -->
    @include('backend.layouts.footer_links')

</body>

</html>
