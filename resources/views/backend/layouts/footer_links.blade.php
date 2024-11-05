<!-- jQuery -->
<script src="{{ asset('backend/admin_lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('backend/admin_lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/admin_lte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/admin_lte/dist/js/demo.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('backend/admin_lte/plugins/toastr/toastr.min.js') }}"></script>

<x-app.message.message />

@yield('footer_links')
