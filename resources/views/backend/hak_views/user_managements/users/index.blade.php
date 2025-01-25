@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | Index
@endsection
@section('page_header_name')
    {{ $headName }} - Index
@endsection
@section('head_links')
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

        <x-backend.model.index-page-info-model model_title="Test Demo Index" />
        <x-backend.form.buttons-index-page-controls :routeName="$routeName" :model='$model' :settings="$settings" />
        <x-backend.model.test-demo-filter-model :createdByUsers="$createdByUsers" :updatedByUsers="$updatedByUsers" />
        <x-backend.model.create-test-demo-model />
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
                        @can($permissionName . ' Read Email')
                            <th width="20%">Email</th>
                        @endcan
                        @can($permissionName . ' Read Email Verified')
                            <th width="20%">Email Verified</th>
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
                        @can($permissionName . ' Read Email')
                            <th width="20%">Email</th>
                        @endcan
                        @can($permissionName . ' Read Email Verified')
                            <th width="20%">Email Verified</th>
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
    <x-backend.script.datatable-update />
    <x-backend.script.delete-confirmation />
    <x-backend.script.force-delete-confirmation />

    <x-backend.table-script.users-table-script />
@endsection
