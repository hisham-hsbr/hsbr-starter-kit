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

                        <!-- User Modal -->
                        <div class="modal fade" id="userModal" tabindex="-1" role="dialog"
                            aria-labelledby="userModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
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
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
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

    <x-backend.tables.activity-history-table :activityLog='$activityLog' :model='$model' />
@endsection
@section('footer_links')
@endsection
