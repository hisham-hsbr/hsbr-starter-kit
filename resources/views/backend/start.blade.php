@extends('backend.layouts.app')
@section('page_head', 'Dashboard')
@section('head_links')
@endsection
@section('page_title')
    <x-backend.layout_partials.page-title pageTitle=Dashboard />
@endsection
@section('page_breadcrumb')
    <x-backend.layout_partials.page-breadcrumb activePage="Dashboard">
        <x-backend.layout_partials.page-breadcrumb-item pageName="Dashboard" pageHref="{{ route('backend.dashboard') }}" />
    </x-backend.layout_partials.page-breadcrumb>
@endsection

@section('main_content')
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-primary float-end">Daily</span>
                        <h5 class="mb-0 card-title">Cost per Unit</h5>
                    </div>
                    <div class="mb-4 row d-flex align-items-center">
                        <div class="col-8">
                            <h2 class="mb-0 d-flex align-items-center">
                                $17.21
                            </h2>
                        </div>
                        <div class="col-4 text-end">
                            <span class="text-muted">12.5% <i class="mdi mdi-arrow-up text-success"></i></span>
                        </div>
                    </div>

                    <div class="shadow-sm progress" style="height: 5px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 57%;">
                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-primary float-end">Per Week</span>
                        <h5 class="mb-0 card-title">Market Revenue</h5>
                    </div>
                    <div class="mb-4 row d-flex align-items-center">
                        <div class="col-8">
                            <h2 class="mb-0 d-flex align-items-center">
                                $1875.54
                            </h2>
                        </div>
                        <div class="col-4 text-end">
                            <span class="text-muted">18.71% <i class="mdi mdi-arrow-down text-danger"></i></span>
                        </div>
                    </div>

                    <div class="shadow-sm progress" style="height: 5px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 57%;">
                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-primary float-end">Per Month</span>
                        <h5 class="mb-0 card-title">Expenses</h5>
                    </div>
                    <div class="mb-4 row d-flex align-items-center">
                        <div class="col-8">
                            <h2 class="mb-0 d-flex align-items-center">
                                $784.62
                            </h2>
                        </div>
                        <div class="col-4 text-end">
                            <span class="text-muted">57% <i class="mdi mdi-arrow-up text-success"></i></span>
                        </div>
                    </div>

                    <div class="shadow-sm progress" style="height: 5px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 57%;">
                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div>
            <!--end card-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-primary float-end">All Time</span>
                        <h5 class="mb-0 card-title">Daily Visits</h5>
                    </div>
                    <div class="mb-4 row d-flex align-items-center">
                        <div class="col-8">
                            <h2 class="mb-0 d-flex align-items-center">
                                1,15,187
                            </h2>
                        </div>
                        <div class="col-4 text-end">
                            <span class="text-muted">17.8% <i class="mdi mdi-arrow-down text-danger"></i></span>
                        </div>
                    </div>

                    <div class="shadow-sm progress" style="height: 5px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 57%;"></div>
                    </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->


    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sales Analytics</h4>
                    <p class="mb-4 card-subtitle">From date of 1st Jan 2020 to continue</p>
                    <div id="morris-bar-example" class="morris-chart"></div>
                </div> <!--end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Stock</h4>
                    <p class="mb-4 card-subtitle">Recent Stock</p>

                    <div class="text-center">
                        <input data-plugin="knob" data-width="165" data-height="165" data-linecap=round
                            data-fgColor="#7a08c2" value="95" data-skin="tron" data-angleOffset="180" data-readOnly=true
                            data-thickness=".15" />
                        <h5 class="mt-3 text-muted">Total sales made today</h5>


                        <p class="mx-auto text-muted w-75 sp-line-2">Traditional heading
                            elements are
                            designed to work best in the meat of your page content.</p>

                        <div class="mt-3 row">
                            <div class="col-6">
                                <p class="mb-1 text-muted font-15 text-truncate">Target</p>
                                <h4><i class="fas fa-arrow-up text-success me-1"></i>$7.8k</h4>

                            </div>
                            <div class="col-6">
                                <p class="mb-1 text-muted font-15 text-truncate">Last week</p>
                                <h4><i class="fas fa-arrow-down text-danger me-1"></i>$1.4k</h4>
                            </div>

                        </div>
                    </div>
                </div> <!--end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Account Transactions</h4>
                            <p class="mb-4 card-subtitle">Transaction period from 21 July to
                                25 Aug</p>
                            <h3>$7841.12 <span class="badge badge-soft-success float-end">+7.5%</span>
                            </h3>
                        </div>
                    </div> <!-- end row -->

                    <div id="sparkline1" class="mt-3"></div>
                </div>
                <!--end card body-->
            </div>
            <!--end card-->

        </div><!-- end col -->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end position-relative">
                        <a href="#" class="dropdown-toggle h4 text-muted" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#" class="dropdown-item">Action</a></li>
                            <li><a href="#" class="dropdown-item">Another action</a></li>
                            <li><a href="#" class="dropdown-item">Something else here</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a href="#" class="dropdown-item">Separated link</a></li>
                        </ul>
                    </div>
                    <h4 class="card-title d-inline-block">Total Revenue</h4>

                    <div id="morris-line-example" class="morris-chart" style="height: 290px;"></div>

                    <div class="mt-4 text-center row">
                        <div class="col-6">
                            <h4>$7841.12</h4>
                            <p class="mb-0 text-muted">Total Revenue</p>
                        </div>
                        <div class="col-6">
                            <h4>17</h4>
                            <p class="mb-0 text-muted">Open Compaign</p>
                        </div>
                    </div>

                </div>
                <!--end card body-->

            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Top 5 Customers</h4>
                    <p class="mb-4 card-subtitle font-size-13">Transaction period from 21 July to 25 Aug
                    </p>

                    <div class="table-responsive">
                        <table class="table mb-0 table-centered table-striped table-nowrap">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                    <th>Create Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-user">
                                        <img src="{{ asset('backend/dashtrap/assets/images/users/avatar-4.jpg') }}"
                                            alt="table-user" class="mr-2 avatar-xs rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-semibold">Paul J.
                                            Friend</a>
                                    </td>
                                    <td>
                                        937-330-1634
                                    </td>
                                    <td>
                                        pauljfrnd@jourrapide.com
                                    </td>
                                    <td>
                                        New York
                                    </td>
                                    <td>
                                        07/07/2018
                                    </td>
                                </tr>

                                <tr>
                                    <td class="table-user">
                                        <img src="{{ asset('backend/dashtrap/assets/images/users/avatar-3.jpg') }}"
                                            alt="table-user" class="mr-2 avatar-xs rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-semibold">Bryan J.
                                            Luellen</a>
                                    </td>
                                    <td>
                                        215-302-3376
                                    </td>
                                    <td>
                                        bryuellen@dayrep.com
                                    </td>
                                    <td>
                                        New York
                                    </td>
                                    <td>
                                        09/12/2018
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-user">
                                        <img src="{{ asset('backend/dashtrap/assets/images/users/avatar-8.jpg') }}"
                                            alt="table-user" class="mr-2 avatar-xs rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-semibold">Kathryn S.
                                            Collier</a>
                                    </td>
                                    <td>
                                        828-216-2190
                                    </td>
                                    <td>
                                        collier@jourrapide.com
                                    </td>
                                    <td>
                                        Canada
                                    </td>
                                    <td>
                                        06/30/2018
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-user">
                                        <img src="{{ asset('backend/dashtrap/assets/images/users/avatar-1.jpg') }}"
                                            alt="table-user" class="mr-2 avatar-xs rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-semibold">Timothy
                                            Kauper</a>
                                    </td>
                                    <td>
                                        (216) 75 612 706
                                    </td>
                                    <td>
                                        thykauper@rhyta.com
                                    </td>
                                    <td>
                                        Denmark
                                    </td>
                                    <td>
                                        09/08/2018
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-user">
                                        <img src="{{ asset('backend/dashtrap/assets/images/users/avatar-5.jpg') }}"
                                            alt="table-user" class="mr-2 avatar-xs rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-semibold">Zara Raws</a>
                                    </td>
                                    <td>
                                        (02) 75 150 655
                                    </td>
                                    <td>
                                        austin@dayrep.com
                                    </td>
                                    <td>
                                        Germany
                                    </td>
                                    <td>
                                        07/15/2018
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
                <!--end card body-->

            </div>
            <!--end card-->
        </div>
        <!--end col-->

    </div>
    <!--end row-->
@endsection
@section('footer_links')
@endsection
