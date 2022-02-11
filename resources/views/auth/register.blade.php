@extends('auth.base')

@section('title')
    <title>Register</title>
@endsection

@section('content')
    <body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-wrapper-before"></div>
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="flexbox-container">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
                                <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                    <div class="card-header border-0">
                                        <div class="text-center mb-1">
                                            <img src="app-assets/images/logo/logo.png" alt="branding logo">
                                        </div>
                                        <div class="font-large-1  text-center">
                                            Become A Member
                                        </div>
                                    </div>
                                    <div class="card-content">

                                        <div class="card-body">
                                            <x-slot name="logo">
                                                {{-- <x-jet-authentication-card-logo /> --}}
                                                <img src="app-assets/images/logo/logo.png" alt="branding logo">
                                            </x-slot>

                                            <x-jet-validation-errors class="mb-4 text-danger" />

                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf

                                                {{-- <div class="form-group">
                                                    <x-jet-label for="username" value="{{ __('Username') }}" />
                                                    <x-jet-input id="username" class="form-control round" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                                                    <div class="form-control-position">
                                                        <i class="ft-user"></i>
                                                    </div>
                                                </div> --}}
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <x-jet-input id="username" class="form-control round" type="text" name="username" :value="old('username')" placeholder="Choose Username" required autofocus autocomplete="username" />
                                                    <div class="form-control-position">
                                                        <i class="ft-user"></i>
                                                    </div>
                                                </fieldset>

                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <x-jet-input id="email" class="form-control round" type="text" name="email" :value="old('email')" required placeholder="Your Email Address" autocomplete="email" />
                                                    <div class="form-control-position">
                                                        <i class="ft-mail"></i>
                                                    </div>
                                                </fieldset>

                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <x-jet-input id="password" class="form-control round" type="password" name="password" :value="old('password')" placeholder="Enter Password" required/>
                                                    <div class="form-control-position">
                                                        <i class="ft-lock"></i>
                                                    </div>
                                                </fieldset>

                                                {{-- <div class="mt-4">
                                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                                </div>

                                                <div class="mt-4">
                                                    <x-jet-label for="password" value="{{ __('Password') }}" />
                                                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                                </div> --}}

                                                {{-- <div class="mt-4">
                                                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                                </div> --}}

                                                {{-- @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                                    <div class="mt-4">
                                                        <x-jet-label for="terms">
                                                            <div class="flex items-center">
                                                                <x-jet-checkbox name="terms" id="terms"/>

                                                                <div class="ml-2">
                                                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                                    ]) !!}
                                                                </div>
                                                            </div>
                                                        </x-jet-label>
                                                    </div>
                                                @endif --}}

                                                <div class="form-group text-center">

                                                    <button class=" registerBtn btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>

                                                {{-- <a class="card-subtitle text-muted text-right font-small-3 mx-2 my-1" href="{{ route('login') }}">
                                                    {{ __('Already registered?') }}
                                                </a> --}}
                                                <p class="card-subtitle text-muted text-right font-small-3 mx-2 my-1">
                                                    <span>Already a member ?
                                                        <a href="{{ route('login')}}" class="card-link">{{ __('Sign In') }}</a>
                                                    </span>
                                                </p>
                                            </form>
                                        </div>

                                        {{-- <p class="card-subtitle text-muted text-right font-small-3 mx-2 my-1">
                                            <span>Already a member ?
                                                <a href="login.html" class="card-link">Sign In</a>
                                            </span>
                                        </p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- END: Content-->
    </body>
@endsection
