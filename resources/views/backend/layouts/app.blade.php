<!DOCTYPE html>
<html lang="en" data-menu-color="dark" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">

{{-- data-menu-color="dark" --}}
{{-- <html lang="en" data-menu-color="dark" data-menu-color="brand" data-topbar-color="light"> --}}
{{-- <html lang="en" data-menu-color="light" data-topbar-color="light"> --}}

<head>
    @include('backend.layouts.head')
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
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Dashtrap
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="gap-4 d-none d-md-flex align-item-center justify-content-md-end">
                                <p class="mb-0">Design & Develop by <a href="https://myrathemes.com/"
                                        target="_blank">MyraStudio</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
        <!-- End Page content -->


    </div>
    <!-- END wrapper -->

    <!-- App js -->
    <script src="{{ asset('backend/dashtrap/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('backend/dashtrap/assets/js/app.js') }}"></script>

</body>

</html>
