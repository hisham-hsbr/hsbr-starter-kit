@if (session('showModal'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('#modalForm').modal('show');
        });
    </script>
@endif
<!-- Button to open the modal with Font Awesome filter icon aligned to the right -->
<div class="mb-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">Quick add</button>
</div>
<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form role="form" action="{{ route('test.demos.store') }}" method="post" enctype="multipart/form-data"
            id="myForm">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">Create Test Demo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="myFilter" class="row">
                        <div class="col-md-6 form-group">
                            <label for="code">Code</label>
                            <input type="text" name="code" id="code" value="{{ old('code') }}"
                                class="form-control" placeholder="Enter code" required>
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
                    </div>
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
                <div class="modal-footer">
                    <button type="submit" class="float-right ml-1 btn btn-primary">Submit</button>
                    <button type="button" class="float-right ml-1 btn btn-warning" data-dismiss="modal">Close</button>
                    <button type="button" class="float-right ml-1 btn btn-secondary"
                        onclick="resetFormZ()">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function resetFormZ() {
        document.getElementById("myForm").reset();
    }
</script>
