@extends('frontend.layouts.app')




@section('main_content')
    <div class="signin-section ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 ">
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div>
                            <label>Enter Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Your Email"
                                value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                            <x-frontend.input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label>Enter Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Your Password"
                                value="{{ request()->query('password') }}" required>
                            <x-frontend.input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password_confirmation" name="password_confirmation" class="form-control"
                                placeholder="Confirm Your Password" value="{{ request()->query('password_confirmation') }}"
                                required>
                            <x-frontend.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="text-center signin-btn">
                            <button type="submit">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
