    @if (Session::has('message_success'))
        <script>
            toastr.success("{!! Session::get('message_success') !!}");
        </script>
    @endif
