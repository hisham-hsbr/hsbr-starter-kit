@if ($errors->count() > 0)
    @foreach ($errors->all() as $error)
        <script>
            toastr.error("{{ $error }}");
        </script>
    @endforeach
@endif
@if (Session::has('message_error'))
    <script>
        toastr.error("{!! Session::get('message_error') !!}");
    </script>
@endif
