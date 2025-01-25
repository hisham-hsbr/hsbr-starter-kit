<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../../index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="contactDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quick Links
            </a>
            <div class="dropdown-menu" aria-labelledby="contactDropdown">
                <a class="dropdown-item" href="#">Add Test Demos</a>
                <a class="dropdown-item" href="#">Support</a>
            </div>
        </li>
    </ul>
    {{-- google translate --}}
    @if (Auth::user()->settings['google_translate_mode']['value'] == 1)
        <div class="text-end">
            <div id="google_translate_element"></div>
        </div>
    @endif
    <!-- Right navbar links -->
    <ul class="ml-auto navbar-nav">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">

                        <div class="input-group-append">

                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('backend/admin_lte/dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                            class="mr-3 img-size-50 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="mr-1 far fa-clock"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('backend/admin_lte/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                            class="mr-3 img-size-50 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="mr-1 far fa-clock"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('backend/admin_lte/dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                            class="mr-3 img-size-50 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="mr-1 far fa-clock"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span
                    class="badge badge-warning navbar-badge unread-count">{{ Auth::user()->unreadNotifications->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="{{ route('notifications.show') }}" class="dropdown-item">
                    <i class="mr-2 fas fa-envelope"></i><span
                        class="unread-count">{{ Auth::user()->unreadNotifications->count() }}</span> new messages
                    <span class="float-right text-sm text-muted">3 mins</span>
                </a>

                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="mr-2 fas fa-users"></i> 8 friend requests
                    <span class="float-right text-sm text-muted">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="mr-2 fas fa-file"></i> 3 new reports
                    <span class="float-right text-sm text-muted">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <div class="dropdown">
            <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span id="selectedLanguage">{{ App::getLocale() }}</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                <a class="dropdown-item" href="{{ route('change-locale', 'en') }}" data-lang="en">English</a>
                <a class="dropdown-item" href="{{ route('change-locale', 'ml') }}" data-lang="ml">മലയാളം</a>
                <a class="dropdown-item" href="{{ route('change-locale', 'hi') }}" data-lang="fr">हिंदी</a>
                <a class="dropdown-item" href="{{ route('change-locale', 'ar') }}" data-lang="fr">عربي</a>
            </div>
        </div>

        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <x-app.user-profile-image class="user-image img-circle elevation-2" />
                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                <i class="fa-solid fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <x-app.user-profile-image class="img-circle elevation-2" />
                    <p>
                        {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                        <small>{{ Auth::user()->email }}</small>
                        <small>
                            Time-Zone :
                            {{ Auth::user()->timeZone->time_zone }}
                            ({{ Auth::user()->timeZone->utc_code }})
                        </small>
                    </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                    <div class="row">
                        <div class="text-center col-4">
                            <a href="#">Followers</a>
                        </div>
                        <div class="text-center col-4">
                            <a href="#">Sales</a>
                        </div>
                        <div class="text-center col-4">
                            <a href="#">Friends</a>
                        </div>
                    </div>
                    <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="" class="btn btn-default btn-flat">Profile</a>

                    <a class="float-right btn btn-default btn-flat" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
