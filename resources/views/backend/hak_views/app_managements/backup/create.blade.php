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
        <div class="col-md-6">
            <!-- Database Backup Buttons -->
            <div class="mt-3 text-center">
                <button type="button" id="triggerDbBackup" class="btn btn-secondary btn-lg">Run Database Backup</button>
            </div>

            <!-- Database Backup Progress Bar Section -->
            <div class="mt-4" id="dbBackupProgressSection" style="display: none;">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;" id="dbBackupProgressBar">
                    </div>
                </div>
                <p class="mt-2 text-center font-weight-bold" id="dbProgressText">0%</p>
                <p class="mt-2 text-center text-success font-italic" id="dbBackupFileName"></p>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Full Backup Buttons -->
            <div class="mt-3 text-center">
                <button type="button" id="triggerFullBackup" class="btn btn-secondary btn-lg">Run Full Backup</button>
            </div>

            <!-- Full Backup Progress Bar Section -->
            <div class="mt-4" id="fullBackupProgressSection" style="display: none;">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"
                        id="fullBackupProgressBar">
                    </div>
                </div>
                <p class="mt-2 text-center font-weight-bold" id="fullProgressText">0%</p>
                <p class="mt-2 text-center text-success font-italic" id="fullBackupFileName"></p>
            </div>
        </div>
    </div>
@endsection

@section('footer_links')
    <script>
        document.getElementById('triggerDbBackup').addEventListener('click', function() {
            initiateBackup('{{ route('backups.manual.db.backup') }}', {
                progressSectionId: 'dbBackupProgressSection',
                progressBarId: 'dbBackupProgressBar',
                progressTextId: 'dbProgressText',
                fileNameId: 'dbBackupFileName',
                buttonId: 'triggerDbBackup',
                buttonLabel: 'Run Database Backup'
            });
        });

        document.getElementById('triggerFullBackup').addEventListener('click', function() {
            initiateBackup('{{ route('backups.manual.full.backup') }}', {
                progressSectionId: 'fullBackupProgressSection',
                progressBarId: 'fullBackupProgressBar',
                progressTextId: 'fullProgressText',
                fileNameId: 'fullBackupFileName',
                buttonId: 'triggerFullBackup',
                buttonLabel: 'Run Full Backup'
            });
        });


        function initiateBackup(url, {
            progressSectionId,
            progressBarId,
            progressTextId,
            fileNameId,
            buttonId,
            buttonLabel
        }) {
            const section = document.getElementById(progressSectionId);
            const bar = document.getElementById(progressBarId);
            const text = document.getElementById(progressTextId);
            const fileElement = document.getElementById(fileNameId);
            const button = document.getElementById(buttonId);

            // Display the progress section
            section.style.display = 'block';
            button.disabled = true;
            button.textContent = 'Processing...';

            // Reset the progress bar and text
            bar.style.width = '0%';
            bar.setAttribute('aria-valuenow', '0');
            text.textContent = '0%';
            fileElement.textContent = '';

            // Display a message based on the button action
            if (buttonId === 'triggerFullBackup') {
                toastr.info('Full backup is being started, please wait...');
            }

            fetch(url, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        let progress = 0;
                        const interval = setInterval(() => {
                            progress += 10;
                            bar.style.width = `${progress}%`;
                            bar.setAttribute('aria-valuenow', progress);
                            text.textContent = `${progress}%`;

                            if (progress >= 100) {
                                clearInterval(interval);
                                text.textContent = 'Backup Completed!';
                                fileElement.innerHTML =
                                    `<a href="${data.downloadUrl}" download>${data.fileName}</a>`;
                                fileElement.classList.add('font-weight-bold');

                                toastr.success('Backup completed successfully!', `File Name: ${data.fileName}`);

                                button.disabled = false;
                                button.textContent = buttonLabel;
                            }
                        }, 500);
                    } else {
                        throw new Error(data.message || 'Backup failed');
                    }
                })
                .catch(error => {
                    text.textContent = '0%';
                    bar.style.width = '0%';

                    toastr.error('Error during backup', error.message);

                    button.disabled = false;
                    button.textContent = buttonLabel;
                });
        }
    </script>
@endsection
