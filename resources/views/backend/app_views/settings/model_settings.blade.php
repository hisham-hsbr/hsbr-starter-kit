@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | Model Settings
@endsection
@section('page_header_name')
    {{ $headName }} - Model Settings ({{ $model }})
@endsection
@section('head_links')
    <x-backend.links.datatable-head-links />
@endsection
@section('breadcrumbs')
    <x-backend.layout_partials.page-breadcrumb-item pageName="Dashboard" pageHref="{{ route('backend.dashboard') }}"
        :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="{{ $headName }}"
        pageHref="{{ route($routeName . '.index') }}" :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="Model Settings" pageHref="" :active="true" />
@endsection

@section('main_content')
    <x-backend.layout_partials.card cardTitle="" cardFooter="">
        <form role="form" action="{{ route('settings.model.settings.update', encrypt($modelSettings)) }}" method="post"
            enctype="multipart/form-data" id="quickForm">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10">
                    @foreach ($settings as $setting)
                        <div class="form-group row">
                            <label for="{{ $setting->name }}"
                                class="col-sm-2 col-form-label">{{ Str::of($setting->name)->replace('_', ' ')->title() }}
                            </label>
                            <div class="col-sm-6">
                                <input type="{{ $setting->form_type }}" class="form-control" name="{{ $setting->name }}"
                                    id="{{ $setting->name }}" placeholder="{{ $setting->name }}"
                                    value="{{ $setting->value }}"
                                    oninput="checkDefaultValue('{{ $setting->name }}', '{{ $setting->default_value }}')">
                                @if ($errors->has($setting->name))
                                    <span class="text-danger">{{ $errors->first($setting->name) }}</span>
                                @endif
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="default_{{ $setting->name }}"
                                        id="default_{{ $setting->name }}"
                                        onchange="setDefaultValue('{{ $setting->name }}', '{{ $setting->default_value }}')">
                                    <label class="form-check-label" for="default_{{ $setting->name }}">
                                        Default value <span class="text-info"> - ({{ $setting->default_value }})</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-sm-10">
                            <input type="{{ $setting->form_type }}" class="form-control" id="{{ $setting->name }}"
                                placeholder="{{ $setting->name }}-{{ $setting->form_type }}">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="default_{{ $setting->name }}"
                                    onchange="setDefaultValue('{{ $setting->name }}', '{{ $setting->default_value }}')">
                                <label class="form-check-label" for="default_{{ $setting->name }}">
                                    Default value <span class="text-info"> - ({{ $setting->default_value }})</span>
                                </label>
                            </div>
                        </div> --}}
                    @endforeach
                    {{--
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="pt-0 col-form-label col-sm-2">Radios</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                        value="option1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        First radio
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2"
                                        value="option2">
                                    <label class="form-check-label" for="gridRadios2">
                                        Second radio
                                    </label>
                                </div>
                                <div class="form-check disabled">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3"
                                        value="option3" disabled>
                                    <label class="form-check-label" for="gridRadios3">
                                        Third disabled radio
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <div class="col-sm-2">Checkbox</div>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    Example checkbox
                                </label>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </x-backend.layout_partials.card>
@endsection

@section('footer_links')
    {{-- <script>
        function setDefaultValue(inputId, defaultValue) {
            const checkbox = document.getElementById(`default_${inputId}`);
            const input = document.getElementById(inputId);

            if (checkbox.checked) {
                input.value = defaultValue;
            } else {
                input.value = ''; // Clear the value if unchecked, or set it to whatever behavior you want here
            }
        }
    </script> --}}
    <script>
        // Set initial state based on the input value
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('{{ $setting->name }}');
            const checkbox = document.getElementById(`default_{{ $setting->name }}`);
            if (input.value === '{{ $setting->default_value }}') {
                checkbox.checked = true;
            }
        });

        // Set input value to default if checkbox is checked
        function setDefaultValue(inputId, defaultValue) {
            const checkbox = document.getElementById(`default_${inputId}`);
            const input = document.getElementById(inputId);

            if (checkbox.checked) {
                input.value = defaultValue;
            } else {
                input.value = ''; // Clear the value if unchecked
            }
        }

        // Check the checkbox if input value matches default value
        function checkDefaultValue(inputId, defaultValue) {
            const input = document.getElementById(inputId);
            const checkbox = document.getElementById(`default_${inputId}`);

            if (input.value === defaultValue) {
                checkbox.checked = true;
            } else {
                checkbox.checked = false;
            }
        }
    </script>
@endsection
