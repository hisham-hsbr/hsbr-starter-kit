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
                <div> This item is {!! $user->status_with_icon !!}</div>
                <div class="card-body">
                    <div style="border-style: groove;" class="p-3 form-group row">
                        @can('{{ $permissionName }} Read Name')
                            <div class="col-sm-6">
                                <label class="col-sm-4">Name</label>
                                <label><code>: {{ $user->name }}</code></label>
                            </div>
                        @endcan
                        @can('{{ $permissionName }} Read Email')
                            <div class="col-sm-6">
                                <label class="col-sm-4">Email</label>
                                <label><code>: {{ $user->email }}</code></label>
                            </div>
                        @endcan
                        @can('{{ $permissionName }} Read Gender')
                            <div class="col-sm-6">
                                <label class="col-sm-4">Gender</label>
                                <label><code>: {{ $user->gender }}</code></label>
                            </div>
                        @endcan
                        @can('{{ $permissionName }} Read Time Zone')
                            <div class="col-sm-6">
                                <label class="col-sm-4">Time Zone</label>
                                <label><code>: {{ $user->timeZone->time_zone }} - (
                                        {{ $user->timeZone->utc_code }}{{ ' ' }}{{ $user->timeZone->country }})</code></label>
                            </div>
                        @endcan

                        @can('{{ $permissionName }} Read Email Verified At')
                            <div class="col-sm-6">
                                <label class="col-sm-4">Email Verified At</label>
                                <label><code>: {{ $user->email_verified_at_formatted }}</code></label>
                            </div>
                        @endcan
                        <div class="col-sm-6"></div>
                        @can('{{ $permissionName }} Read Roles')
                            <div class="col-sm-6">
                                <label class="col-sm-4">Roles</label>
                                <label><code>: </code> </label>
                                <a type="button" class="" data-toggle="modal" data-target="#roleModal">
                                    <i class="fa-solid fa fa-eye"></i> Roles
                                    <span class="badge badge-warning">{{ $user->roles->count() }}</span>
                                </a>
                            </div>
                        @endcan

                        <!-- role Modal -->
                        <div class="modal fade" id="roleModal" tabindex="-1" role="dialog"
                            aria-labelledby="roleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="roleModalLabel">Roles List</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group">
                                            @foreach ($user->roles as $role)
                                                <li class="list-group-item">
                                                    <a href="{{ route('roles.show', encrypt($role->id)) }}"
                                                        class="text-decoration-none">
                                                        {{ $role->name }}
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

                        @can('{{ $permissionName }} Read Special Permissions')
                            <div class="col-sm-6">
                                <label class="col-sm-4">Special Permissions</label>
                                <label><code>: </code> </label>
                                <a type="button" class="" data-toggle="modal" data-target="#permissionModal">
                                    <i class="fa-solid fa fa-eye"></i> Special Permissions
                                    <span class="badge badge-warning">{{ $user->permissions->count() }}</span>
                                </a>
                            </div>
                        @endcan


                        <!-- permissions Modal -->
                        <div class="modal fade" id="permissionModal" tabindex="-1" role="dialog"
                            aria-labelledby="permissionModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="permissionModalLabel">Permissions List</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group">
                                            @foreach ($user->permissions as $permission)
                                                <li class="list-group-item">
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







                        @can('{{ $permissionName }} Read Created At')
                            <div class="col-sm-6">
                                <label class="col-sm-4">Created At</label>
                                <label><code>: {{ $user->created_at_formatted }}</code></label>
                            </div>
                        @endcan
                        @can('{{ $permissionName }} Read Updated At')
                            <div class="col-sm-6">
                                <label class="col-sm-4">Updated At</label>
                                <label><code>: {{ $user->updated_at_formatted }}</code></label>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>


            <!-- /.card-body -->

            <div class="">

                <a type="button" href="{{ route($routeName . '.index') }}"
                    class="float-right ml-1 btn btn-warning">Back</a>
                <a type="button" href="{{ route($routeName . '.edit', encrypt($user->id)) }}"
                    class="float-right ml-1 btn btn-primary">Edit</a>



                <x-backend.form.buttons-show-page-controls :routeName="$routeName" :model='$model' :item='$user' />
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
            </tr>
        </thead>
        <tbody>
            @forelse ($activityLog as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->event }}</td>
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
                                        @foreach ($a->properties as $key => $value)
                                            <div class="pt-2 col-md-12">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2" class="bg-secondary color-palette">
                                                                @if ($key == 'attributes')
                                                                    New {{ $a->event }} {{ $a->log_name }}
                                                                @elseif ($key == 'old')
                                                                    Old {{ $a->log_name }}
                                                                @endif
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($value as $lists => $data)
                                                            <tr class="bg-light color-palette">
                                                                <td style="color:red; width: 10%">{{ $lists }}</td>
                                                                <td>{{ $data }}</td>
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
                    <td>{{ $a->activityUser->name }}</td>
                    <td>{{ $a->created_at_formatted }}</td>
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
