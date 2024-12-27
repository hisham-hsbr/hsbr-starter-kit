@extends('frontend.layouts.app')




@section('main_content')
    <div class="signin-section ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 ">
                    <div class="block mt-4">
                        <div class="text-center signin-btn">
                            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                            </div>

                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
                                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                </div>
                            @endif
                            <form action="{{ route('guest.resend.email.verification', encrypt(Auth::user()->id)) }}"
                                method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="p-0 border-0 btn btn-link text-decoration-none"
                                    title="Resend Verification Email">
                                    <i class="fa-solid fa-paper-plane"></i> Resend
                                </button>
                            </form>
                            {{-- <form method="POST" action="{{ route('verification.send') }}">
                                @csrf

                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Resend
                                        Verification
                                        Email</button>
                                </div>
                            </form> --}}
                        </div>


                        <div class="text-center create-btn">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit"
                                    class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
