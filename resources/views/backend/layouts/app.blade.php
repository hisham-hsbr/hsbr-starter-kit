<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.layouts.head')
    @include('backend.layouts.head_links')

</head>

{{-- <body class="hold-transition sidebar-mini layout-fixed"> --}}

<body
    class="text-sm hold-transition sidebar-mini layout-navbar-fixed layout-fixed layout-footer-fixed
    @if (Auth::user()->settings['personal_settings']['value'] == 1) {
        @if (Auth::user()->settings['layout_sidebar_collapse']['value'] == 1) sidebar-collapse @endif
        @if (Auth::user()->settings['layout_dark_mode']['value'] == 1) dark-mode @endif
    }
    @else{
        @if ($bootSettings['layout_sidebar_collapse'] == 1) sidebar-collapse @endif
        @if ($bootSettings['layout_dark_mode'] == 1) dark-mode @endif}
    @endif
    ">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('backend.layouts.navbar')
        <!-- /.navbar -->




        @include('backend.layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('backend.layouts.main_content')


            <!-- /.content-wrapper -->
            @include('backend.layouts.footer')

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        @include('backend.layouts.footer_links')


        @include('backend.layouts.functions')



</body>

</html>
