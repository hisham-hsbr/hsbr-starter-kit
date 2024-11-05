    @if (Session::has('message_warning'))
        <script>
            toastr.warning("{!! Session::get('message_warning') !!}");
        </script>
    @endif
