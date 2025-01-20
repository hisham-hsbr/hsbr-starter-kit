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
