{{--
test-demos
--}}
<script>
    $(document).ready(function() {
        var table = $('#example1').DataTable({
            processing: true,
            serverSide: true,
            scrollY: '80vh',
            scrollX: true,
            scrollCollapse: true,
            ajax: "{{ route('activity.logs.get') }}", // Route for your data source
            columns: [
                @can('{{ $permissionName }} Read')
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                @endcan
                @can('{{ $permissionName }} Log Name')
                    {
                        data: 'log_name',
                        name: 'log_name',
                        width: '100%',
                        defaultContent: ''
                    },
                @endcan
                @can('{{ $permissionName }} Description')
                    {
                        data: 'description',
                        name: 'description',
                        width: '100%',
                        defaultContent: ''
                    },
                @endcan
                @can('{{ $permissionName }} Read Event')
                    {
                        data: 'event',
                        name: 'event',
                        width: '100%',
                        defaultContent: ''
                    },
                @endcan
                @can('{{ $permissionName }} Created User')
                    {
                        data: 'causer_name',
                        name: 'causer_name',
                        width: '100%',
                        defaultContent: ''
                    },
                @endcan
                @can('{{ $permissionName }} Read Created At')
                    {
                        data: 'created_at',
                        name: 'created_at',
                        width: '100%',
                        defaultContent: ''
                    },
                @endcan
                @can('{{ $permissionName }} Read View')
                    {
                        data: 'viewLink',
                        name: 'viewLink',
                        width: '100%',
                        defaultContent: ''
                    },
                @endcan
            ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],

            ///////

            "fnDrawCallback": function(oSettings) {

                $('.delete-item_delete').on('click', function() {
                    var itemID = $(this).data('item_delete_id');
                    var itemName = this.getAttribute('data-value');

                    // Set the item name in the modal
                    $('#modal-item-name').text(itemName);

                    // Show the modal
                    $('#deleteConfirmModal').modal('show');

                    // Handle the delete action when the user confirms
                    $('#confirmDeleteBtn').off('click').on('click', function() {
                        var myHeaders = new Headers({
                            "X-CSRF-TOKEN": $("input[name='_token']").val()
                        });

                        fetch("{{ route('activity.logs.destroy', '') }}/" +
                            itemID, {
                                method: 'DELETE',
                                headers: myHeaders,
                            }).then(function(response) {
                            return response.json();
                        }).then(function(data) {
                            // Hide the modal
                            $('#deleteConfirmModal').modal('hide');

                            if (data.success) {
                                // Success: Reload the DataTable and show a success message
                                $('#example1').DataTable().ajax.reload();
                                toastr.success(data.message || itemName +
                                    " deleted successfully.");
                            } else {
                                // Error: Show the error message
                                toastr.error(data.error ||
                                    "Failed to delete " + itemName +
                                    ". Please try again.");
                            }
                        }).catch(function(error) {
                            // Handle any unexpected errors
                            $('#deleteConfirmModal').modal('hide');
                            toastr.error(
                                "An unexpected error occurred. Please try again."
                            );
                        });

                        // Set toastr options
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-center",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "3000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };
                        toastr.clear();
                    });
                });



                // force delete
                $('.delete-item_delete_force').on('click', function() {
                    var itemID = $(this).data('item_delete_force_id');
                    var itemName = this.getAttribute('data-value');
                    $('#deleteConfirmInput').val('');
                    $('#confirmDeleteButton').prop('disabled', true);
                    $('#itemNameInModal').text(itemName); // Set the item name in the modal

                    var modal = new bootstrap.Modal(document.getElementById(
                        'forceDeleteConfirmModal'), {});
                    modal.show();

                    // Enable confirm button only when "delete" is typed
                    $('#deleteConfirmInput').on('input', function() {
                        if ($(this).val().toLowerCase() === 'delete') {
                            $('#confirmDeleteButton').prop('disabled', false);
                        } else {
                            $('#confirmDeleteButton').prop('disabled', true);
                        }
                    });

                    $('#confirmDeleteButton').off('click').on('click', function() {
                        var myHeaders = new Headers({
                            "X-CSRF-TOKEN": $("input[name='_token']").val()
                        });

                        fetch("{{ route('activity.logs.force.destroy', '') }}/" +
                                itemID, {
                                    method: 'DELETE',
                                    headers: myHeaders,
                                })
                            .then(function(response) {
                                return response.json();
                            })
                            .then(function(data) {
                                // Hide the modal
                                modal.hide();

                                if (data.success) {
                                    // Success: Reload the DataTable and show a success message
                                    $('#example1').DataTable().ajax.reload();
                                    toastr.success(data.message || itemName +
                                        " deleted successfully.");
                                } else {
                                    // Error: Show the error message
                                    toastr.error(data.error ||
                                        "Failed to delete " + itemName +
                                        ". Please try again.");
                                }
                            })
                            .catch(function(error) {
                                // Handle any unexpected errors
                                modal.hide();
                                toastr.error(
                                    "An unexpected error occurred. Please try again."
                                );
                            });

                        // Set toastr options
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-center",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "3000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };
                        toastr.clear();
                    });
                });

                toastr.clear();



            },

            ////////
        });

        // Function to apply filters on "Apply Filters" button click
        function applyFilters() {
            // Loop through each filter input and apply the search on DataTable
            $('.filter-input').each(function() {
                table.column($(this).data('column')).search($(this).val());
            });

            // Loop through each filter select and apply the search on DataTable
            $('.filter-select').each(function() {
                table.column($(this).data('column')).search($(this).val());
            });


            let codeValue = $('#code').val();
            $('#selectedCodeContainer').toggle(Boolean(codeValue));
            $('#selectedCodeLabel').text(codeValue || 'None');

            let nameValue = $('#name').val();
            $('#selectednameContainer').toggle(Boolean(nameValue));
            $('#selectednameLabel').text(nameValue || 'None');

            let createdByValue = $('#createdBy').val();
            $('#selectedcreatedByContainer').toggle(Boolean(createdByValue));
            $('#selectedcreatedByLabel').text(createdByValue || 'None');

            let updatedByValue = $('#updatedBy').val();
            $('#selectedupdatedByContainer').toggle(Boolean(updatedByValue));
            $('#selectedupdatedByLabel').text(updatedByValue || 'None');

            // Check if all containers are hidden, and toggle the visibility of the
            if (!codeValue && !nameValue && !createdByValue && !updatedByValue) {
                $('#filterModalButton').show();
                $('#filteredData').hide();
            } else {
                $('#filterModalButton').hide();
                $('#filteredData').show();
            }


            // Redraw the table after applying all filters
            table.draw();

            // Close the modal
            $('#filterModal').modal('hide');
        }

        // Function to reset filters on "Reset" button click
        function resetFilters() {
            // Clear all input fields
            $('.filter-input').val('');
            // Reset all select fields to default value
            $('.filter-select').prop('selectedIndex', 0);
            // Clear all DataTable search filters
            table.columns().search('');
            $('#filterModalButton').show();
            $('#filteredData').hide();
            // Redraw the table without filters
            table.draw();
        }

        // Attach the applyFilters function to the "Apply Filters" button click event
        $('#applyFiltersBtn').on('click', function() {
            applyFilters();
        });

        // Attach the resetFilters function to the "Reset" button click event
        $('#resetFiltersBtn').on('click', function() {
            resetFilters();
        });
    });
</script>
