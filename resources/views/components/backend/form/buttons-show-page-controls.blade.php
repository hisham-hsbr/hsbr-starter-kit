@props(['routeName', 'model', 'item'])
<div class="btn-group">
    <button type="button" class="btn btn-info">Action</button>
    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu" role="menu">
        <!-- Export Button -->
        <a href="{{ route($routeName . '.create') }}" class="btn btn-block btn-outline-success btn-xs"><i
                class="fas fa-file-export"></i> Export
        </a>

        <!-- PDF Button -->
        <a href="{{ route($routeName . '.pdf', encrypt($item->id)) }}" class="btn btn-block btn-outline-info btn-xs"><i
                class="fas fa-file-pdf"></i> PDF </a>

        <!-- Settings Button -->
        <a href="{{ route('settings.model.settings', encrypt($model)) }}"
            class="btn btn-block btn-outline-secondary btn-xs"><i class="fas fa-cog"></i> Settings </a>

        <!-- Soft Delete Button -->
        <button type="button" class="btn btn-block btn-outline-danger btn-xs" data-toggle="modal"
            data-target="#confirmDeleteModal"
            onclick="setDeleteAction('{{ route($routeName . '.destroy', encrypt($item->id)) }}')">
            <i class="fas fa-trash-alt"></i> Soft Delete
        </button>

        <!-- Force Delete Button -->
        <button type="button" class="btn btn-block btn-outline-dark btn-xs" data-toggle="modal"
            data-target="#confirmForceDeleteModal"
            onclick="setForceDeleteAction('{{ route($routeName . '.force.destroy', encrypt($item->id)) }}')">
            <i class="fas fa-trash-alt"></i> Force Delete
        </button>






    </div>
</div>

<!-- Soft Delete Confirmation Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">Confirm Delete</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />

<script>
    let deleteUrl = '';

    function setDeleteAction(url) {
        deleteUrl = url; // Set the URL for the delete action
    }

    function confirmDelete() {
        axios.delete(deleteUrl, {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                $('#confirmDeleteModal').modal('hide'); // Hide the modal after deletion
                if (response.data.success) {
                    toastr.success(response.data.message); // Display success message
                    setTimeout(() => {
                        window.location.href =
                            '{{ route($routeName . '.index') }}'; // Redirect to the index route
                    }, 1000); // Redirect after a short delay to allow the toastr message to be seen
                } else {
                    toastr.error(response.data.error); // Display error message
                }
            })
            .catch(error => {
                $('#confirmDeleteModal').modal('hide'); // Hide modal on error as well
                toastr.error("An unexpected error occurred."); // Handle unexpected errors
            });
    }
</script>



<!--  Force Delete Confirmation Modal -->
<div class="modal fade" id="confirmForceDeleteModal" tabindex="-1" role="dialog"
    aria-labelledby="confirmForceDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmForceDeleteModalLabel">Confirm Force Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>To confirm deletion, please type "<strong>delete</strong>" below. This action is irreversible.</p>
                <input type="text" id="confirmDeleteInput" class="form-control"
                    placeholder="Type 'delete' to confirm" onkeyup="checkDeleteConfirmation()">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="forceDeleteButton" class="btn btn-danger" onclick="confirmForceDelete()"
                    disabled>Confirm Force Delete</button>
            </div>
        </div>
    </div>
</div>
<script>
    let forceDeleteUrl = '';

    function setForceDeleteAction(url) {
        forceDeleteUrl = url; // Set the URL for the force delete action
        document.getElementById('confirmDeleteInput').value = ''; // Clear input field
        document.getElementById('forceDeleteButton').disabled = true; // Disable delete button initially
    }

    function checkDeleteConfirmation() {
        const input = document.getElementById('confirmDeleteInput').value;
        const deleteButton = document.getElementById('forceDeleteButton');

        // Enable button only if input matches "delete"
        deleteButton.disabled = input.trim().toLowerCase() !== 'delete';
    }

    function confirmForceDelete() {
        axios.delete(forceDeleteUrl, {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                $('#confirmForceDeleteModal').modal('hide'); // Hide modal after deletion
                if (response.data.success) {
                    toastr.success(response.data.message); // Display success message
                    setTimeout(() => {
                        window.location.href =
                            '{{ route($routeName . '.index') }}'; // Redirect to the index route
                    }, 1000); // Redirect after a short delay
                } else {
                    toastr.error(response.data.error); // Display error message
                }
            })
            .catch(error => {
                $('#confirmForceDeleteModal').modal('hide'); // Hide modal on error as well
                toastr.error("An unexpected error occurred."); // Handle unexpected errors
            });
    }
</script>









{{-- <div id="indexPageButtons" style="margin-bottom: 5px">
    <!-- Add Button -->
    <a href="{{ route($routeName . '.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add
    </a>

    <!-- Export Button -->
    <a href="{{ route($routeName . '.create') }}" class="btn btn-success">
        <i class="fas fa-file-export"></i> Export
    </a>

    <!-- Import Button -->
    <a href="{{ route($routeName . '.create') }}" class="btn btn-info">
        <i class="fas fa-file-import"></i> Import
    </a>

    <!-- Settings Button -->
    <a href="{{ route($routeName . '.create') }}" class="btn btn-secondary">
        <i class="fas fa-cog"></i> Settings
    </a>

    <!-- Refresh Button -->
    <a onclick="Refresh()" class="btn btn-warning">
        <i class="fas fa-sync-alt"></i> Refresh
    </a>
</div> --}}
