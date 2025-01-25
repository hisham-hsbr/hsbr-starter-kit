@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | {{ ucwords(__('my.show')) }}
@endsection
@section('page_header_name')
    {{ $headName }} - {{ ucwords(__('my.show')) }}
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
            Create</a>
        {{-- <x-backend.model.model-settings :model="$model" :settings="$settings" :routeName='$routeName' /> --}}

    </div>

    <x-backend.layout_partials.card cardTitle="Notifications" cardFooter="" :cardTools=true>
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <div class="">
                    <span>Unread Notifications: </span>
                    <span class="unread-count">{{ Auth::user()->unreadNotifications->count() }}</span>
                </div>
                <div id="accordion">
                    @foreach (Auth::user()->notifications as $notification)
                        <div class="card mb-3">
                            <div class="card-header p-0">
                                <a class="d-block text-dark text-decoration-none notification-header"
                                    data-id="{{ $notification->id }}" data-toggle="collapse"
                                    href="#collapse{{ $notification->id }}" style="padding: 15px;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">
                                            {{ $notification->data['subject'] }}
                                            @if (is_null($notification->read_at))
                                                <span class="badge badge-danger badge-pill ml-2 unread-badge"
                                                    id="badge-{{ $notification->id }}"
                                                    style="font-size: 0.75rem; padding: 0.2em 0.4em;">
                                                    Unread
                                                </span>
                                            @endif
                                        </h5>
                                        <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                    </div>
                                </a>
                            </div>
                            <div id="collapse{{ $notification->id }}" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <p>{{ $notification->data['body'] }}</p>
                                    <a class="btn btn-outline-primary btn-sm" data-toggle="collapse"
                                        href="#details{{ $notification->id }}" role="button" aria-expanded="false"
                                        aria-controls="details{{ $notification->id }}">
                                        View Details
                                    </a>
                                    <div class="collapse mt-3" id="details{{ $notification->id }}">
                                        <div class="alert alert-secondary">
                                            <strong>Additional Information:</strong>
                                            {{ $notification->data['additional_info'] ?? 'No extra details available.' }}
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <a href="javascript:void(0);" class="text-primary mark-unread-text"
                                            id="icon-{{ $notification->id }}" data-id="{{ $notification->id }}"
                                            title="Mark as Unread" style="cursor: pointer; font-size: 1rem;">
                                            Mark as Unread
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>

        <script>
            // Function to update unread notifications count dynamically
            function updateUnreadCount() {
                const unreadCountElement = document.querySelector('.unread-count');
                fetch('{{ route('notifications.unread.count') }}', {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            unreadCountElement.textContent = data.count; // Update the count
                        }
                    })
                    .catch(error => console.error('Error fetching unread count:', error));
            }

            // Event listener for marking notifications as read
            document.querySelectorAll('.notification-header').forEach(header => {
                header.addEventListener('click', function() {
                    const notificationId = this.getAttribute('data-id');
                    const badge = document.getElementById(`badge-${notificationId}`);

                    // Send AJAX request to mark as read
                    fetch('{{ route('notifications.read') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                id: notificationId
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Remove the badge if it exists
                                if (badge) badge.remove();
                                updateUnreadCount(); // Update unread count
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });

            // Event listener for marking notifications as unread
            document.querySelectorAll('.mark-unread-text').forEach(link => {
                link.addEventListener('click', function() {
                    const notificationId = this.getAttribute('data-id');
                    const badge = document.getElementById(`badge-${notificationId}`);

                    // Send AJAX request to mark as unread
                    fetch('{{ route('notifications.unread') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                id: notificationId
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Add the badge back to indicate "Unread"
                                if (!badge) {
                                    const newBadge = document.createElement('span');
                                    newBadge.className = 'badge badge-danger badge-pill ml-2';
                                    newBadge.id = `badge-${notificationId}`;
                                    newBadge.textContent = 'Unread';
                                    document.querySelector(`[data-id="${notificationId}"] h5`).appendChild(
                                        newBadge);
                                }
                                updateUnreadCount(); // Update unread count
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        </script>



        </div>
    </x-backend.layout_partials.card>
@endsection
@section('footer_links')
    <x-backend.script.keyboard-shortcut key="n" button_id="name" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="e" button_id="email" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="g" button_id="gender" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="t" button_id="time_zone_id" type="alt" event="focus" />
@endsection
