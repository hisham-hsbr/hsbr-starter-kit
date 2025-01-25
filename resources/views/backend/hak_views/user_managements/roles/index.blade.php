@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | Index
@endsection
@section('page_header_name')
    {{ $headName }} - Index
@endsection
@section('head_links')
    <x-backend.links.datatable-head-links />
@endsection
@section('breadcrumbs')
    <x-backend.layout_partials.page-breadcrumb-item pageName="Dashboard" pageHref="{{ route('backend.dashboard') }}"
        :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="{{ $headName }}"
        pageHref="{{ route($routeName . '.index') }}" :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="Index" pageHref="" :active="true" />
@endsection

@section('main_content')
    <x-backend.layout_partials.card cardTitle="" cardFooter="">

        <x-backend.model.index-page-info-model model_title="" module="" />

        <div class="btn-group">
            <button type="button" class="btn btn-info">Action</button>
            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu">
                <!-- Add Button -->
                <a href="{{ route($routeName . '.create') }}" id="addButton"
                    class="btn btn-block btn-outline-primary btn-xs"><i class="fas fa-plus"></i> Add </a>

                <!-- Settings Button -->
                <a href="{{ route('settings.model.settings', encrypt($model)) }}" id="settingsButton"
                    class="btn btn-block btn-outline-secondary btn-xs"><i class="fas fa-cog"></i> Settings </a>

                <!-- Refresh Button -->
                <a onclick="Refresh()" id="refreshButton" class="btn btn-block btn-outline-warning btn-xs"><i
                        class="fas fa-sync-alt"></i>
                    Refresh
                </a>
            </div>
        </div>



        <x-backend.model.test-demo-filter-model :createdByUsers="$createdByUsers" :updatedByUsers="$updatedByUsers" />
        @can($permissionName . ' Read')
            <table id="example1" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        @can($permissionName . ' Read')
                            <th>Sn</th>
                        @endcan
                        @can($permissionName . ' Read Action')
                            <th width="20%">Action</th>
                        @endcan
                        @can($permissionName . ' Read Name')
                            <th width="20%">Name</th>
                        @endcan
                        @can($permissionName . ' Read Users')
                            <th width="20%">Users</th>
                        @endcan
                        @can($permissionName . ' Read Permissions')
                            <th width="20%">Permissions</th>
                        @endcan
                        @can($permissionName . ' Read Status')
                            <th width="10%">Status</th>
                        @endcan
                        @can($permissionName . ' Read Created At')
                            <th width="20%">Created At</th>
                        @endcan
                        @can($permissionName . ' Read Updated At')
                            <th width="20%">Updated At</th>
                        @endcan
                        @can($permissionName . ' Read Created By')
                            <th width="20%">Created By</th>
                        @endcan
                        @can($permissionName . ' Read Updated By')
                            <th width="20%">Updated By</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    {{-- data --}}
                </tbody>
                <tfoot>
                    <tr>
                        @can($permissionName . ' Read')
                            <th>Sn</th>
                        @endcan
                        @can($permissionName . ' Read Action')
                            <th width="20%">Action</th>
                        @endcan
                        @can($permissionName . ' Read Name')
                            <th width="20%">Name</th>
                        @endcan
                        @can($permissionName . ' Read Users')
                            <th width="20%">Users</th>
                        @endcan
                        @can($permissionName . ' Read Permissions')
                            <th width="20%">Permissions</th>
                        @endcan
                        @can($permissionName . ' Read Status')
                            <th width="10%">Status</th>
                        @endcan
                        @can($permissionName . ' Read Created At')
                            <th width="20%">Created At</th>
                        @endcan
                        @can($permissionName . ' Read Updated At')
                            <th width="20%">Updated At</th>
                        @endcan
                        @can($permissionName . ' Read Created By')
                            <th width="20%">Created By</th>
                        @endcan
                        @can($permissionName . ' Read Updated By')
                            <th width="20%">Updated By</th>
                        @endcan
                    </tr>
                </tfoot>
            </table>
        @endcan

    </x-backend.layout_partials.card>
@endsection

@section('footer_links')
    <x-backend.links.datatable-footer-links />

    <x-backend.script.datatable-update />
    <x-backend.script.delete-confirmation />
    <x-backend.script.force-delete-confirmation />

    <x-backend.table-script.roles-table-script />

    <x-backend.script.keyboard-shortcut key="a" button_id="addButton" type="ctrl&alt" event="click" />
    <x-backend.script.keyboard-shortcut key="r" button_id="refreshButton" type="ctrl&alt" event="click" />
    <x-backend.script.keyboard-shortcut key="s" button_id="settingsButton" type="ctrl&alt" event="click" />
@endsection
