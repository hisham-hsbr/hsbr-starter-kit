@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | Model Settings
@endsection
@section('page_header_name')
    {{ $headName }} - Model Settings ({{ $modelSettings }})
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
        <!-- Button to Open the Full-Screen Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#settingsModal">
            Open Full-Size Settings Modal
        </button>

        <x-backend.model.model-settings :modelSettings="$model" :settings="$settings" :routeName='$routeName' />

    </x-backend.layout_partials.card>
@endsection

@section('footer_links')
    {{-- @if (!$settings->isEmpty())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @foreach ($settings as $setting)
                    const input_{{ $setting->name }} = document.getElementById('{{ $setting->name }}');
                    const checkbox_{{ $setting->name }} = document.getElementById(`default_{{ $setting->name }}`);
                    if (input_{{ $setting->name }} && input_{{ $setting->name }}.value ===
                        '{{ $setting->default_value }}') {
                        checkbox_{{ $setting->name }}.checked = true;
                    }
                @endforeach
            });

            function setDefaultValue(inputId, defaultValue) {
                const checkbox = document.getElementById(`default_${inputId}`);
                const input = document.getElementById(inputId);

                if (checkbox.checked) {
                    input.value = defaultValue;
                } else {
                    input.value = ''; // Clear the value if unchecked
                }
            }

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
    @endif --}}
@endsection
