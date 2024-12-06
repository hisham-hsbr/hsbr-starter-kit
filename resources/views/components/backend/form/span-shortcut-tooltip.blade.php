<span class="px-1 text-white border border-dark bg-info small" data-toggle="tooltip" data-placement="top"
    title="{{ $type }}+{{ $key }}">
    {{ $key }}
</span>


{{-- tooltip --}}
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
