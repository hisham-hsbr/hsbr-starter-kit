@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | {{ ucwords(__('my.create')) }}
@endsection
@section('page_header_name')
    {{ $headName }} - {{ ucwords(__('my.create')) }}
@endsection
@section('head_links')
    <x-backend.links.dual-list-box-head />
@endsection
@section('breadcrumbs')
    <x-backend.layout_partials.page-breadcrumb-item pageName="Dashboard" pageHref="{{ route('backend.dashboard') }}"
        :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="{{ $headName }}"
        pageHref="{{ route($routeName . '.index') }}" :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="Create" pageHref="" :active="true" />
@endsection

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route($routeName . '.store') }}" method="post" enctype="multipart/form-data"
                    id="quickForm">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label for="subject">Subject</label>
                                <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                                    class="form-control" placeholder="Enter subject">
                                <x-backend.form.form-field-error-message name="subject" />
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Body</label>
                                <textarea name="body" id="body" class="form-control" rows="3" placeholder="Enter body...">{{ old('body') }}</textarea>
                            </div>
                            <x-backend.form.form-field-error-message name="body" />

                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Assign Users</label>

                                <select name="users[]" class="duallistbox" multiple="multiple">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>


                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="mb-0 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="default" id="default" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="default">Is Default</label>
                            </div>
                            <x-backend.form.form-field-error-message name="default" />

                        </div>
                        <div class="mb-0 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="status" id="status" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="status">Is Active</label>
                            </div>
                            <x-backend.form.form-field-error-message name="status" />

                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" id="saveButton" class="float-right ml-1 btn btn-primary"><u>S</u>ave</button>
                        <a type="button" id="backButton" href="{{ route($routeName . '.index') }}"
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


    <x-backend.script.keyboard-shortcut key="s" button_id="saveButton" type="ctrl&alt" event="click" />
    <x-backend.script.keyboard-shortcut key="b" button_id="backButton" type="ctrl&alt" event="click" />

    <script>
        $("#checkall").change(function() {
            $(".checkitem").prop("checked", $(this).prop("checked"))
        })
        $(".checkitem").change(function() {
            if ($(this).prop("checked") == false) {
                $("#checkall").prop("checked", false)
            }
            if ($(".checkitem:checked").length == $(".checkitem").length) {
                $("#checkall").prop("checked", true)
            }
        })
    </script>

    <x-backend.script.keyboard-shortcut key="c" button_id="name" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="n" button_id="contact_name" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="p" button_id="phone_1" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="d" button_id="default" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="a" button_id="status" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="m" button_id="test" type="ctrl&alt" event="focus" />
@endsection
