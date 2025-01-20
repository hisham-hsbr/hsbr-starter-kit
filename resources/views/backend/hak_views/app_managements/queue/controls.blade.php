@extends('backend.layouts.app')
@section('page_title')
    {{ $headName }} | {{ ucwords(__('my.controls')) }}
@endsection
@section('page_header_name')
    {{ $headName }} - {{ ucwords(__('my.controls')) }}
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
    <x-backend.layout_partials.card cardTitle="" cardFooter="" :cardTools=false>

        <div style="" class="p-3 form-group row">
            <div class="col-sm-3">
                <label class="col-sm-4">Failed Jobs</label>
                <label><code>: <span class="badge badge-warning">{{ $failedJobs }}</span></code></label>
            </div>
            <div class="col-sm-6">
                <label class="col-sm-4">Pending Jobs</label>
                <label><code>: <span class="badge badge-warning">{{ $pendingJobs }}</span></code></label>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button href="{{ route('queues.retry.job') }}" class="btn btn-primary btn-sm"
                    @if ($failedJobs == 0 && $pendingJobs == 0) disabled @endif>
                    <i class="fas fa-redo"></i> Retry Jobs
                </button>
                <button href="{{ route('queues.delete.failed.jobs') }}" class="btn btn-danger btn-sm"
                    @if ($failedJobs == 0) disabled @endif>
                    <i class="fas fa-trash-alt"></i> Delete Failed Jobs
                </button>
            </div>
        </div>
        <div class="mt-3 col-12">
            <form action="{{ route('users.run.birthday') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-birthday-cake"></i> Birthday Run
                </button>
            </form>
        </div>
    </x-backend.layout_partials.card>
@endsection

@section('footer_links')
@endsection
