@extends('backend.layouts.app')

@section('page_title')
    {{ $headName }} | Model Settings
@endsection

@section('page_header_name')
    {{ $headName }} - Model Settings
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
        <form role="form" action="{{ route('settings.general.settings.update') }}" method="post"
            enctype="multipart/form-data" id="quickForm">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="row">
                <div class="col-12">
                    <!-- Search Bar -->
                    <div class="form-group row">
                        <label for="search" class="col-sm-2 col-form-label">Search Settings</label>
                        <div class="col-sm-6">
                            <input type="text" id="search" class="form-control"
                                placeholder="Search by Setting Name, Model, Group, or Parent">
                        </div>
                    </div>

                    <!-- Model Filter Dropdown -->
                    <div class="form-group row">
                        <label for="modelFilter" class="col-sm-2 col-form-label">Filter by Model</label>
                        <div class="col-sm-6">
                            <select id="modelFilter" class="form-control">
                                <option value="">All Models</option>
                                @foreach ($settings->pluck('model')->unique()->filter()->sort() as $model)
                                    <option value="{{ $model }}">{{ $model }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Settings Table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Setting Name</th>
                                <th>Default Value</th>
                                <th>Input</th>
                                <th>Model</th>
                                <th>Group</th>
                                <th>Parent</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($settings as $setting)
                                <tr>
                                    <td>{{ Str::of($setting->name)->replace('_', ' ')->title() }}
                                        <br><code>{{ $setting->name }}</code>
                                        @if (Auth::user() && Auth::user()->hasRole('Developer'))
                                            <a href="{{ route('settings.edit', encrypt($setting->id)) }}" class="">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endif

                                    </td>
                                    <td>
                                        <div class="form-check">
                                            @if ($setting->form_type == 'text')
                                                <input class="form-check-input" type="checkbox"
                                                    name="default_{{ $setting->name }}" id="default_{{ $setting->name }}"
                                                    onchange="setDefaultValue('{{ $setting->name }}', '{{ $setting->default_value }}')">
                                            @endif
                                            <label class="form-check-label" for="default_{{ $setting->name }}">
                                                Default value <span class="text-info"> :
                                                    ({{ $setting->default_value }})
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($setting->form_type == 'text')
                                            <input type="text" class="form-control" name="{{ $setting->name }}"
                                                id="{{ $setting->name }}" value="{{ $setting->value }}"
                                                oninput="checkDefaultValue('{{ $setting->name }}', '{{ $setting->default_value }}')">
                                            <x-backend.form.form-field-error-message name="{{ $setting->name }}" />
                                        @endif
                                        @if ($setting->form_type == 'select')
                                            @if (!empty($setting->form_data) && is_array($setting->form_data))
                                                <select class="form-control" id="{{ $setting->name }}"
                                                    name="{{ $setting->name }}">
                                                    @foreach ($setting->form_data as $item)
                                                        <option value="{{ $item }}"
                                                            {{ $setting->value == $item ? 'selected' : '' }}>
                                                            {{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        @endif
                                        @if ($setting->form_type == 'checkbox')
                                            <div class="form-check">
                                                <input type="hidden" name="{{ $setting->name }}" value="0">
                                                <input type="checkbox" class="form-check-input" name="{{ $setting->name }}"
                                                    @if ($setting->value == 1) {{ 'checked' }} @endif
                                                    id="{{ $setting->name }}" value="1">
                                                <label class="form-check-label" for="{{ $setting->name }}">
                                                    @if (!empty($setting->form_data) && is_array($setting->form_data))
                                                        @foreach ($setting->form_data as $item)
                                                            {{ $item }}
                                                        @endforeach
                                                    @endif
                                                </label>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <h3 class="card-title">{{ $setting->model ?? 'N/A' }}</h3>
                                    </td>
                                    <td>
                                        <h3 class="card-title">{{ $setting->group ?? 'N/A' }}</h3>
                                    </td>
                                    <td>
                                        <h3 class="card-title">{{ $setting->parent ?? 'N/A' }}</h3>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="float-right ml-1 btn btn-primary"
                            id="updateButton"><u>U</u>pdate</button>
                        <a type="button" href="{{ route($routeName . '.index') }}" id="backButton"
                            class="float-right ml-1 btn btn-warning"><u>B</u>ack</a>
                    </div>
                </div>
            </div>
        </form>
    </x-backend.layout_partials.card>
@endsection

@section('footer_links')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const modelFilter = document.getElementById('modelFilter');
            const tableRows = document.querySelectorAll('tbody tr');

            function filterTable() {
                const filterText = searchInput.value.toLowerCase();
                const selectedModel = modelFilter.value.toLowerCase();

                tableRows.forEach(row => {
                    const searchableText = Array.from(row.querySelectorAll('td'))
                        .map(cell => cell.textContent.toLowerCase())
                        .join(' ');

                    const modelText = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

                    const textMatch = searchableText.includes(filterText);
                    const modelMatch = selectedModel === '' || modelText.includes(selectedModel);

                    row.style.display = textMatch && modelMatch ? '' : 'none';
                });
            }

            searchInput.addEventListener('input', filterTable);
            modelFilter.addEventListener('change', filterTable);
        });

        function setDefaultValue(inputId, defaultValue) {
            const checkbox = document.getElementById(`default_${inputId}`);
            const input = document.getElementById(inputId);

            if (checkbox.checked) {
                input.value = defaultValue;
                input.readOnly = true;
            } else {
                input.readOnly = false;
            }
        }

        function checkDefaultValue(inputId, defaultValue) {
            const input = document.getElementById(inputId);
            const checkbox = document.getElementById(`default_${inputId}`);

            checkbox.checked = input.value === defaultValue;
            input.readOnly = checkbox.checked;
        }
    </script>

    <x-backend.script.keyboard-shortcut key="u" button_id="updateButton" type="ctrl&alt" event="click" />
    <x-backend.script.keyboard-shortcut key="b" button_id="backButton" type="ctrl&alt" event="click" />
@endsection
