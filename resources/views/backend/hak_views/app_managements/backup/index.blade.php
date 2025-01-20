@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | {{ ucwords(__('my.index')) }}
@endsection
@section('page_header_name')
    {{ $headName }} - {{ ucwords(__('my.index')) }}
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
    <div class="mb-4 d-flex justify-content-end">

        <button type="button" class="mr-2 btn btn-secondary" data-toggle="modal" data-target="#settingsModal">
            <i class="fas fa-cog"></i> Settings
        </button>
        <a type="button" href="{{ route($routeName . '.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
            Manual</a>
        <x-backend.model.model-settings :model="$model" :settings="$settings" :routeName='$routeName' />

    </div>
    <x-backend.layout_partials.card cardTitle="Current Backup System" cardFooter="" :cardTools=true>

        <div style="" class="p-3 form-group row">
            <div class="col-sm-6">
                <label class="col-sm-4">Backup Manual Schedule</label>
                <label><code>: {{ $backup_schedule_frequencies }}</code></label>
            </div>
            <div class="col-sm-6">
                <label class="col-sm-4">Backup Manual Time</label>
                <label><code>: {{ $inside_bracket }}</code></label>
            </div>
            <div class="col-sm-6">
                <label class="col-sm-4">Last backup date and time</label>
                <label><code>: {{ $lastBackupTime->format('d-M-Y h:i A') }}
                        ({{ $lastBackupTime->timezoneName }})</code></label>
            </div>
        </div>
    </x-backend.layout_partials.card>

    <x-backend.layout_partials.card cardTitle="Backups" cardFooter="" :cardTools=true>
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>File Name</th>
                            <th>Size (MB)</th>
                            <th>Last Modified</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fileDetails as $file)
                            <tr>
                                <td>{{ $file['name'] }}</td>
                                <td>{{ number_format($file['size'] / 1048576, 2) }} MB</td> <!-- Convert bytes to MB -->
                                <td>{{ \Carbon\Carbon::parse($file['last_modified'])->format('d-M-Y h:i A') }}</td>
                                <td>
                                    <a href="{{ route('backups.download.backup', ['file' => urlencode($file['name'])]) }}"
                                        class="btn btn-primary">Download</a>
                                    <button class="btn btn-danger delete-file-btn"
                                        data-file="{{ $file['name'] }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-backend.layout_partials.card>
@endsection
@section('footer_links')
    <script>
        $(function() {
            $("#example1")
                .DataTable({
                    responsive: true,
                    lengthChange: false,
                    autoWidth: false,
                    buttons: ["excel", "pdf", "print"],
                    order: [
                        [2, 'desc']
                    ], // Sort by the 3rd column (index starts from 0), 'desc' for descending
                    columnDefs: [{
                            targets: 2,
                            type: 'date'
                        } // Specify the date column
                    ],
                })
                .buttons()
                .container()
                .appendTo("#example1_wrapper .col-md-6:eq(0)");
        });
    </script>
    <script>
        $(document).on('click', '.delete-file-btn', function() {
            const fileName = $(this).data('file');

            if (confirm('Are you sure you want to delete this file?')) {
                $.ajax({
                    url: "{{ route('backups.delete.backup') }}",
                    method: "POST",
                    data: {
                        file: fileName,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            location.reload(); // Reload the page to update the table
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr) {
                        alert('An error occurred: ' + xhr.responseJSON.message);
                    }
                });
            }
        });
    </script>


    <x-backend.script.keyboard-shortcut key="n" button_id="name" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="e" button_id="email" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="g" button_id="gender" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="t" button_id="time_zone_id" type="alt" event="focus" />
@endsection
