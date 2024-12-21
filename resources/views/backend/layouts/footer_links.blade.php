<!-- jQuery -->
<script src="{{ asset('backend/admin_lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('backend/admin_lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/admin_lte/dist/js/adminlte.min.js') }}"></script>
{{-- <!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/admin_lte/dist/js/demo.js') }}"></script> --}}
<!-- Toastr -->
<script src="{{ asset('backend/admin_lte/plugins/toastr/toastr.min.js') }}"></script>
<!-- jquery-validation -->
<script src="{{ asset('backend/admin_lte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('backend/admin_lte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('backend/admin_lte/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function() {
        $('.select2').select2()
    });
</script>
{{-- google translate --}}

@if (Auth::user()->settings['google_translate_mode']['value'] == 1)
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endif

<x-app.message.message />



{{-- page loading --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var spinnerOverlay = document.getElementById('spinner-overlay');
        spinnerOverlay.classList.remove('d-none');

        window.addEventListener('load', function() {
            spinnerOverlay.classList.add('d-none');
        });
    });
</script>

{{-- page loadingAJAX Loading --}}
<script>
    $(document).ready(function() {
        $(document).ajaxStart(function() {
            setTimeout(function() {
                $('#spinner-overlay').removeClass('d-none');
            }, 100); // 100ms delay to ensure spinner visibility
        }).ajaxStop(function() {
            $('#spinner-overlay').addClass('d-none');
        });
    });
</script>

<x-backend.links.dual-list-box-footer />
<x-backend.links.datatable-footer-links />

@yield('footer_links')
</body>
