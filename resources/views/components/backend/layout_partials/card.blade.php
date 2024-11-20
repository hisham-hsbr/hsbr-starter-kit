@props(['cardTitle' => '', 'cardFooter' => '', 'cardClass' => ''])
<div class="card {{ $cardClass }}">
    <div class="card-header">
        <h3 class="card-title">{{ $cardTitle }}</h3>

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
    @if ($cardFooter)
        <div class="card-footer">
            {{ $cardFooter }}
        </div>
    @endif
    <!-- /.card-footer-->
</div>
