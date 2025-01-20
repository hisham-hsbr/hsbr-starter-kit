@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | {{ ucwords(__('my.create')) }}
@endsection
@section('page_header_name')
    {{ $headName }} - {{ ucwords(__('my.create')) }}
@endsection
@section('head_links')
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
                <form role="form" action="{{ route($routeName . '.store') }}" method="post"
                    enctype="multipart/form-data" id="quickForm">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <x-backend.form.label-input-group label="Name" name="name" type="text"
                                value="{{ isset($user) ? $user->name : '' }}" placeholder="Enter name" :shortcut="['type' => 'Alt', 'key' => 'N']" />

                            <x-backend.form.label-input-group label="Email" name="email" type="text"
                                value="{{ isset($user) ? $user->email : '' }}" placeholder="Enter email"
                                :shortcut="['type' => 'Alt', 'key' => 'E']" />

                            <div class="form-group col-sm-4">
                                <label for="gender" class="required">Gender <x-backend.form.span-shortcut-tooltip
                                        type="Alt" key="G" /></label>
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
                                <x-backend.form.form-field-error-message name="gender" />
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="time_zone_id" class="required">Time
                                    Zone
                                    <x-backend.form.span-shortcut-tooltip type="Alt" key="T" />
                                </label>
                                <select name="time_zone_id" id="time_zone_id" class="form-control select2">
                                    <option disabled selected>--Time Zone--</option>
                                    @foreach ($timeZones as $timeZone)
                                        <option {{ old('time_zone_id') == $timeZone->id ? 'selected' : '' }}
                                            value="{{ $timeZone->id }}">{{ $timeZone->time_zone }} -- (
                                            {{ $timeZone->utc_code }}{{ ' ' }}{{ $timeZone->country }})
                                        </option>
                                    @endforeach
                                </select>
                                <x-backend.form.form-field-error-message name="time_zone_id" />
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="date_of_birth" class="required">Date Of Birth</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"
                                    value="{{ old('date_of_birth') }}" placeholder="Enter Date Of Birth">
                            </div>
                            <div class="col-sm-12"></div>

                            <div class="form-group col-sm-4">
                                <label for="password" class="required col-form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    style="margin-bottom: 5px" placeholder="Password">
                                <x-backend.form.form-field-error-message name="password" />
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
                                <x-backend.form.form-field-error-message name="password_confirm" />
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
                            <x-backend.form.status-default-value-set />

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="send_email_verification" id="send_email_verification"
                                    value="1" class="custom-control-input"
                                    @if (Auth::user()->settings['personal_settings']['value'] == 1) {
                                        @if (Auth::user()->settings['default_send_email_verification']['value'] == 1) checked @endif
                                } @else{ @if ($bootSettings['default_send_email_verification'] == 1) checked @endif} @endif>
                                <label class="custom-control-label" for="send_email_verification">Send Email
                                    Verification</label>

                                <x-backend.form.form-field-error-message name="send_email_verification" />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <x-backend.form.button-save-back :routeName="$routeName" />
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6"></div>
    </div>
@endsection
@section('footer_links')
    <x-backend.modules.users.jquery-validation-users />
    <x-backend.links.dual-list-box-footer />


    <x-backend.script.password-generate />

    <x-backend.script.keyboard-shortcut key="n" button_id="name" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="e" button_id="email" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="g" button_id="gender" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="t" button_id="time_zone_id" type="alt" event="focus" />
@endsection
