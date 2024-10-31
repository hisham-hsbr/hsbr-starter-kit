@extends('backend.layouts.app')

@section('pageTitle')
    <x-backend.layout_partials.page-title pageTitle='Dashboard' />
@endsection
@section('page_breadcrumb')
    <x-backend.layout_partials.page-breadcrumb activePage='index'>
        <x-backend.layout_partials.page-breadcrumb-item pageName='aaaa' pageHref='/' />
    </x-backend.layout_partials.page-breadcrumb>
@endsection

@section('main_content')
    <div class="row">
        <div class="col-xl-6">
            <x-backend.layout_partials.page-card cardHeader='Demo' cardSubHeader='Demo App'>
                <input type="text" value="samplde">
                <button>click</button>
            </x-backend.layout_partials.page-card>
        </div>
        <div class="col-xl-6">
            <x-backend.layout_partials.page-card cardHeader='Demo' cardSubHeader='Demo App'>
                <input type="text" value="s">
                <button>click</button>
            </x-backend.layout_partials.page-card>
        </div>
    </div>
    <x-backend.layout_partials.page-card cardHeader='Demo' cardSubHeader='Demo App'>
        <input type="text" value="s">
        <button>click</button>
    </x-backend.layout_partials.page-card>
@endsection
