@extends('backend.layouts.app')
@section('page_title', 'Test Demos- Create')
@section('page_header_name', 'Demo Create')
@section('head_links')

@endsection
@section('breadcrumbs')
    <x-backend.layout_partials.page-breadcrumb-item pageName="Dashboard" pageHref="{{ route('backend.dashboard') }}"
        :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="Test Demos" pageHref="{{ route('test.demos.index') }}"
        :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="Index" pageHref="" :active="true" />
@endsection

@section('main_content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ ucwords(__('my.edit')) }} <small>jQuery Validation</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route($routeName . '.update', encrypt($testDemo->id)) }}" method="post"
                    enctype="multipart/form-data" id="quickForm">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label for="code">Code</label>
                                <input type="text" name="code" id="code"
                                    value="{{ old('code') ?? $testDemo->code }}" class="form-control"
                                    placeholder="Enter code">
                                @if ($errors->has('code'))
                                    <span class="text-danger">{{ $errors->first('code') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name"
                                    value="{{ old('name') ?? $testDemo->name }}" class="form-control"
                                    placeholder="Enter name">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="local_name">Local Name</label>
                                <input type="text" name="local_name" id="local_name"
                                    value="{{ old('local_name') ?? $testDemo->local_name }}" class="form-control"
                                    placeholder="Enter local name">
                                @if ($errors->has('local_name'))
                                    <span class="text-danger">{{ $errors->first('local_name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter description...">{{ old('description') ?? $testDemo->description }}</textarea>
                            </div>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="mb-0 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="default" id="default" value="1"
                                    @if ($testDemo->default == 1) {{ 'checked' }} @endif
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
                                    @if ($testDemo->status == 'Active') {{ 'checked' }} @endif
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
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="float-right ml-1 btn btn-primary">Submit</button>
                        <a type="button" href="{{ route($routeName . '.index') }}"
                            class="float-right ml-1 btn btn-warning">Back</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
    </div>
@endsection
@section('footer_links')

    <x-backend.validation.jquery_validation.test-demos-validation />
    <script>
        $(document).ready(function() {
            $("#myForm").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },
                    email: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your name",
                        minlength: "Your name must be at least 3 characters long"
                    },
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    }
                },
                submitHandler: function(form) {
                    // Use AJAX to submit the form data without refreshing or closing the modal
                    $.ajax({
                        url: 'your-server-endpoint-url', // Replace with your server endpoint
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function(response) {
                            // Handle the response as needed
                            alert("Form submitted successfully!");

                            // Optionally, you can reset the form after submission
                            // $(form)[0].reset();
                        },
                        error: function() {
                            alert("An error occurred while submitting the form.");
                        }
                    });

                    // Prevent the modal from closing
                    return false;
                }
            });
        });
    </script>
@endsection
