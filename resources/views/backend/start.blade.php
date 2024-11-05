@extends('backend.layouts.app')
@section('page_title', 'Title Dashboard')
@section('page_header_name', 'My Page Head')
@section('breadcrumbs')
    <x-backend.layout_partials.page-breadcrumb-item pageName="Dashboard" pageHref="/" :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="User Index" pageHref="/" :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="Create" pageHref="" :active="true" />
@endsection

@section('main_content')
    <x-backend.layout_partials.card card_title="Dashboard" card_footer="ftr">
        <h1>Hisham</h1>
    </x-backend.layout_partials.card>
    <x-backend.layout_partials.card card_title="Dashboard" card_footer="ftr">
        <h1>Hisham</h1>
    </x-backend.layout_partials.card>
@endsection
