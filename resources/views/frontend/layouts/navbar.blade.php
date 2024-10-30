<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="index.html" class="logo">
            <img src="{{ asset('frontend/jovie/assets/img/logo.png') }}" alt="logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('frontend/jovie/assets/img/logo.png') }}" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="m-auto navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle active">Home</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="index.html" class="nav-link active">Home One</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index-two.html" class="nav-link">Home Two</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index-three.html" class="nav-link">Home Three</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index-four.html" class="nav-link">Home Four</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index-five.html" class="nav-link">Home Five</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="about.html" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Jobs</a>

                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="find-job.html" class="nav-link">Find A Job</a>
                                </li>
                                <li class="nav-item">
                                    <a href="post-job.html" class="nav-link">Post A Job</a>
                                </li>
                                <li class="nav-item">
                                    <a href="job-list.html" class="nav-link">Job List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="job-grid.html" class="nav-link">Job Grid</a>
                                </li>
                                <li class="nav-item">
                                    <a href="job-details.html" class="nav-link">Job Details</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Candidates</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="candidate.html" class="nav-link">Candidates</a>
                                </li>
                                <li class="nav-item">
                                    <a href="candidate-details.html" class="nav-link">Candidates Details</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Pages</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="company.html" class="nav-link">Company</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pricing.html" class="nav-link">Pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">Profile</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="account.html" class="nav-link">Account</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link dropdown-toggle">Member</a>

                                            <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <a href="sign-in.html" class="nav-link">Sign In</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="sign-up.html" class="nav-link">Sign Up</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="reset-password.html" class="nav-link">Reset
                                                        Password</a>
                                                </li>
                                            </ul>
                                        <li>
                                        <li class="nav-item">
                                            <a href="resume.html" class="nav-link">Resume</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="404.html" class="nav-link">404 Page</a>
                                </li>
                                <li class="nav-item">
                                    <a href="testimonial.html" class="nav-link">Testimonials</a>
                                </li>
                                <li class="nav-item">
                                    <a href="faq.html" class="nav-link">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Catagories</a>
                                </li>
                                <li class="nav-item">
                                    <a href="privacy-policy.html" class="nav-link">Privacy & Policy</a>
                                </li>
                                <li class="nav-item">
                                    <a href="terms-condition.html" class="nav-link">Terms & Conditions</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Blog</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="blog.html" class="nav-link">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="blog-two" class="nav-link">Blog Two</a>
                                </li>
                                <li class="nav-item">
                                    <a href="blog-details.html" class="nav-link">Blog Details</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="contact.html" class="nav-link">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none"
                                data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                <img src="{{ asset('frontend/jovie/assets/img/flags/us.jpg') }}" alt="user-image"
                                    class="me-0 me-sm-1" height="18"><span>{{ App::getLocale() }}</span>
                            </a>
                            <ul class="dropdown-menu">

                                <!-- item-->
                                <a href="{{ route('change-locale', ['locale' => 'en']) }}" class="nav-link">
                                    <img src="{{ asset('frontend/jovie/assets/img/flags/germany.jpg') }}"
                                        alt="user-image" class="me-1" height="12"> <span
                                        class="align-middle">English</span>
                                </a>

                                <!-- item-->
                                <a href="{{ route('change-locale', ['locale' => 'ml']) }}" class="nav-link">
                                    <img src="{{ asset('frontend/jovie/assets/img/flags/italy.jpg') }}"
                                        alt="user-image" class="me-1" height="12"> <span
                                        class="align-middle">Malayalam</span>
                                </a>


                            </ul>
                        </li>
                    </ul>

                    <div class="other-option">
                        <a href="sign-up.html" class="signup-btn">Sign Up</a>
                        <a href="{{ route('login') }}" class="signin-btn">Sign In</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
