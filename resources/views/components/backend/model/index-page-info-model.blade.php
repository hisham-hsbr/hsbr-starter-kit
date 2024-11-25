@props(['modelTitle' => '', 'module' => ''])
<a type="button"><i class="fa-solid fa-circle-info" data-toggle="modal" data-target="#modal-default"></i></a>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $modelTitle }} info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><u>Keyboard Shortcuts</u></p>
                <x-backend.form.model-table-code>
                    <x-backend.form.model-table-code-tr action="Add {{ $module }}" code="Ctrl+Alt + A" />
                    <x-backend.form.model-table-code-tr action="Import {{ $module }}" code="Ctrl+Alt + I" />
                    <x-backend.form.model-table-code-tr action="{{ $module }} Settings" code="Ctrl+Alt + S" />
                    <x-backend.form.model-table-code-tr action="{{ $module }} Table Refresh" code="Alt + R" />
                </x-backend.form.model-table-code>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{-- modal-lg --}}
