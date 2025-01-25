@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | {{ ucwords(__('my.index')) }}
@endsection
@section('page_header_name')
    {{ $headName }} - {{ ucwords(__('my.index')) }}
@endsection
@section('head_links')
@endsection
@section('breadcrumbs')
    <x-backend.layout_partials.page-breadcrumb-item pageName="Dashboard" pageHref="{{ route('backend.dashboard') }}"
        :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="{{ $headName }}"
        pageHref="{{ route($routeName . '.index') }}" :active="false" />
    <x-backend.layout_partials.page-breadcrumb-item pageName="Create" pageHref="" :active="true" />
@endsection

@section('main_content')
    <div class="mb-4 d-flex justify-content-end">

        <button type="button" class="mr-2 btn btn-secondary" data-toggle="modal" data-target="#settingsModal">
            <i class="fas fa-cog"></i> Settings
        </button>
        <a type="button" href="{{ route($routeName . '.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
            Create</a>
        <x-backend.model.model-settings :model="$model" :settings="$settings" :routeName='$routeName' />

    </div>

    <x-backend.layout_partials.card cardTitle="Notifications" cardFooter="" :cardTools=true>
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                {{--  --}}
            </div>
        </div>
    </x-backend.layout_partials.card>
@endsection
@section('footer_links')
    <x-backend.script.keyboard-shortcut key="n" button_id="name" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="e" button_id="email" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="g" button_id="gender" type="alt" event="focus" />
    <x-backend.script.keyboard-shortcut key="t" button_id="time_zone_id" type="alt" event="focus" />
@endsection
