@extends('backend.layouts.app')
@section('page_head', 'Dashboard')
@section('head_links')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

@endsection
@section('page_title')
    <x-backend.layout_partials.page-title pageTitle="Test Demo" />
@endsection
@section('page_breadcrumb')
    <x-backend.layout_partials.page-breadcrumb activePage="Test Demo">
        <x-backend.layout_partials.page-breadcrumb-item pageName="Dashboard" pageHref="{{ route('backend.dashboard') }}" />
    </x-backend.layout_partials.page-breadcrumb>
@endsection

@section('main_content')
    <div class="row">
        <div class="col-lg-12">
            <x-backend.layout_partials.page-card cardHeader="Test Demo" cardSubHeader="Index">
                <h2>Users List with Filters</h2>

                <!-- Filter Section -->
                <div class="mb-4 row">
                    <div class="col-md-4">
                        <input type="text" id="filter_name" class="form-control" placeholder="Search by Name">
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="filter_email" class="form-control" placeholder="Search by Email">
                    </div>
                    <div class="col-md-4">
                        <button type="button" id="btnFilter" class="btn btn-primary">Filter</button>
                        <button type="button" id="btnReset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>

                <!-- DataTable -->
                <table class="table table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </x-backend.layout_partials.page-card>
        </div>

    </div>
@endsection
@section('footer_links')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

    <script type="text/javascript">
        $(function() {
            // Initialize DataTable
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('users.get') }}",
                    data: function(d) {
                        d.name = $('#filter_name').val();
                        d.email = $('#filter_email').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

            // Filter button click event
            $('#btnFilter').click(function() {
                table.draw();
            });

            // Reset button click event
            $('#btnReset').click(function() {
                $('#filter_name').val('');
                $('#filter_email').val('');
                table.draw();
            });
        });
    </script>
@endsection
