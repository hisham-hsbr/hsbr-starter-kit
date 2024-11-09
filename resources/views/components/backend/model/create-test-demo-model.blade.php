<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form role="form" action="{{ route('test-demos.store') }}" method="post" enctype="multipart/form-data"
            id="myForm">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">Filter Options</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="myFilter" class="row">
                        <div class="col-md-6 form-group">
                            <label for="code">Code</label>
                            <input type="text" name="code" id="code" value="{{ old('code') }}"
                                class="form-control" placeholder="Enter code">
                            @if ($errors->has('code'))
                                <span class="text-danger">{{ $errors->first('code') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="form-control" placeholder="Enter name">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="local_name">Local Name</label>
                            <input type="text" name="local_name" id="local_name" value="{{ old('local_name') }}"
                                class="form-control" placeholder="Enter local name">
                            @if ($errors->has('local_name'))
                                <span class="text-danger">{{ $errors->first('local_name') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter description..."></textarea>
                        </div>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                        <div class="mb-0 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="default" id="default" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="default">Is Default</label>
                            </div>
                            @if ($errors->has('default'))
                                <span class="text-danger">{{ $errors->first('default') }}</span>
                            @endif
                        </div>
                        <div class="mb-0 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="status" id="status" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="status">Is Active</label>
                            </div>
                            @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                        </div>
                        <div class="mb-0 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck12">
                                <label class="custom-control-label" for="exampleCheck12">I agree to the <a
                                        href="#">terms of service</a>.</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="float-right ml-1 btn btn-primary">Submit</button>
                    <a type="button" href="{{ route('test-demos.index') }}"
                        class="float-right ml-1 btn btn-warning">Back</a>
                </div>
        </form>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#modalForm').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: '{{ route('test-demos.store') }}', // Update with your route name
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#modalForm').modal('hide');
                    alert(response.success);
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        Object.keys(errors).forEach(function(key) {
                            const input = $(`#${key}`);
                            input.addClass('is-invalid');
                            input.next('.invalid-feedback').text(errors[key][0]);
                        });
                    }
                }
            });
        });

        $('#exampleModal').on('hidden.bs.modal', function() {
            $('#modalForm')[0].reset();
            $('#modalForm .form-control').removeClass('is-invalid');
        });
    });
</script>
