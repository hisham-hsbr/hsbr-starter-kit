    @if (Session::has('message_info'))
        <script>
            toastr.info("{!! Session::get('message_info') !!}");
        </script>
    @endif
