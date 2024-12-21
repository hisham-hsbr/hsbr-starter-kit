<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/e174f9c6d3.js" crossorigin="anonymous"></script>
{{-- <link rel="stylesheet" href="{{ asset('backend/admin_lte/plugins/fontawesome-free/css/all.min.css') }}"> --}}
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('backend/admin_lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('backend/admin_lte/dist/css/adminlte.min.css') }}">
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('backend/admin_lte/plugins/toastr/toastr.min.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('backend/admin_lte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('backend/admin_lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

<!-- sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<x-backend.script.keyboard-shortcut key="h" button_id="homeButton" type="ctrl&alt" event="click" />

<x-backend.links.dual-list-box-head />
<x-backend.links.datatable-head-links />
@yield('head_links')
