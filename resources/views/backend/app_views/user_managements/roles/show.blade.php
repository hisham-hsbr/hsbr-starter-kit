@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | Show
@endsection
@section('page_header_name')
    {{ $headName }} - Show
@endsection
@section('head_links')
    <x-backend.links.datatable-head-links />
@endsection
@section('breadcrumbs')
    <x-backend.layout_partials.page-breadcrumb-item pageName="Dashboard" pageHref="{{ route('backend.dashboard') }}"
        :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="{{ $headName }}"
        pageHref="{{ route($routeName . '.index') }}" :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="Show" pageHref="" :active="true" />
@endsection

@section('main_content')
    <div class="row">
        <div class="col-md-1">

        </div>
        <!-- left column -->
        <div class="col-md-12">
            <div class="card-body">
                <!-- /.card-header -->
                <!-- form start -->
                <div> This item is {!! $role->status_with_icon !!}</div>
                <div class="card-body">
                    <div style="border-style: groove;" class="p-3 form-group row">
                        @can('{{ $permissionName }} Read Name')
                            <div class="col-sm-6">
                                <label class="col-sm-4">Name</label>
                                <label><code>: {{ $role->name }}</code></label>
                            </div>
                        @endcan
                        @can('{{ $permissionName }} Read Description')
                            <div class="col-sm-6">
                                <label class="col-sm-4">Description</label>
                                <label><code>: {{ $role->description }}</code></label>
                            </div>
                        @endcan
                        @can('{{ $permissionName }} Read Local Name')
                            <div class="col-sm-6">
                                <label class="col-sm-4">Guard Name</label>
                                <label><code>: {{ $role->guard_name }}</code></label>
                            </div>
                        @endcan
                        @can('{{ $permissionName }} Read Users')
                            <div class="col-sm-6">
                                <label class="col-sm-4">Users</label>
                                <a type="button" class="" data-toggle="modal" data-target="#userModal">
                                    View Users
                                    <span class="badge badge-warning">{{ $role->users->count() }}</span>
                                </a>
                            </div>
                        @endcan

                        <!-- user Modal -->
                        <div class="modal fade" id="userModal" tabindex="-1" role="dialog"
                            aria-labelledby="userModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="userModalLabel">Users List</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group">
                                            @foreach ($role->users as $user)
                                                <li class="list-group-item">
                                                    <a href="{{ route('users.show', encrypt($user->id)) }}"
                                                        class="text-decoration-none">
                                                        {{ $user->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @can('{{ $permissionName }} Read Permissions')
                            <div class="col-sm-6">
                                <label class="col-sm-4">Permissions</label>
                                <a type="button" class="" data-toggle="modal" data-target="#permissionModal">
                                    View Permissions
                                    <span class="badge badge-warning">{{ $role->permissions->count() }}</span>
                                </a>
                            </div>
                        @endcan

                        <!-- Permissions Modal -->
                        <div class="modal fade" id="permissionModal" tabindex="-1" role="dialog"
                            aria-labelledby="permissionModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="permissionModalLabel">Permission List</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group">
                                            @foreach ($role->permissions as $permission)
                                                <li class="list-group-item">
                                                    {{-- <a href="{{ route('permissions.show', encrypt($permission->id)) }}" --}}
                                                    <a href="" class="text-decoration-none">
                                                        {{ $permission->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @can('{{ $permissionName }} Read Local Name')
                            <div class="col-sm-6">
                                <label class="col-sm-4">Status</label>
                                <label><code>: {{ $role->status }}</code></label>
                            </div>
                        @endcan
                        @can('{{ $permissionName }} Read Created At')
                            <div class="col-sm-6">
                                <label class="col-sm-4">Created At</label>
                                <label><code>: {{ $role->created_at }}</code></label>
                            </div>
                        @endcan
                        @can('{{ $permissionName }} Read Updated At')
                            <div class="col-sm-6">
                                <label class="col-sm-4">Updated At</label>
                                <label><code>: {{ $role->updated_at }}</code></label>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>


            <!-- /.card-body -->

            <div class="">

                <a type="button" href="{{ route($routeName . '.index') }}"
                    class="float-right ml-1 btn btn-warning">Back</a>
                <a type="button" href="{{ route($routeName . '.edit', encrypt($role->id)) }}"
                    class="float-right ml-1 btn btn-primary">Edit</a>



                <x-backend.form.buttons-show-page-controls :routeName="$routeName" :model='$model' :item='$role' />
            </div>
            <!-- /.card-footer -->

        </div>
        <!--/.col (left) -->

    </div>

    <h1>History</h1>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Sn</th>
                <th>Event</th>
                <th>Properties</th>
                <th>User</th>
                <th>Created At</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($activityLog as $activity)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $activity->event }}</td>
                    <td>
                        <!-- Trigger button to open modal -->
                        <a type="button" class="" data-toggle="modal"
                            data-target="#propertiesModal{{ $loop->iteration }}">
                            View Properties
                        </a>

                        <!-- Modal for Properties -->
                        <div class="modal fade" id="propertiesModal{{ $loop->iteration }}" tabindex="-1"
                            role="dialog" aria-labelledby="propertiesModalLabel{{ $loop->iteration }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="propertiesModalLabel{{ $loop->iteration }}">
                                            Properties
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach ($activity->properties as $key => $value)
                                            <div class="pt-2 col-md-12">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2" class="bg-secondary color-palette">
                                                                @if ($key == 'attributes')
                                                                    New {{ $activity->event }} {{ $activity->log_name }}
                                                                @elseif ($key == 'old')
                                                                    Old {{ $activity->log_name }}
                                                                @endif
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($value as $lists => $data)
                                                            <tr class="bg-light color-palette">
                                                                <td style="color:red; width: 10%">{{ $lists }}</td>
                                                                <td>
                                                                    @if (is_array($data))
                                                                        {{ json_encode($data, JSON_PRETTY_PRINT) }}
                                                                    @else
                                                                        {{ $data }}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>

                                                </table>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $activity->causer_name }}</td>
                    <td>{{ $activity->created_at }}</td>
                    <td><a href="{{ route('activity.logs.show', encrypt($activity->id)) }}" class="ml-2"><i
                                class="fa-solid fa fa-eye"></i></a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">History not available</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th>Sn</th>
                <th>Event</th>
                <th>Properties</th>
                <th>User</th>
                <th>Created At</th>
                <th>View</th>
            </tr>
        </tfoot>
    </table>



@endsection
@section('footer_links')
    <x-backend.links.datatable-footer-links />
    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                // Optional: Customization options for DataTables
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "search": "Search:",
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                    "paginate": {
                        "previous": "Previous",
                        "next": "Next"
                    }
                }
            });
        });
    </script>
@endsection
