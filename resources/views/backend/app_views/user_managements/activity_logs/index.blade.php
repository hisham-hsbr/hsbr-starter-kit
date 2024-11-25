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

        <x-backend.model.index-page-info-model model_title="Test Demo Index" />
        @can('{{ $permissionName }} Read')
            <table id="example1" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        @can('{{ $permissionName }} Read')
                            <th>Sn</th>
                        @endcan
                        @can('{{ $permissionName }} Read Log Name')
                            <th width="20%">Log Name</th>
                        @endcan
                        @can('{{ $permissionName }} Read Description')
                            <th width="20%">Description</th>
                        @endcan
                        @can('{{ $permissionName }} Read Event')
                            <th width="20%">Event</th>
                        @endcan
                        @can('{{ $permissionName }} Read Event User')
                            <th width="10%">Event User</th>
                        @endcan
                        @can('{{ $permissionName }} Read Created At')
                            <th width="20%">Created At</th>
                        @endcan
                        @can('{{ $permissionName }} Read View')
                            <th width="20%">View</th>
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
                        @can('{{ $permissionName }} Read Log Name')
                            <th width="20%">Log Name</th>
                        @endcan
                        @can('{{ $permissionName }} Read Description')
                            <th width="20%">Description</th>
                        @endcan
                        @can('{{ $permissionName }} Read Event')
                            <th width="20%">Event</th>
                        @endcan
                        @can('{{ $permissionName }} Read Event User')
                            <th width="10%">Event User</th>
                        @endcan
                        @can('{{ $permissionName }} Read Created At')
                            <th width="20%">Created At</th>
                        @endcan
                        @can('{{ $permissionName }} Read View')
                            <th width="20%">View</th>
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

    <x-backend.table-script.activity-logs-table-script />
@endsection
