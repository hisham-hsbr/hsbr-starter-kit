@extends('backend.layouts.app')
@section('page_title', 'Dashboard')
@section('page_header_name', 'Dashboard')
@section('breadcrumbs')
    <x-backend.layout_partials.page-breadcrumb-item pageName="Dashboard" pageHref="" :active="true" />
@endsection

@section('main_content')

    <div class="d-flex justify-content-end">

        <button type="button" class="btn btn-secondary mr-2" data-toggle="modal" data-target="#settingsModal">
            <i class="fas fa-cog"></i> Settings
        </button>
        <x-backend.model.model-settings :model="$model" :settings="$settings" :routeName='$routeName' />






























        <a href="javascript:void(0);" onclick="updateDashboardStats()" class="btn btn-primary">
            <i class="fas fa-sync-alt"></i> Refresh
        </a>
    </div>
    <h5 class="mb-2">Users</h5>
    <div class="row">
        @can('Dashboard Users Total Users')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Users</span>
                        <span id="user_count" class="info-box-number">0</span>
                    </div>
                </div>
            </div>
        @endcan
        @can('Dashboard Users Inactive Users')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-user-slash"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Inactive Users</span>
                        <span id="in_active_user_count" class="info-box-number">0</span>
                    </div>
                </div>
            </div>
        @endcan
        @can('Dashboard Users Deleted Users')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fas fa-user-times"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Deleted Users</span>
                        <span id="deleted_user_count" class="info-box-number">0</span>
                    </div>
                </div>
            </div>
        @endcan
        @can('Dashboard Users Pending Email Verifications')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fas fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pending Email Verifications</span>
                        <span id="pending_email_verifications" class="info-box-number">0</span>
                    </div>
                </div>
            </div>
        @endcan
    </div>

    <h5 class="mb-2">Jobs</h5>
    <div class="row">
        @can('Dashboard Jobs Failed Jobs')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fas fa-exclamation-triangle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Failed Jobs</span>
                        <span id="failed_jobs" class="info-box-number">0</span>
                    </div>
                </div>
            </div>
        @endcan
        @can('Dashboard Jobs Pending Jobs')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fas fa-clock"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pending Jobs</span>
                        <span id="pending_jobs" class="info-box-number">0</span>
                    </div>
                </div>
            </div>
        @endcan
    </div>
    <div class="row">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Master Chart</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="donutChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
    </div>




@endsection
@section('footer_links')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- ChartJS --}}
    <script src="{{ asset('backend/admin_lte/plugins/chart.js/Chart.min.js') }}"></script>
    <script>
        // Pass settings from the backend to JavaScript
        const refreshInterval =
            {{ $bootSettings['dashboard_data_refresh_interval'] ?? 30000 }}; // Default to 30,000 ms (30 seconds) if not set
        const enableRefresh =
            {{ $bootSettings['dashboard_data_refresh'] == 1 ? 'true' : 'false' }}; // Enable or disable refresh based on backend value

        function updateDashboardStats() {
            $.ajax({
                url: "{{ route('backend.dashboard.stats') }}", // Ensure this route points to getDashboardStats
                method: "GET",
                success: function(data) {
                    // Update the dashboard with received data
                    $('#user_count').text(data.userCount);
                    $('#in_active_user_count').text(data.inActiveUserCount);
                    $('#deleted_user_count').text(data.deletedUserCount);
                    $('#pending_email_verifications').text(data.pendingEmailVerifications);
                    $('#failed_jobs').text(data.failedJobs);
                    $('#pending_jobs').text(data.pendingJobs);

                    // Show success message
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-center",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };
                    toastr.info("Dashboard Syncing .....");
                },
                error: function() {
                    console.error('Failed to fetch dashboard data.');
                }
            });
        }

        // Fetch stats on page load

        $(document).ready(function() {
            updateDashboardStats();
            // Refresh the dashboard stats every 30 seconds
            if (enableRefresh) {
                setInterval(updateDashboardStats, refreshInterval);
            }
        });
        $(function() {
            // Initial chart setup
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
            var donutChart;
            var donutData = {
                labels: [
                    'Total Users',
                    'Inactive Users',
                    'Deleted Users',
                    'Pending Email Verifications',
                    'Failed Jobs',
                    'Pending Jobs',
                ],
                datasets: [{
                    data: [0, 0, 0, 0, 0, 0], // Initial placeholder data
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }]
            };
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            };

            // Create the chart instance
            donutChart = new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            });

            // Function to fetch and update chart data
            function updateDashboardStats() {
                $.ajax({
                    url: "{{ route('backend.dashboard.stats') }}", // Ensure this route points to getDashboardStats
                    method: "GET",
                    success: function(data) {
                        // Update chart data
                        donutChart.data.datasets[0].data = [
                            data.userCount,
                            data.inActiveUserCount,
                            data.deletedUserCount,
                            data.pendingEmailVerifications,
                            data.failedJobs,
                            data.pendingJobs
                        ];
                        donutChart.update(); // Refresh the chart with new data
                    },
                    error: function() {
                        console.error('Failed to fetch dashboard data.');
                    }
                });
            }

            // Fetch data and update chart on page load
            updateDashboardStats();

            $(document).ready(function() {
                updateDashboardStats();
                // Refresh the dashboard stats every 30 seconds
                if (enableRefresh) {
                    setInterval(updateDashboardStats, refreshInterval);
                }
            });
        });
    </script>




@endsection
