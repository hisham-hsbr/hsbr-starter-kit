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

        <div class="btn-group">
            <button type="button" class="btn btn-info">Action</button>
            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div>
        </div>

        <x-backend.model.page-info-model model_title="Customer Create" icon_class="fa-solid fa-circle-info"
            model_class="modal-lg">
            <p><u>Keyboard Shortcuts</u></p>
            <x-backend.form.model-table-code>
                <x-backend.form.model-table-code-tr action="Add Customer" code="Ctrl+Alt + A" />
                <x-backend.form.model-table-code-tr action="Import Customer" code="Ctrl+Alt + I" />
                <x-backend.form.model-table-code-tr action="Customer Settings" code="Ctrl+Alt + S" />
                <x-backend.form.model-table-code-tr action="Customer Table Refresh" code="Alt + R" />
            </x-backend.form.model-table-code>
        </x-backend.model.page-info-model>


        <x-backend.form.buttons-index-page-controls :routeName=$routeName />







        <x-backend.model.test-demo-filter-model :createdByUsers=$createdByUsers :updatedByUsers=$updatedByUsers />


        <x-backend.model.create-test-demo-model />












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

    <x-backend.script.datatable-update />
    <x-backend.script.delete-confirmation />
    <x-backend.script.force-delete-confirmation />

    <x-backend.table-script.test-demo-table-script />





@endsection
