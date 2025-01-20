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
    <x-backend.layout_partials.card cardTitle="User Edit" cardFooter="" cardClass="card-secondary">
        <form role="form" action="{{ route($routeName . '.update', encrypt($user->id)) }}" method="post"
            enctype="multipart/form-data" id="quickForm">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <input type="hidden" id="encryptedUserId" value="{{ encrypt($user->id) }}">

            <div class="card-body">
                <div class="row">

                    <x-backend.form.label-input-group label="Name" name="name" type="text"
                        value="{{ isset($user) ? $user->name : '' }}" placeholder="Enter name" :shortcut="['type' => 'Alt', 'key' => 'N']" />

                    <x-backend.form.label-input-group label="Email" name="email" type="email"
                        value="{{ isset($user) ? $user->email : '' }}" placeholder="Enter email" :shortcut="['type' => 'Alt', 'key' => 'E']" />

                    <div class="form-group col-sm-4">
                        <label for="gender" class="required">Gender</label>
                        <select name="gender" id="gender" class="form-control select2">
                            <option disabled {{ $user->gender == '' ? 'selected' : '' }}>--Gender--
                            </option>

                            <option @if ($user->gender == 'male') { selected } @endif value="male">
                                Male
                            </option>
                            <option @if ($user->gender == 'female') { selected } @endif value="female">
                                Female</option>
                            <option @if ($user->gender == 'other') { selected } @endif value="other">
                                Other
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="time_zone_id" class="required col-form-label">Time Zone</label>
                        <select name="time_zone_id" id="time_zone_id" class="form-control select2">
                            <option disabled selected>--Time Zone--</option>
                            @foreach ($timeZones as $timeZone)
                                <option {{ $user->timeZone->id == $timeZone->id ? 'selected' : '' }}
                                    value="{{ $timeZone->id }}">{{ $timeZone->time_zone }} -- (
                                    {{ $timeZone->utc_code }}{{ ' ' }}{{ $timeZone->country }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="email_verified_at" class="required col-form-label">Email Verified</label>
                        <input type="datetime-local" name="email_verified_at" id="email_verified_at" class="form-control"
                            value="{{ $user->email_verified_at ? Carbon\Carbon::parse($user->email_verified_at_formatted)->format('Y-m-d\TH:i') : '' }}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="date_of_birth" class="required col-form-label">Date Of Birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"
                            value="{{ $user->date_of_birth ? Carbon\Carbon::parse($user->date_of_birth)->format('Y-m-d') : '' }}">
                    </div>



                    <div class="p-4 col-sm-10">
                        <input type="checkbox" class="form-check-input" name="changePassword" value="1"
                            id="changePassword" />
                        <label class="form-check-label" for="changePassword">Change Password</label>
                    </div>

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
                    <div class="">
                        <button type="button" class="btn btn-block btn-outline-warning generate-password"
                            onclick="generate()">
                            <i class="fas fa-key"></i> Generate Password
                        </button>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3"
                            placeholder="Enter description...">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <hr />
                        <h4 style="color:rgb(49, 49, 165)">
                            <mark><strong>Personal Settings</strong></mark>
                        </h4>
                        <hr />
                        <span class="p-2 badge badge-info">
                            <div class="form-check d-inline-flex align-items-center">
                                <input type="checkbox" class="form-check-input" name="personal_settings" value="1"
                                    id="personal_settings" @if (($user->settings['personal_settings']['value'] ?? '') == 1) checked @endif />
                                <h6 class="form-check-label ms-2" for="personal_settings">
                                    {{ Str::title(str_replace('_', ' ', 'Personal Settings')) }} (Enable)
                                </h6>
                            </div>
                        </span>
                    </div>



                    @if (!empty($user->settings))
                        @foreach ($user->settings as $key => $value)
                            @if ($key != 'personal_settings')
                                @if ($user->settings[$key]['type'] == 'checkbox')
                                    <div class="pt-2 pl-5 col-sm-4">
                                        <input type="checkbox" class="form-check-input" name="{{ $key }}"
                                            value="1" id="{{ $key }}"
                                            @if (($user->settings[$key]['value'] ?? '') == 1) checked @endif />
                                        <label class="form-check-label" for="{{ $key }}">
                                            {{ Str::title(str_replace('_', ' ', $key)) }} (Enable)
                                        </label>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endif
                    <div class="col-sm-12"><br></div>
                    @if (!empty($user->settings))
                        @foreach ($user->settings as $key => $value)
                            @if ($key != 'personal_settings')
                                @if ($user->settings[$key]['type'] == 'select')
                                    <div class="pt-2 pl-4 col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="{{ $key }}" class="required col-form-label">
                                                    {{ Str::title(str_replace('_', ' ', $key)) }}:
                                                </label>
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="{{ $key }}" id="{{ $key }}"
                                                    class="form-control select2">
                                                    @foreach ($user->settings[$key]['options'] ?? [] as $option)
                                                        <option value="{{ $option }}"
                                                            @if (($user->settings[$key]['value'] ?? '') == $option) selected @endif>
                                                            {{ $option }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endif
                </div>

                <x-backend.script.duallistbox-refresh :route-name="'roles.refresh'" :name="'roles'" title="Assign Roles"
                    :items="$roles" :selected-items="$user->roles->pluck('id')->toArray()" />
                <x-backend.script.duallistbox-refresh :route-name="'permissions.refresh'" :name="'permissions'"
                    title="Assign Special Permissions" :items="$permissions" :selected-items="$user->permissions->pluck('id')->toArray()" />

                <div class="mb-0 form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="status" id="status" value="1"
                            @if ($user->status == 'Active') {{ 'checked' }} @endif class="custom-control-input">
                        <label class="custom-control-label" for="status">Is Active</label>
                    </div>
                    <x-backend.form.form-field-error-message name="status" />

                </div>

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
    <x-backend.modules.users.jquery-validation-users />

    <x-backend.script.password-generate />
    <x-backend.links.dual-list-box-footer />

    <x-backend.script.keyboard-shortcut key="n" button_id="name" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="e" button_id="email" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="g" button_id="gender" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="t" button_id="time_zone_id" type="alt" event="focus" />

    <x-backend.script.keyboard-shortcut key="u" button_id="updateButton" type="ctrl&alt" event="click" />
    <x-backend.script.keyboard-shortcut key="b" button_id="backButton" type="ctrl&alt" event="click" />
@endsection
