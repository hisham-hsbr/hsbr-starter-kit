@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | {{ ucwords(__('my.show')) }}
@endsection
@section('page_header_name')
    {{ $headName }} - {{ ucwords(__('my.show')) }}
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
@endsection

@section('footer_links')
@endsection
