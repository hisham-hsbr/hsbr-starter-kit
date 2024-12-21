@if (session('alert_password_change'))
    <script>
        @if (request()->url() == route('user.profile.edit'))
            // Show SweetAlert with only "OK" button
            Swal.fire({
                title: 'Password Change Reminder',
                text: 'Your password will expire soon. Please change it to maintain account security.',
                icon: 'warning',
                confirmButtonText: 'OK',
            });
        @else
            // Show SweetAlert with "Change Now" button
            Swal.fire({
                title: 'Password Change Reminder',
                text: 'Your password will expire soon. Please change it to maintain account security.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Change Now',
                cancelButtonText: 'Remind Me Later',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the profile edit page
                    window.location.href = "{{ route('user.profile.edit') }}";
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    console.log('User chose to be reminded later.');
                }
            });
        @endif
    </script>
@endif
{{-- @if (session('alert_password_change'))
    <script>
        Swal.fire({
            title: 'Password Change Reminder',
            text: 'Your OTP password will expire soon. Please change it to maintain account security.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Change Now',
            cancelButtonText: 'Remind Me Later',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('user.profile.edit') }}";
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                console.log('User chose to be reminded later.');
            }
        });
    </script>
@endif --}}
