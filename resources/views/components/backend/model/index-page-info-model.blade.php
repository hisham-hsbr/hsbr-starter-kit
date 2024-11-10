@props(['modelTitle'])
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
                    <x-backend.form.model-table-code-tr action="Add Customer" code="Ctrl+Alt + A" />
                    <x-backend.form.model-table-code-tr action="Import Customer" code="Ctrl+Alt + I" />
                    <x-backend.form.model-table-code-tr action="Customer Settings" code="Ctrl+Alt + S" />
                    <x-backend.form.model-table-code-tr action="Customer Table Refresh" code="Alt + R" />
                </x-backend.form.model-table-code>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{-- modal-lg --}}
