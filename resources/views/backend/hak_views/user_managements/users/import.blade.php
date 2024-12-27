@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | Import
@endsection
@section('page_header_name')
    {{ $headName }} - Import
@endsection
@section('head_links')
@endsection
@section('breadcrumbs')
    <x-backend.layout_partials.page-breadcrumb-item pageName="Dashboard" pageHref="{{ route('backend.dashboard') }}"
        :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="{{ $headName }}"
        pageHref="{{ route($routeName . '.index') }}" :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="Import" pageHref="" :active="true" />
@endsection
@section('main_content')
    <x-backend.layout_partials.card cardTitle="" cardFooter="">
        <div class="col-md-10">
            <div class="card-body">
                <form id="uploadForm" enctype="multipart/form-data">
                    @csrf
                    <label class="form-label">Select a Test Demo Excel File :</label>
                    <input class="" id="data" name="data" type="file" required autofocus
                        onchange="previewFile(event)" accept=".xlsx, .xls" />
                    <br><br>
                    Download <a href="{{ route('test.demos.download') }}"><i class="fa fa-file-excel"></i> Sample Test Demos
                        Excel</a> for Import
                    <div id="tablePreviewContainer" style="display: none;">
                        <table class="table table-bordered" id="previewTable">
                            <thead id="tableHead"></thead>
                            <tbody id="tableBody"></tbody>
                        </table>
                        <button type="button" class="mt-2 btn btn-success" onclick="addRow()">Add New Row</button>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="submitForm()">Import</button>
                </form>
            </div>
        </div>
    </x-backend.layout_partials.card>
@endsection
@section('footer_links')
    <x-backend.modules.test_demos.import-script />
@endsection
