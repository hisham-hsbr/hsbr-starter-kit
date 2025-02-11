<!-- jQuery -->
<script src="{{ asset('backend/admin_lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('backend/admin_lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/admin_lte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('backend/admin_lte/dist/js/demo.js') }}"></script> --}}
<!-- Toastr -->
<script src="{{ asset('backend/admin_lte/plugins/toastr/toastr.min.js') }}"></script>
<!-- jquery-validation -->
<script src="{{ asset('backend/admin_lte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('backend/admin_lte/plugins/jquery-validation/additional-methods.min.js') }}"></script>

<x-app.message.message />

<x-backend.links.page-loading-ajax-footer />
<x-backend.links.google-translate-footer />
<x-backend.links.datatable-footer-links />



<script>
    function checkNotifications() {
        $.ajax({
            url: "{{ route('notifications.unread.notifications') }}",
            method: "GET",
            global: false, // Prevents triggering the spinner
            success: function(data) {
                if (data.length > 0) {
                    let latestNotification = data[0]; // Get the latest notification

                    // Get the last seen notification time from localStorage
                    let lastNotificationTime = localStorage.getItem("lastNotificationTime");

                    // Extract timestamp of the latest notification
                    let latestNotificationTime = new Date(latestNotification.created_at).getTime();

                    // Show notification only if it's newer than the last seen notification
                    if (!lastNotificationTime || latestNotificationTime > lastNotificationTime) {
                        localStorage.setItem("lastNotificationTime",
                            latestNotificationTime); // Store latest time

                        // Create a well-styled notification message with a button-style link
                        let notificationMessage = `
                        <div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                            <p style="margin: 0; font-size: 14px;">${latestNotification.data.subject}</p>
                            <a href="{{ route('notifications.show') }}" target="_blank"
                                style="margin-top: 8px; display: inline-block; padding: 6px 12px; background-color: #007bff; color: #fff;
                                text-decoration: none; border-radius: 4px; font-weight: bold;">
                                View Notification
                            </a>
                        </div>`;

                        // Show the toaster notification at the **bottom right of the screen**
                        toastr.success(notificationMessage, 'New Notification', {
                            timeOut: 10000, // Auto-close in 10 seconds
                            closeButton: true,
                            progressBar: true,
                            extendedTimeOut: 1000,
                            positionClass: "toast-bottom-right", // 🚀 Positioned at the bottom right
                            escapeHtml: false // Allows HTML inside the toastr message
                        });
                    }
                }
            }
        });
    }

    // Run `checkNotifications()` every 10 seconds
    setInterval(checkNotifications, 10000);
</script>

@yield('footer_links')
