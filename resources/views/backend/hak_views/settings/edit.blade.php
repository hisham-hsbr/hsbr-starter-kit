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
        <form role="form" action="{{ route($routeName . '.update', encrypt($settings->id)) }}" method="post"
            enctype="multipart/form-data" id="quickForm">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="card-body">
                <div class="row">


                    <div class="col-md-4 form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') ?? $settings->name }}"
                            class="form-control" placeholder="Enter name" readonly required>
                        <x-backend.form.form-field-error-message name="name" />

                    </div>
                    <div class="col-md-4 form-group">
                        <label for="model">Model</label>
                        <input type="text" name="model" id="model" value="{{ old('model') ?? $settings->model }}"
                            class="form-control" placeholder="Enter model" required>
                        <x-backend.form.form-field-error-message name="model" />

                    </div>
                    <div class="col-md-4 form-group">
                        <label for="data">Data</label>
                        <input type="text" name="data" id="data" value="{{ old('data') ?? $settings->data }}"
                            class="form-control" placeholder="Enter data">
                        <x-backend.form.form-field-error-message name="data" />

                    </div>
                    <div class="col-md-4 form-group">
                        <label for="default_value">Default Value</label>
                        <input type="text" name="default_value" id="default_value"
                            value="{{ old('default_value') ?? $settings->default_value }}" class="form-control"
                            placeholder="Enter default value" required>
                        <x-backend.form.form-field-error-message name="default_value" />

                    </div>
                    <div class="col-md-4 form-group">
                        <label for="value">Value</label>
                        <input type="text" name="value" id="value" value="{{ old('value') ?? $settings->value }}"
                            class="form-control" placeholder="Enter value" required>
                        <x-backend.form.form-field-error-message name="value" />

                    </div>
                    <div class="col-md-4 form-group">
                        <label for="type">Type</label>
                        <input type="text" name="type" id="type" value="{{ old('type') ?? $settings->type }}"
                            class="form-control" placeholder="Enter type">
                        <x-backend.form.form-field-error-message name="type" />

                    </div>
                    <div class="col-md-4 form-group">
                        <label for="group">Group</label>
                        <input type="text" name="group" id="group" value="{{ old('group') ?? $settings->group }}"
                            class="form-control" placeholder="Enter group" required>
                        <x-backend.form.form-field-error-message name="group" />

                    </div>
                    <div class="col-md-4 form-group">
                        <label for="parent">Parent</label>
                        <input type="text" name="parent" id="parent"
                            value="{{ old('parent') ?? $settings->parent }}" class="form-control"
                            placeholder="Enter parent" required>
                        <x-backend.form.form-field-error-message name="parent" />

                    </div>
                    <div class="col-md-4 form-group">
                        <label for="permission">Permission</label>
                        <input type="text" name="permission" id="permission"
                            value="{{ old('permission') ?? $settings->permission }}" class="form-control"
                            placeholder="Enter permission" required>
                        <x-backend.form.form-field-error-message name="permission" />

                    </div>
                    <div class="col-md-4 form-group">
                        <label for="default_by">Default By</label>
                        <input type="text" name="default_by" id="default_by"
                            value="{{ old('default_by') ?? $settings->default_by }}" class="form-control"
                            placeholder="Enter default by" required>
                        <x-backend.form.form-field-error-message name="default_by" />

                    </div>
                    <div class="col-md-4 form-group">
                        <label for="form_type">Form Type</label>
                        <select class="form-control" id="form_type" name="form_type" required>
                            <option value="text" {{ $settings->form_type == 'text' ? 'selected' : '' }}>Text</option>
                            <option value="select" {{ $settings->form_type == 'select' ? 'selected' : '' }}>Select Box
                            </option>
                            <option value="checkbox" {{ $settings->form_type == 'checkbox' ? 'selected' : '' }}>Check Box
                            </option>
                        </select>
                        <x-backend.form.form-field-error-message name="form_type" />

                    </div>
                    <div class="col-md-4 form-group">
                        <label for="form_data">Form Data</label>
                        <input type="text" name="form_data" id="form_data"
                            value="{{ old('form_data') ?? $settings->form_data }}" class="form-control"
                            placeholder="Enter form data">
                        <x-backend.form.form-field-error-message name="form_data" />

                    </div>
                    <div class="col-md-4 form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description"
                            value="{{ old('description') ?? $settings->description }}" class="form-control"
                            placeholder="Enter description">
                        <x-backend.form.form-field-error-message name="description" />

                    </div>
                    <div class="col-md-4 form-group">
                        <label for="edit_description">Edit Description</label>
                        <input type="text" name="edit_description" id="edit_description"
                            value="{{ old('edit_description') ?? $settings->edit_description }}" class="form-control"
                            placeholder="Enter edit description" required>
                        <x-backend.form.form-field-error-message name="edit_description" />

                    </div>

                </div>
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
