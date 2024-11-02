@extends('backend.layouts.app')
@section('page_head', 'Dashboard')
@section('head_links')
@endsection
@section('page_title')
    <x-backend.layout_partials.page-title pageTitle=Create />
@endsection
@section('page_breadcrumb')
    <x-backend.layout_partials.page-breadcrumb activePage="Create">
        <x-backend.layout_partials.page-breadcrumb-item pageName="Dashboard" pageHref="{{ route('backend.dashboard') }}" />
    </x-backend.layout_partials.page-breadcrumb>
@endsection

@section('main_content')

@endsection
@section('footer_links')
@endsection
