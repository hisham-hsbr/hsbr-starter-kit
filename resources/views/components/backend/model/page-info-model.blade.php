@props(['modelTitle', 'iconClass', 'modelClass'])
<a type="button"><i class="{{ $iconClass }}" data-toggle="modal" data-target="#modal-default"></i></a>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog {{ $modelClass }}">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $modelTitle }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{-- modal-lg --}}
