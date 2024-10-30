@extends('frontend.layouts.app')




@section('main_content')
    <!-- Sign In Section Start -->
    <div class="signin-section ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 ">
                    <form class="signin-form">
                        <div class="form-group">
                            <label>Enter Email</label>
                            <input type="email" class="form-control" placeholder="Enter Your Email" required>
                        </div>

                        <div class="form-group">
                            <label>Enter Password</label>
                            <input type="password" class="form-control" placeholder="Enter Your Password" required>
                        </div>

                        <div class="text-center signin-btn">
                            <button type="submit">Sign In</button>
                        </div>

                        <div class="text-center other-signin">
                            <span>Or sign in with</span>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-google'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-twitter'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-linkedin'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="text-center create-btn">
                            <p>Not have an account?
                                <a href="signup.html">
                                    Create an account
                                    <i class='bx bx-chevrons-right bx-fade-right'></i>
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In Section End -->
@endsection
