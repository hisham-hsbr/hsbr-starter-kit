@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | Edit
@endsection
@section('page_header_name')
    {{ $headName }} - Edit
@endsection
@section('head_links')
    <x-backend.links.dual-list-box-head />
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
                <form role="form" action="{{ route($routeName . '.update', encrypt($role->id)) }}" method="post"
                    enctype="multipart/form-data" id="quickForm">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="card-body">
                        <div class="row">


                            <div class="col-md-6 form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name"
                                    value="{{ old('name') ?? $role->name }}" class="form-control" placeholder="Enter name">
                                <x-backend.form.form-field-error-message name="name" />

                            </div>
                            <div class="col-md-6 form-group">
                                <label>Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter description...">{{ old('description') ?? $role->description }}</textarea>
                            </div>
                            <x-backend.form.form-field-error-message name="description" />

                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Assign Permissions</label>
                                <select name="permission[]" class="duallistbox" multiple="multiple">
                                    @foreach ($permissions as $key => $value)
                                        @foreach ($value as $permission)
                                            <option @if (in_array($permission->id, $role->permissions->pluck('id')->toArray())) selected @endif
                                                value="{{ $permission->id }}">{{ $permission->name }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="mb-0 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="default" id="default" value="1"
                                    @if ($role->default == 1) {{ 'checked' }} @endif
                                    class="custom-control-input">
                                <label class="custom-control-label" for="default">Is Default</label>
                            </div>
                            <x-backend.form.form-field-error-message name="default" />

                        </div>
                        <div class="mb-0 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="status" id="status" value="1"
                                    @if ($role->status == 'Active') {{ 'checked' }} @endif
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
    <x-backend.links.dual-list-box-footer />



    <x-backend.script.keyboard-shortcut key="u" button_id="updateButton" type="ctrl&alt" event="click" />
    <x-backend.script.keyboard-shortcut key="b" button_id="backButton" type="ctrl&alt" event="click" />
@endsection
