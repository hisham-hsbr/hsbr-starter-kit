@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | {{ ucwords(__('my.index')) }}
@endsection
@section('page_header_name')
    {{ $headName }} - {{ ucwords(__('my.index')) }}
@endsection
@section('head_links')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection
@section('breadcrumbs')
    <x-backend.layout_partials.page-breadcrumb-item pageName="Dashboard" pageHref="{{ route('backend.dashboard') }}"
        :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="{{ $headName }}"
        pageHref="{{ route($routeName . '.index') }}" :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="Create" pageHref="" :active="true" />
@endsection

@section('main_content')
    <div class="mb-4 d-flex justify-content-end">

        <button type="button" class="mr-2 btn btn-secondary" data-toggle="modal" data-target="#settingsModal">
            <i class="fas fa-cog"></i> Settings
        </button>
        <x-backend.model.model-settings :model="$model" :settings="$settings" :routeName='$routeName' />

        <a type="button" href="{{ route($routeName . '.controls') }}" class="btn btn-primary"><i
                class="fas fa-sliders-h"></i>
            controls</a>

    </div>

    <x-backend.layout_partials.card cardTitle="Jobs Queue" cardFooter="" :cardTools=true>
        <div class="row">
            <div class="col-12">
                <!-- Jobs Table -->
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Queue</th>
                                <th>Attempts</th>
                                <th>Data</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ $job['id'] }}</td>
                                    <td>{{ $job['queue'] }}</td>
                                    <td>{{ $job['attempts'] }}</td>
                                    <td>
                                        @foreach ($job['data'] as $key => $value)
                                            <strong>{{ $key }}:</strong> {{ $value }}<br>
                                        @endforeach
                                    </td>
                                    <td>{{ $job['created_at'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </x-backend.layout_partials.card>
    <x-backend.layout_partials.card cardTitle="Failed Jobs" cardFooter="" :cardTools=true>

        <div class="mt-4 row">
            <div class="col-12">
                <!-- Failed Jobs Table -->
                <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Queue</th>
                                <th>Data</th>
                                <th>Exception</th>
                                <th>Failed At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($failedJobs as $job)
                                <tr>
                                    <td>{{ $job['id'] }}</td>
                                    <td>{{ $job['queue'] }}</td>
                                    <td>
                                        @foreach ($job['data'] as $key => $value)
                                            <strong>{{ $key }}:</strong> {{ $value }}<br>
                                        @endforeach
                                    </td>
                                    <td>{{ $job['exception'] }}</td>
                                    <td>{{ $job['failed_at'] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No failed jobs found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-backend.layout_partials.card>
@endsection

@section('footer_links')
    <script>
        $(function() {
            // Initialize DataTables for both tables
            $("#example1, #example2").DataTable({
                responsive: true, // Enable responsive behavior
                lengthChange: false,
                autoWidth: false,
                buttons: ["excel", "pdf", "print"], // Add buttons
                order: [
                    [0, 'desc']
                ], // Order by first column, descending
            }).buttons().container().appendTo('.dataTables_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
