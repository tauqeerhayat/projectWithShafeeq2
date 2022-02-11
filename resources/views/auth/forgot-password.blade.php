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
                                            Recover Password
                                        </div>
                                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                            <span>We will send you a link to reset password.</span>
                                        </h6>
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

                                            <form method="POST" action="{{ route('password.email') }}">
                                                @csrf
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <x-jet-input id="email" class="form-control round" type="text" name="email" :value="old('email')" required placeholder="Your Email Address" autocomplete="email" />
                                                    <div class="form-control-position">
                                                        <i class="ft-mail"></i>
                                                    </div>
                                                </fieldset>
                                                <div class="form-group text-center">
                                                    <button class=" registerBtn btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">
                                                        {{ __('Submit') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-footer border-0 p-0">
                                        <p class="float-sm-center text-center">Not a member ?
                                            <a href="{{ route('register')}}" class="card-link">Sign Up</a>
                                        </p>
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


