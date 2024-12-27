@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | Index
@endsection
@section('page_header_name')
    {{ $headName }} - Index
@endsection
@section('head_links')
    <x-backend.links.dual-list-box-head />
@endsection
@section('breadcrumbs')
    <x-backend.layout_partials.page-breadcrumb-item pageName="Dashboard" pageHref="{{ route('backend.dashboard') }}"
        :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="{{ $headName }}"
        pageHref="{{ route($routeName . '.index') }}" :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="Edit" pageHref="" :active="true" />
@endsection

@section('main_content')
    <div class="text-center">
        <h1 class="display-4" style="font-weight: bold;">Coming Soon</h1>
        <p class="lead">We're working hard to launch this page. Stay tuned!</p>
    </div>
@endsection
@section('footer_links')
    <x-backend.script.keyboard-shortcut key="u" button_id="updateButton" type="ctrl&alt" event="click" />
    <x-backend.script.keyboard-shortcut key="b" button_id="backButton" type="ctrl&alt" event="click" />
@endsection
