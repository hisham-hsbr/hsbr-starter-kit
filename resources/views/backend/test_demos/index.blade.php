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
        <table id="example1" class="table table-bordered table-striped">
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
        $(function() {

            var table = $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "processing": true,
                dom: '<"html5buttons"B>lTftigp',
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

                // "buttons": ["excel", "pdf", "print", "colvis"],
                buttons: [
                    @can('Job Type Table Export Excel')
                        'excel',
                    @endcan
                    @can('Job Type Table Export PDF')
                        'pdf',
                    @endcan
                    @can('Job Type Table Print')
                        'print',
                    @endcan
                    @can('Job Type Table Copy')
                        'copy',
                    @endcan
                    @can('Job Type Table Column Visible')
                        'colvis',
                    @endcan
                ],
                select: true,
                scrollY: '80vh',
                scrollX: true,
                scrollCollapse: true,
                // lengthMenu: [
                //     [10, 25, 50, 100, 10, 25, 50, 100, 10, 25, 50, 100],
                //     // [10, 25, 50, 100, "All"]
                // ],
                pagingType: "full_numbers",
                processing: true,
                serverSide: true,

                ajax: '{!! route('test-demos.get') !!}',
                // <--- colum serial number order with id
                "columnDefs": [{
                    searchable: false,
                    orderable: false,
                    targets: 0
                }],
                "order": [
                    [6, 'desc']
                ],
                // colum serial number order with id --->
                columns: [
                    @can('Job Type Read')
                        {
                            data: 'id',
                            name: 'id',
                            defaultContent: ''
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
                            defaultContent: ''
                        },
                    @endcan
                ]
            });
            // <--- colum serial number order with id
            table.on('order.dt search.dt', function() {
                    let i = 1;

                    table
                        .cells(null, 0, {
                            search: 'applied',
                            order: 'applied'
                        })
                        .every(function(cell) {
                            this.data(i++);
                        });
                })
                .draw();
            // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $('.filter-input').keyup(function() {
                $('#example1').DataTable().column($(this).data('column'))
                    .search($(this).val())
                    .draw();
            });

            $('.filter-select').change(function() {
                $('#example1').DataTable().column($(this).data('column'))
                    .search($(this).val())
                    .draw();
            });


        });
    </script>
@endsection
