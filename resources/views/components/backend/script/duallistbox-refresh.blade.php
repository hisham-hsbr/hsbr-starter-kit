<div class="col-12">
    <div class="form-group">
        <label for="{{ $name }}">{{ Str::of($title)->replace('_', ' ')->title() }}
            <button id="refresh-{{ $name }}" class="btn btn-sm btn-secondary" type="button">
                <i class="fas fa-sync-alt" id="refresh-icon-{{ $name }}"></i>
            </button>
        </label>
        <select name="{{ $name }}[]" id="{{ $name }}" class="duallistbox" multiple="multiple">
            @foreach ($items as $item)
                {{-- <option value="{{ $item['id'] }}">{{ $item['name'] }}</option> --}}
                <option value="{{ $item['id'] }}" @if (isset($selectedItems) && in_array($item['id'], $selectedItems)) selected @endif>
                    {{ $item['name'] }}
                </option>
            @endforeach
        </select>
        <x-backend.form.form-field-error-message :name="$name" />

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const refreshUrl = @json(route($routeName));
        const refreshButton = document.getElementById('refresh-{{ $name }}');
        const refreshIcon = document.getElementById('refresh-icon-{{ $name }}');
        const itemSelect = document.getElementById('{{ $name }}');

        refreshButton.addEventListener('click', function() {
            // Disable button and show spinner
            refreshButton.disabled = true;
            refreshIcon.classList.add('fa-spin'); // Adds a spinning effect

            fetch(refreshUrl)
                .then(response => response.json())
                .then(data => {
                    // Clear existing options
                    itemSelect.innerHTML = '';

                    // Populate with updated options
                    data.{{ $name }}.forEach({{ $name }} => {
                        const option = document.createElement('option');
                        option.value = {{ $name }}.id;
                        option.textContent = {{ $name }}.name;
                        // Add selected attribute conditionally
                        if ({{ $name }}.selected) {
                            option.setAttribute('selectedItems',
                                'selected'); // Correctly set the attribute
                        }
                        itemSelect.appendChild(option);
                    });
                    // Reinitialize duallistbox (if applicable)
                    $('.duallistbox').bootstrapDualListbox('refresh');
                    // Success Toastr Notification
                    toastr.success(
                        "{{ Str::of($name)->replace('_', ' ')->title() }} refreshed successfully!"
                    );
                })
                .catch(() => {
                    // Error Toastr Notification
                    toastr.error(
                        "Failed to refresh {{ Str::of($name)->replace('_', ' ')->title() }}. Please try again."
                    );
                })
                .finally(() => {
                    // Enable button and remove spinner
                    refreshButton.disabled = false;
                    refreshIcon.classList.remove('fa-spin');
                });
        });
    });
</script>
