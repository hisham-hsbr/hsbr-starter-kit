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
<!-- jquery-validation -->
<script src="{{ asset('backend/admin_lte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('backend/admin_lte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('backend/admin_lte/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function() {

        //Initialize Select2 Elements
        $('.select2').select2()
    });
</script>

<script>
    // Make sure to include jQuery and Select2 library in your project
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Search...',
            allowClear: true
        });
    });
</script>
{{--
<!-- Google Translate Script -->
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
                pageLanguage: "en"
            },
            "google_translate_element"
        );
    }
</script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}

</body>

<x-app.message.message />

@yield('footer_links')
