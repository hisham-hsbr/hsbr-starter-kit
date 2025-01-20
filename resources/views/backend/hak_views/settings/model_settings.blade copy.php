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
<x-backend.layout_partials.page-breadcrumb-item pageName="{{ $headName }}" pageHref="{{ route($routeName . '.index') }}"
    :active="false" />
<x-backend.layout_partials.page-breadcrumb-item pageName="Model Settings" pageHref="" :active="true" />
@endsection

@section('main_content')
<x-backend.layout_partials.card cardTitle="" cardFooter="">
    @if ($settings->isEmpty())
    <div class="text-center alert alert-info">
        No settings available current " <span style="padding: 4px"
            class="rounded btn-secondary">{{ $modelSettings }}</span> " Model.
    </div>
    <a type="button" href="{{ url()->previous() }}" id="backButton"
        class="float-right ml-1 btn btn-warning"><u>B</u>ack</a>
    @else
    <form role="form" action="{{ route('settings.model.settings.update', encrypt($modelSettings)) }}" method="post"
        enctype="multipart/form-data" id="quickForm">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="row">
            <div class="col-12">

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
                            </td>
                            <td>
                                <div class="form-check">
                                    @if ($setting->form_type == 'text')
                                    <input class="form-check-input" type="checkbox" name="default_{{ $setting->name }}"
                                        id="default_{{ $setting->name }}"
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
                                <select class="form-control" id="{{ $setting->name }}" name="{{ $setting->name }}">
                                    @foreach ($setting->form_data as $item)
                                    <option value="{{ $item }}" {{ $setting->value == $item ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                    @endforeach
                                </select>
                                @endif
                                @endif
                                @if ($setting->form_type == 'checkbox')
                                <div class="form-check">
                                    <input type="hidden" name="{{ $setting->name }}" value="0">
                                    <input type="checkbox" class="form-check-input" name="{{ $setting->name }}" @if
                                        ($setting->value == 1) {{ 'checked' }} @endif
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
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="float-right ml-1 btn btn-primary">Update</button>
                        <a type="button" href="{{ route($routeName . '.index') }}" id="backButton"
                            class="float-right ml-1 btn btn-warning"><u>B</u>ack</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endif

    @if (!$settings->isEmpty())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach($settings as $setting)
            const input_ {
                {
                    $setting - > name
                }
            } = document.getElementById('{{ $setting->name }}');
            const checkbox_ {
                {
                    $setting - > name
                }
            } = document.getElementById(`default_{{ $setting->name }}`);
            if (input_ {
                    {
                        $setting - > name
                    }
                } && input_ {
                    {
                        $setting - > name
                    }
                }.value ===
                '{{ $setting->default_value }}') {
                checkbox_ {
                    {
                        $setting - > name
                    }
                }.checked = true;
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
    @endif
</x-backend.layout_partials.card>
@endsection

@section('footer_links')
@if (!$settings->isEmpty())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @foreach($settings as $setting)
        const input_ {
            {
                $setting - > name
            }
        } = document.getElementById('{{ $setting->name }}');
        const checkbox_ {
            {
                $setting - > name
            }
        } = document.getElementById(`default_{{ $setting->name }}`);
        if (input_ {
                {
                    $setting - > name
                }
            } && input_ {
                {
                    $setting - > name
                }
            }.value ===
            '{{ $setting->default_value }}') {
            checkbox_ {
                {
                    $setting - > name
                }
            }.checked = true;
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
@endif
@endsection