    @extends('backend.layouts.app')
    @section('page_title', 'Test Demos')
    @section('page_header_name', 'Demo')
    @section('head_links')
        <x-backend.links.datatable-head-links />
    @endsection
    @section('breadcrumbs')
        <x-backend.layout_partials.page-breadcrumb-item pageName="Dashboard" pageHref="{{ route('backend.dashboard') }}"
            :active="false" />
        <x-backend.layout_partials.page-breadcrumb-item pageName="Test Demos" pageHref="{{ route('test-demos.index') }}"
            :active="false" />
        <x-backend.layout_partials.page-breadcrumb-item pageName="Index" pageHref="" :active="true" />
    @endsection

    @section('main_content')
        <x-backend.layout_partials.card card_title="Dashboard" card_footer="ftr">
            <div id="filteredData" class="callout callout-info" style="display: none;">
                <h5>Filter Applyed For!</h5>

                <p>
                <div class="row">
                    <div id="selectedCodeContainer" class="mt-3 col-md-3" style="display: none;">
                        <h6>Code as : <span class="badge badge-info"><span id="selectedCodeLabel"></span></span></h6>
                    </div>
                    <div id="selectednameContainer" class="mt-3 col-md-3" style="display: none;">
                        <h6>Name as : <span class="badge badge-info"><span id="selectednameLabel"></span></span></h6>
                    </div>
                    <div id="selectedcreatedByContainer" class="mt-3 col-md-3" style="display: none;">
                        <h6>CreatedBy as : <span class="badge badge-info"><span id="selectedcreatedByLabel"></span></span>
                        </h6>
                    </div>
                    <div id="selectedupdatedByContainer" class="mt-3 col-md-3" style="display: none;">
                        <h6>updatedBy as : <span class="badge badge-info"><span id="selectedupdatedByLabel"></span></span>
                        </h6>
                    </div>
                </div>

                </p>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-warning" id="resetFiltersBtn">Clear <i
                            class="fas fa-filter-circle-xmark"></i></button>
                </div>

            </div>

            <!-- Button to open the modal with Font Awesome filter icon aligned to the right -->
            <div class="mb-3 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filterModal">
                    <i class="fas fa-filter"></i>
                </button>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="filterModalLabel">Filter Options</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="myFilter" class="row">
                                @can('{{ $permissionName }} Read Code')
                                    <div class="form-group col-sm-6">
                                        <label class="col-form-label">Code</label>
                                        <input type="text" class="form-control filter-input" id="code"
                                            placeholder="Search Code" data-column="2" />
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read Name')
                                    <div class="form-group col-sm-6">
                                        <label class="col-form-label">Name</label>
                                        <input type="text" class="form-control filter-input" id="name"
                                            placeholder="Search Name" data-column="3" />
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read Created By')
                                    <div class="form-group col-sm-6">
                                        <label class="col-form-label">Created By</label>
                                        <select data-column="6" class="form-control select2 filter-select" id="createdBy">
                                            <option value="">Select Created By</option>
                                            @foreach ($createdByUsers as $createdByUser)
                                                <option value="{{ $createdByUser }}">{{ $createdByUser }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read Updated By')
                                    <div class="form-group col-sm-6">
                                        <label class="col-form-label">Updated By</label>
                                        <select data-column="7" class="form-control select2 filter-select" id="updatedBy">
                                            <option value="">Select Updated By</option>
                                            @foreach ($updatedByUsers as $updatedByUser)
                                                <option value="{{ $updatedByUser }}">{{ $updatedByUser }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- Apply Filters Button -->
                            <button type="button" class="btn btn-primary" id="applyFiltersBtn">Apply Filters</button>
                            <!-- Reset Filters Button -->
                            <button type="button" class="btn btn-secondary" id="resetFiltersBtn">Reset</button>
                        </div>
                    </div>
                </div>
            </div>







            <table id="example1" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        @can('{{ $permissionName }} Read')
                            <th>Sn</th>
                        @endcan
                        @can('{{ $permissionName }} Read Action')
                            <th width="20%">Action</th>
                        @endcan
                        @can('{{ $permissionName }} Read Code')
                            <th width="20%">Code</th>
                        @endcan
                        @can('{{ $permissionName }} Read Name')
                            <th width="20%">Name</th>
                        @endcan
                        @can('{{ $permissionName }} Read Local Name')
                            <th width="20%">Local Name</th>
                        @endcan
                        @can('{{ $permissionName }} Read Status')
                            <th width="10%">Status</th>
                        @endcan
                        @can('{{ $permissionName }} Read Created At')
                            <th width="20%">Created At</th>
                        @endcan
                        @can('{{ $permissionName }} Read Updated At')
                            <th width="20%">Updated At</th>
                        @endcan
                        @can('{{ $permissionName }} Read Created By')
                            <th width="20%">Created By</th>
                        @endcan
                        @can('{{ $permissionName }} Read Updated By')
                            <th width="20%">Updated By</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    {{-- data --}}
                </tbody>
                <tfoot>
                    <tr>
                        @can('{{ $permissionName }} Read')
                            <th>Sn</th>
                        @endcan
                        @can('{{ $permissionName }} Read Action')
                            <th width="20%">Action</th>
                        @endcan
                        @can('{{ $permissionName }} Read Code')
                            <th width="20%">Code</th>
                        @endcan
                        @can('{{ $permissionName }} Read Name')
                            <th width="20%">Name</th>
                        @endcan
                        @can('{{ $permissionName }} Read Local Name')
                            <th width="20%">Local Name</th>
                        @endcan
                        @can('{{ $permissionName }} Read Status')
                            <th width="10%">Status</th>
                        @endcan
                        @can('{{ $permissionName }} Read Created At')
                            <th width="20%">Created At</th>
                        @endcan
                        @can('{{ $permissionName }} Read Updated At')
                            <th width="20%">Updated At</th>
                        @endcan
                        @can('{{ $permissionName }} Read Created By')
                            <th width="20%">Created By</th>
                        @endcan
                        @can('{{ $permissionName }} Read Updated By')
                            <th width="20%">Updated By</th>
                        @endcan
                    </tr>
                </tfoot>
            </table>





        </x-backend.layout_partials.card>
    @endsection

    @section('footer_links')
        <x-backend.links.datatable-footer-links />

        <x-backend.script.delete-confirmation />
        <x-backend.script.force-delete-confirmation />

        <script>
            $(document).ready(function() {
                var table = $('#example1').DataTable({
                    processing: true,
                    serverSide: true,
                    scrollY: '80vh',
                    scrollX: true,
                    scrollCollapse: true,
                    ajax: "{{ route('test-demos.get') }}", // Route for your data source
                    columns: [
                        @can('Job Type Read')
                            {
                                data: 'DT_RowIndex',
                                name: 'DT_RowIndex',
                                orderable: false,
                                searchable: false
                            },
                        @endcan
                        @can('Job Type Read Action')
                            {
                                data: 'action',
                                name: 'action',
                                width: '100%',
                                defaultContent: ''
                            },
                        @endcan
                        @can('Job Type Read Code')
                            {
                                data: 'code',
                                name: 'code',
                                width: '100%',
                                defaultContent: ''
                            },
                        @endcan
                        @can('Job Type Read Name')
                            {
                                data: 'name',
                                name: 'name',
                                width: '100%',
                                defaultContent: ''
                            },
                        @endcan
                        @can('Job Type Read Local Name')
                            {
                                data: 'local_name',
                                name: 'local_name',
                                width: '100%',
                                defaultContent: ''
                            },
                        @endcan
                        @can('Job Type Read Status')
                            {
                                data: 'status_with_icon',
                                name: 'status_with_icon',
                                width: '100%',
                                defaultContent: ''
                            },
                        @endcan
                        @can('Job Type Read Created At')
                            {
                                data: 'created_at',
                                name: 'created_at',
                                width: '100%',
                                defaultContent: ''
                            },
                        @endcan
                        @can('Job Type Read Updated At')
                            {
                                data: 'updated_at',
                                name: 'updated_at',
                                width: '100%',
                                defaultContent: ''
                            },
                        @endcan
                        @can('Job Type Read Created By')
                            {
                                data: 'created_by',
                                name: 'created_by',
                                width: '100%',
                                defaultContent: '',
                            },
                        @endcan
                        @can('Job Type Read Updated By')
                            {
                                data: 'updated_by',
                                name: 'updated_by',
                                width: '100%',
                                defaultContent: '',
                                orderable: false,
                                searchable: false
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

                                fetch("{{ route('test-demos.destroy', '') }}/" + itemID, {
                                    method: 'DELETE',
                                    headers: myHeaders,
                                }).then(function(response) {
                                    return response.json();
                                });

                                // Hide the modal after confirming
                                $('#deleteConfirmModal').modal('hide');
                                // Reload the DataTable and show a success message
                                $('#example1').DataTable().ajax.reload();
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
                                toastr.error(itemName + " Deleting.....");
                            });
                            toastr.clear();
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
                            $('#confirmDeleteButton').on('click', function() {
                                var myHeaders = new Headers({
                                    "X-CSRF-TOKEN": $("input[name='_token']").val()
                                });


                                fetch("{{ route('test-demos.force.destroy', '') }}/" +
                                    itemID, {
                                        method: 'DELETE',
                                        headers: myHeaders,
                                    }).then(function(response) {
                                    return response.json();

                                });

                                modal.hide(); // Hide the modal after deletion
                                $('#example1').DataTable().ajax.reload();
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
                                toastr.error(itemName + " Force Deleting.....");
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
                        $('#filteredData').hide();
                    } else {
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



    @endsection
