@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | Show
@endsection
@section('page_header_name')
    {{ $headName }} - Show
@endsection
@section('head_links')
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
                                <label><code>:
                                        {!! $user->email_verified_at
                                            ? $user->email_verified_at_formatted
                                            : '<span style="color: red;">Not verified</span>' !!}
                                    </code></label>
                                @if (!$user->email_verified_at)
                                    <form action="{{ route('users.resend.email.verification', encrypt($user->id)) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="p-0 border-0 btn btn-link text-decoration-none"
                                            title="Resend Verification Email">
                                            <i class="fa-solid fa-paper-plane"></i> Resend
                                        </button>
                                    </form>
                                @endif
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

                        <!-- Role Modal -->
                        <div class="modal fade" id="roleModal" tabindex="-1" role="dialog"
                            aria-labelledby="roleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
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


                        <!-- Permissions Modal -->
                        <div class="modal fade" id="permissionModal" tabindex="-1" role="dialog"
                            aria-labelledby="permissionModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
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
                    <form action="{{ route('users.send.otp', encrypt($user->id)) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="p-0 border-0 btn btn-link text-decoration-none"
                            title="Resend Verification Email">
                            <i class="fa-solid fa-key"></i> Send OTP
                        </button>
                    </form>
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
    <x-backend.tables.activity-history-table :activityLog='$activityLog' :model='$model' />
@endsection
@section('footer_links')
@endsection
