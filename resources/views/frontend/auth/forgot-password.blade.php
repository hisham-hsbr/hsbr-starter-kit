@extends('frontend.layouts.app')




@section('main_content')
    <div class="signin-section ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 ">
                    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>

                    <!-- Session Status -->
                    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <div class="form-group">
                                <label>Enter Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Your Email"
                                    required>
                                <x-frontend.input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <div class="text-center signin-btn">
                            <button type="submit">Email Password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
