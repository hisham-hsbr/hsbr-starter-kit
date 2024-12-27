@extends('back_end.layouts.app')

@section('PageHead')
    {{ ucwords(__('my.show')) }}
@endsection

@section('PageTitle')
    {{ ucwords(__('my.show')) }}
@endsection

@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">{{ ucwords(__('my.dashboard')) }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route($routeName . '.index') }}">{{ $headName }}</a></li>
    <li class="breadcrumb-item active">{{ ucwords(__('my.show')) }}</li>
@endsection

@section('headLinks')

@endsection

@section('actionTitle')
    {{ ucwords(__('my.show')) }}
@endsection

@section('mainContent')
    <div class="container-fluid">
        @can('Activity Log View')
            <div class="row">
                <div class="col-md-1">

                </div>
                <!-- left column -->
                <div class="col-md-10">
                    <div class="card-body">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div style="border-style: groove;" class="p-3 form-group row">
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Log Name</label>
                                    <label><code>: {{ $activityLog->log_name }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Description</label>
                                    <label><code>:
                                            {{ $activityLog->description }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Subject Type</label>
                                    <label><code>:
                                            {{ $activityLog->subject_type }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Subject ID</label>
                                    <label><code>:
                                            {{ $activityLog->subject_id }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Event</label>
                                    <label><code>: {{ $activityLog->event }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Causer type</label>
                                    <label><code>:
                                            {{ $activityLog->causer_type }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Event User</label>
                                    <label><code>:
                                            {{ $activityLog->activityUser->name }}</code></label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-4">Created At</label>
                                    <label><code>:
                                            {{ $activityLog->created_at }}</code></label>
                                </div>

                                @foreach ($activityLog->properties as $key => $value)
                                    <div class="pt-2 col-md-6">
                                        <table class="table table-bordered">

                                            <thead>
                                                <tr>
                                                    <th colspan="2" class="bg-secondary color-palette">
                                                        @if ($key == 'attributes')
                                                            New {{ $activityLog->event }} {{ $activityLog->log_name }}
                                                        @elseif ($key == 'old')
                                                            Old {{ $activityLog->log_name }}
                                                        @endif
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($value as $lists => $data)
                                                    <tr class="bg-light color-palette">
                                                        <td style="color:red ;width: 10%">{{ $lists }}</td>
                                                        <td>{{ $data }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>


                    <!-- /.card-body -->
                    <div class="">
                        <a type="button" href="{{ route('activity-logs.index') }}"
                            class="float-right ml-1 btn btn-warning">Back</a>
                    </div>
                    <!-- /.card-footer -->

                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        @endcan
    </div><!-- /.container-fluid -->


@endsection
@section('actionFooter', 'Footer')
@section('footerLinks')


    <x-back-end.message.message />



@endsection
