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
    <x-backend.layout_partials.page-breadcrumb-item pageName="Profile Edit" pageHref="" :active="true" />
@endsection

@section('main_content')
    <x-backend.layout_partials.card cardTitle="Profile Edit" cardFooter="" cardClass="card-secondary">
        <x-backend.model.update-user-avatar-model />


        <div style="margin-bottom: 8px" class="card-header">
            <h3 class="card-title">Personal Details</h3>
        </div>
        <form role="form" action="{{ route($routeName . '.update') }}" method="post" enctype="multipart/form-data"
            id="quickForm">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') ?? Auth::user()->name }}"
                        class="form-control" placeholder="Enter name">
                    <x-backend.form.form-field-error-message name="name" />

                </div>
                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="{{ old('email') ?? Auth::user()->email }}"
                        class="form-control" placeholder="Enter local name">
                    <x-backend.form.form-field-error-message name="email" />

                </div>
                <div class="form-group col-sm-4">
                    <label for="gender" class="required">Gender</label>
                    <select name="gender" id="gender" class="form-control select2">
                        <option disabled {{ Auth::user()->gender == '' ? 'selected' : '' }}>--Gender--
                        </option>

                        <option @if (Auth::user()->gender == 'male') { selected } @endif value="male">
                            Male
                        </option>
                        <option @if (Auth::user()->gender == 'female') { selected } @endif value="female">
                            Female</option>
                        <option @if (Auth::user()->gender == 'other') { selected } @endif value="other">
                            Other
                        </option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="time_zone_id" class="required col-form-label">Time Zone</label>
                    <select name="time_zone_id" id="time_zone_id" class="form-control select2">
                        <option disabled selected>--Time Zone--</option>
                        @foreach ($timeZones as $timeZone)
                            <option {{ Auth::user()->timeZone->id == $timeZone->id ? 'selected' : '' }}
                                value="{{ $timeZone->id }}">{{ $timeZone->time_zone }} -- (
                                {{ $timeZone->utc_code }}{{ ' ' }}{{ $timeZone->country }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label for="email_verified_at" class="required col-form-label">Email
                        verified</label>
                    <input type="text" name="email_verified_at" id="email_verified_at" class="form-control"
                        value="{{ Auth::user()->email_verified_at_formatted }}" disabled>
                </div>
                <div class="p-4 col-sm-10">
                    <input type="checkbox" class="form-check-input" name="changePassword" value="1"
                        id="changePassword" />
                    <label class="form-check-label" for="changePassword">Change Password</label>
                </div>
                <div class="form-group col-sm-4">
                    <label for="password" class="required col-form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" style="margin-bottom: 5px"
                        placeholder="Password">
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
                <div class="">
                    <button type="button" class="btn btn-block btn-outline-warning generate-password" onclick="generate()">
                        <i class="fas fa-key"></i> Generate Password
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h4 style="color:rgb(49, 49, 165)"><mark><strong>Personal Settings</strong></mark></h4>
                </div>
                <div class="pt-2 pl-5 col-sm-4">
                    <input type="checkbox" class="form-check-input" name="layout_sidebar_collapse" value="1"
                        id="layout_sidebar_collapse" @if (Auth::user()->settings['layout_sidebar_collapse'] == 1) {{ 'checked' }} @endif />
                    <label class="form-check-label" for="layout_sidebar_collapse">Sidebar Collapse
                        (Enable)</label>
                </div>
                <div class="pt-2 pl-5 col-sm-4">
                    <input type="checkbox" class="form-check-input" name="layout_dark_mode" value="1"
                        id="layout_dark_mode" @if (Auth::user()->settings['layout_dark_mode'] == 1) {{ 'checked' }} @endif />
                    <label class="form-check-label" for="layout_dark_mode">Dark Mode (Enable)</label>
                </div>
                <div class="pt-2 pl-5 col-sm-4">
                    <input type="checkbox" class="form-check-input" name="default_status" value="1"
                        id="default_status" @if (Auth::user()->settings['default_status'] == 1) {{ 'checked' }} @endif />
                    <label class="form-check-label" for="default_status">Default Status
                        (Active)</label>
                </div>
                <div class="col-sm-6"></div>
                <div class="pt-2 pl-4 col-sm-8">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="permission_view" class="required col-form-label ">Permission
                                View :</label>
                        </div>
                        <div class="col-sm-4">
                            <select name="permission_view" id="permission_view" class="form-control select2">

                                <option @if (Auth::user()->settings['permission_view'] == 'list') { selected } @endif value="list">
                                    List
                                </option>
                                <option @if (Auth::user()->settings['permission_view'] == 'group') { selected } @endif value="group">
                                    Group</option>

                            </select>
                        </div>
                    </div>


                </div>
            </div>
            <x-backend.form.form-field-error-message name="description" />

            </div>
            <div style="padding-bottom: 8px;padding-right: 8px" class="">
                <button type="submit" class="float-right ml-1 btn btn-primary" id="updateButton"><u>U</u>pdate</button>
                <a type="button" href="{{ route('backend.dashboard') }}" id="backButton"
                    class="float-right ml-1 btn btn-warning"><u>B</u>ack</a>
            </div>
        </form>





    </x-backend.layout_partials.card>
@endsection
@section('footer_links')
    <x-backend.script.update-user-avatar />

    <x-backend.script.password-generate />
    <x-backend.script.keyboard-shortcut key="u" button_id="updateButton" type="ctrl&alt" event="click" />
    <x-backend.script.keyboard-shortcut key="b" button_id="backButton" type="ctrl&alt" event="click" />
@endsection