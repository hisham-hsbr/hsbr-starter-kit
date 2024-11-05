@props(['card_title', 'card_footer' => ''])
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $card_title }}</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
    <!-- /.card-body -->
    @if ($card_footer)
        <div class="card-footer">
            {{ $card_footer }}
        </div>
    @endif
    <!-- /.card-footer-->
</div>
