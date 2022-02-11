@extends('auth.base')

@section('title')
    <title>Login</title>
@endsection

@section('content')
    <body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
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
                                            Member Login
                                        </div>
                                    </div>
                                    <div class="card-content">

                                        <div class="card-body">
                                            <x-slot name="logo">
                                                <img src="app-assets/images/logo/logo.png" alt="branding logo">
                                            </x-slot>

                                            <x-jet-validation-errors class="mb-4 text-danger" />

                                            @if (session('status'))
                                                <div class="mb-4 font-medium text-sm text-green-600">
                                                    {{ session('status') }}
                                                </div>
                                            @endif

                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <x-jet-input id="email" class="form-control round" type="text" name="email" :value="old('email')" required placeholder="Your Email Address" autofocus autocomplete="email" />
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
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-12 text-center text-sm-left">

                                                    </div>
                                                    <div class="col-md-6 col-12 float-sm-left text-center text-sm-right">
                                                        @if (Route::has('password.request'))
                                                            <a href="{{ route('password.request')}}" class="card-link">Forgot Password?</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button class=" registerBtn btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">
                                                        {{ __('Login') }}
                                                    </button>
                                                </div>
                                                {{-- <p class="card-subtitle text-muted text-right font-small-3 mx-2 my-1">
                                                    <span>Already a member ?
                                                        <a href="{{ route('login')}}" class="card-link">{{ __('Sign In') }}</a>
                                                    </span>
                                                </p> --}}
                                                <p class="card-subtitle text-muted text-right font-small-3 mx-2 my-1">
                                                    <span>Don't have an account ? <a href="{{ route('register')}}" class="card-link">Sign Up</a></span>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </body>
@endsection

