<div class="col-12">
    <div class="form-group">
        <label for="{{ $name }}">{{ Str::of($title)->replace('_', ' ')->title() }}
            <button id="refresh" class="btn btn-sm btn-secondary" type="button">
                <i class="fas fa-sync-alt" id="refresh-icon"></i> Refresh
            </button>
        </label>
        <select name="{{ $name }}[]" id="{{ $name }}" class="duallistbox" multiple="multiple">
            @foreach ($items as $item)
                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
            @endforeach
        </select>
    </div>
</div>

<!-- Include Toastr CSS and JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const refreshUrl = @json(route($routeName));
        const refreshButton = document.getElementById('refresh');
        const refreshIcon = document.getElementById('refresh-icon');
        const itemSelect = document.getElementById('{{ $name }}');

        refreshButton.addEventListener('click', function() {
            // Disable button and show spinner
            refreshButton.disabled = true;
            refreshIcon.classList.add('fa-spin'); // Adds a spinning effect

            fetch(refreshUrl)
                .then(response => response.json())
                .then(data => {
                    // Clear existing
                    itemSelect.innerHTML = '';

                    // Populate with updated
                    data.{{ $name }}.forEach({{ $name }} => {
                        const option = document.createElement('option');
                        option.value = {{ $name }}.id;
                        option.textContent = {{ $name }}.name;
                        itemSelect.appendChild(option);
                    });

                    // Reinitialize duallistbox (if applicable)
                    $('.duallistbox').bootstrapDualListbox('refresh');
                    // Success Toastr Notification
                    toastr.success(@json(Str::of($name)->replace('_', ' ')->title()) + ' Refreshed successfully!');

                })
                .catch(() => {
                    // Error Toastr Notification
                    toastr.error('Failed to refresh ' + @json(Str::of($name)->replace('_', ' ')->title()) +
                        '. Please try again.');

                })
                .finally(() => {
                    // Enable button and remove spinner
                    refreshButton.disabled = false;
                    refreshIcon.classList.remove('fa-spin');
                });
        });
    });
</script>
