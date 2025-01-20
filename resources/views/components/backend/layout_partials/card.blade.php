@props(['cardTitle' => '', 'cardFooter' => '', 'cardClass' => '', 'cardTools' => 0])
<div class="card {{ $cardClass }}">
    @if ($cardTools || $cardTitle || $cardTools)
        <div class="card-header">
            <h3 class="card-title">{{ $cardTitle }}</h3>
            @if ($cardTools)
                <div class="card-tools">

                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif
        </div>
    @endif

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
