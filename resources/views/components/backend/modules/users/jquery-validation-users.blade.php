<script>
    $(function() {
        let encryptedUserId = $("#encryptedUserId").val(); // Get the encrypted user ID from the hidden input

        // Initialize the form validation
        let validator = $('#quickForm').validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: @json(route('users.check.email')), // Server-side route for validation
                        type: "post",
                        data: {
                            email: function() {
                                return $("#email").val();
                            },
                            user_id: function() {
                                return encryptedUserId; // Include the encrypted user ID
                            },
                            _token: "{{ csrf_token() }}"
                        },
                        dataFilter: function(response) {
                            var json = JSON.parse(response);
                            return json.unique ? true : false;
                        }
                    }
                },
                gender: {
                    required: true,
                },
                time_zone_id: {
                    required: true,
                },
                rules: {
                    'roles[]': {
                        required: true
                    }
                },
            },
            messages: {
                name: {
                    required: "Please enter a name",
                },
                email: {
                    required: "Please enter an email",
                    email: "Please enter a valid email address.",
                    remote: "This email is already registered."
                },
                password: {
                    required: "Password is required.",
                    minlength: "Password must be at least 6 characters."
                },
                password_confirm: {
                    required: "Confirm password is required.",
                    equalTo: "Passwords do not match."
                },
                gender: {
                    required: "Please enter a gender",
                },
                time_zone_id: {
                    required: "Please enter a Time zone",
                },
                roles: {
                    required: "Please select at least one role",
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
                toastr.error(error.text());
            },
            highlight: function(element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
            }
        });

        // Dynamically add or remove validation rules for password fields
        $('#changePassword').on('change', function() {
            if ($(this).is(':checked')) {
                $('#password').rules('add', {
                    required: true,
                    minlength: 6,
                    messages: {
                        required: "Password is required.",
                        minlength: "Password must be at least 6 characters."
                    }
                });
                $('#password_confirm').rules('add', {
                    required: true,
                    equalTo: "#password",
                    messages: {
                        required: "Confirm password is required.",
                        equalTo: "Passwords do not match."
                    }
                });
            } else {
                $('#password').rules('remove');
                $('#password_confirm').rules('remove');
            }
        });
    });
</script>
