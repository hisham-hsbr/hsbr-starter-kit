@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | Create
@endsection
@section('page_header_name')
    {{ $headName }} - Create
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
                <div class="card-header">
                    <h3 class="card-title">{{ ucwords(__('my.create')) }} <small>{{ $headName }}</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route($routeName . '.store') }}" method="post"
                    enctype="multipart/form-data" id="quickForm">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="form-control" placeholder="Enter name">
                                <x-backend.form.form-field-error-message name="name" />

                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" value="{{ old('email') }}"
                                    class="form-control" placeholder="Enter local name">
                                <x-backend.form.form-field-error-message name="email" />

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="gender" class="required">Gender</label>
                                <select name="gender" id="gender" class="form-control select2">
                                    <option disabled {{ old('gender') == '' ? 'selected' : '' }}>--Gender--
                                    </option>

                                    <option @if (old('gender') == 'male') { selected } @endif value="male">
                                        Male
                                    </option>
                                    <option @if (old('gender') == 'female') { selected } @endif value="female">
                                        Female</option>
                                    <option @if (old('gender') == 'other') { selected } @endif value="other">
                                        Other
                                    </option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="time_zone_id" class="required col-form-label">Time Zone</label>
                                <select name="time_zone_id" id="time_zone_id" class="form-control select2">
                                    <option disabled selected>--Time Zone--</option>
                                    @foreach ($timeZones as $timeZone)
                                        <option {{ old('timeZone->id') == $timeZone->id ? 'selected' : '' }}
                                            value="{{ $timeZone->id }}">{{ $timeZone->time_zone }} -- (
                                            {{ $timeZone->utc_code }}{{ ' ' }}{{ $timeZone->country }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12"></div>

                            <div class="form-group col-sm-4">
                                <label for="password" class="required col-form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    style="margin-bottom: 5px" placeholder="Password">
                                <div class="form-group-append">
                                    <button type="button" class="btn btn-outline-secondary show-password"><i
                                            class="fa-regular fa-eye-slash"></i></button>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="password_confirm" class="required col-form-label">Confirm
                                    Password</label>
                                <input type="password" name="password_confirm" id="password_confirm" class="form-control"
                                    style="margin-bottom: 5px" placeholder="Confirm Password">
                                <div class="form-group-append">
                                    <button type="button" class="btn btn-outline-secondary show-password"><i
                                            class="fa-regular fa-eye-slash"></i></button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label"></label>
                                <button type="button" class="btn btn-block btn-outline-warning generate-password"
                                    onclick="generate()">
                                    <i class="fas fa-key"></i> Generate Password
                                </button>
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter description...">{{ old('description') }}</textarea>
                        </div>
                        <x-backend.form.form-field-error-message name="description" />

                        <x-backend.script.duallistbox-refresh :route-name="'roles.refresh'" :name="'roles'" title="Assign Roles"
                            :items="$roles" />

                        <x-backend.script.duallistbox-refresh :route-name="'permissions.refresh'" :name="'permissions'"
                            title="Assign Special Permissions" :items="$permissions" />


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
                        <button type="submit" id="saveButton"
                            class="float-right ml-1 btn btn-primary"><u>S</u>ave</button>
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
    <x-backend.script.password-generate />





    <x-backend.script.keyboard-shortcut key="s" button_id="saveButton" type="ctrl&alt" event="click" />
    <x-backend.script.keyboard-shortcut key="b" button_id="backButton" type="ctrl&alt" event="click" />

    <x-backend.script.keyboard-shortcut key="c" button_id="name" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="n" button_id="contact_name" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="p" button_id="phone_1" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="d" button_id="default" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="a" button_id="status" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="m" button_id="test" type="ctrl&alt" event="focus" />
@endsection
