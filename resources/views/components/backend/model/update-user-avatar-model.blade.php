<!-- Button to Open Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#avatarModal">
    Update Avatar
</button>

<!-- Bootstrap Modal -->
<div class="modal fade" id="avatarModal" tabindex="-1" role="dialog" aria-labelledby="avatarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="avatarModalLabel">Update Profile Avatar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Display Existing Avatar -->
                <div class="text-center form-group">
                    <x-app.user-profile-image style="font-size: 30px; width: 160px;" />
                </div>
                <form id="avatar-form">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label for="avatar">Select New Avatar</label>
                        <input type="file" class="form-control" id="avatar" name="avatar"
                            accept=".jpeg,.jpg,.png" required>
                    </div>
                    <div id="crop-container" style="display: none;">
                        <img id="image-preview" style="max-width: 100%;" />
                    </div>
                </form>
                @if (Auth::user()->avatar)
                    <div class="mt-3 text-center">
                        <!-- Form for Removing Avatar -->
                        <form method="post" action="{{ route('user.profile.avatar.delete') }}">
                            @csrf
                            @method('patch')
                            <button type="submit" class="mt-1 mb-1 btn btn-danger btn-sm me-1">Remove Avatar</button>
                        </form>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" id="crop-btn" class="btn btn-success" style="display: none;">Crop &
                    Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
