    <!-- Force Delete Confirmation Modal -->
    <div class="modal fade" id="forceDeleteConfirmModal" tabindex="-1" aria-labelledby="forceDeleteConfirmModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forceDeleteConfirmModalLabel">Force Delete Confirmation</h5>
                    {{-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> --}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <p>Are you sure you want to force delete " <span style="color: red" id="itemNameInModal"></span> " ?
                    </p>
                    <p>Please type "<span style="color:green">delete</span>" to confirm:</p>
                    <input type="text" id="deleteConfirmInput" class="form-control"
                        placeholder="Type 'delete' to confirm">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" id="confirmDeleteButton" class="btn btn-danger" disabled>Force
                        Delete</button>
                </div>
            </div>
        </div>
    </div>
