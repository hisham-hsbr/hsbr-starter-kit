@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | Edit
@endsection
@section('page_header_name')
    {{ $headName }} - Edit
@endsection
@section('head_links')
@endsection
@section('breadcrumbs')
    <x-backend.layout_partials.page-breadcrumb-item pageName="Dashboard" pageHref="{{ route('backend.dashboard') }}"
        :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="{{ $headName }}"
        pageHref="{{ route($routeName . '.index') }}" :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="Edit" pageHref="" :active="true" />
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
                    <h3 class="card-title">{{ ucwords(__('my.edit')) }} <small>{{ $headName }}</small></h3>
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
                                <x-backend.form.form-field-error-message name="code" />

                            </div>
                            <div class="col-md-6 form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name"
                                    value="{{ old('name') ?? $testDemo->name }}" class="form-control"
                                    placeholder="Enter name">
                                <x-backend.form.form-field-error-message name="name" />

                            </div>
                            <div class="col-md-6 form-group">
                                <label for="local_name">Local Name</label>
                                <input type="text" name="local_name" id="local_name"
                                    value="{{ old('local_name') ?? $testDemo->local_name }}" class="form-control"
                                    placeholder="Enter local name">
                                <x-backend.form.form-field-error-message name="local_name" />

                            </div>
                            <div class="col-md-6 form-group">
                                <label>Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter description...">{{ old('description') ?? $testDemo->description }}</textarea>
                            </div>
                            <x-backend.form.form-field-error-message name="description" />

                        </div>
                        <div class="mb-0 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="default" id="default" value="1"
                                    @if ($testDemo->default == 1) {{ 'checked' }} @endif
                                    class="custom-control-input">
                                <label class="custom-control-label" for="default">Is Default</label>
                            </div>
                            <x-backend.form.form-field-error-message name="default" />

                        </div>
                        <div class="mb-0 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="status" id="status" value="1"
                                    @if ($testDemo->status == 'Active') {{ 'checked' }} @endif
                                    class="custom-control-input">
                                <label class="custom-control-label" for="status">Is Active</label>
                            </div>
                            <x-backend.form.form-field-error-message name="status" />

                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="float-right ml-1 btn btn-primary"
                            id="updateButton"><u>U</u>pdate</button>
                        <a type="button" href="{{ route($routeName . '.index') }}" id="backButton"
                            class="float-right ml-1 btn btn-warning"><u>B</u>ack</a>
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


    <x-backend.script.keyboard-shortcut key="u" button_id="updateButton" type="ctrl&alt" event="click" />
    <x-backend.script.keyboard-shortcut key="b" button_id="backButton" type="ctrl&alt" event="click" />
@endsection
