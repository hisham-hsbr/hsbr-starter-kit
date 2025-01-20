<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>


<script>
    document.getElementById('avatar').addEventListener('change', function(e) {
        const file = this.files[0];

        // Validate file type
        const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!allowedTypes.includes(file.type)) {
            toastr.error('Invalid file type. Please select a JPEG, PNG, or JPG file.');
            this.value = ''; // Reset the input
            return;
        }

        // Show modal for cropping
        $('#avatarModal').modal('show');

        // Load and preview the image
        const reader = new FileReader();
        reader.onload = function(e) {
            const image = document.getElementById('image-preview');
            image.src = e.target.result;

            // Show crop container and initialize Cropper
            document.getElementById('crop-container').style.display = 'block';
            if (window.cropper) {
                window.cropper.destroy(); // Destroy any previous instance
            }
            window.cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 2,
            });

            // Show the "Crop & Save" button
            document.getElementById('crop-btn').style.display = 'inline-block';
        };
        reader.readAsDataURL(file);
    });

    // Handle Crop & Save
    document.getElementById('crop-btn').addEventListener('click', function() {
        const croppedCanvas = window.cropper.getCroppedCanvas();
        croppedCanvas.toBlob(function(blob) {
            const formData = new FormData();
            formData.append('avatar', blob, 'avatar.jpg');
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'PATCH');

            // Send cropped image to server
            fetch('{{ route('user.profile.avatar.update') }}', {
                    method: 'POST', // POST with method spoofing to PATCH
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message_success) {
                        toastr.success(data.message_success);
                        $('#avatarModal').modal('hide'); // Close modal
                        location.reload(); // Refresh page
                    } else {
                        toastr.error('Error updating avatar.');
                    }
                })
                .catch(error => {
                    console.error(error);
                    toastr.error('Something went wrong.');
                });
        });
    });





    // Reset modal on close
    $('#avatarModal').on('hidden.bs.modal', function() {
        document.getElementById('avatar').value = ''; // Reset file input
        document.getElementById('crop-container').style.display = 'none'; // Hide crop container
        document.getElementById('crop-btn').style.display = 'none'; // Hide crop button

        if (window.cropper) {
            window.cropper.destroy(); // Destroy Cropper instance
            window.cropper = null;
        }
    });
</script>
