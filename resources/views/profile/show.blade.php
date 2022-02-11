@extends('layouts.app')

@section('title')
    <title>User Profile</title>
@endsection

@section('onPageStyles')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/users.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/timeline/vertical-timeline.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/timeline.css') }}">
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div id="user-profile">
                    <div class="row">
                        <div class="col-sm-12 col-xl-8">
                            <div class="media d-flex m-1 ">
                                <div class="align-left p-1">
                                    <a href="#" class="profile-image">
                                        {{-- <img src="{{ asset('app-assets/images/portrait/small/avatar-s-1.png') }}" class="rounded-circle img-border height-100" alt="Card image"> --}}
                                        <img src="{{ auth()->user()->profile_photo_url }}" class="rounded-circle img-border height-100" alt="Card image">
                                    </a>
                                </div>
                                <div class="media-body text-left  mt-1">
                                    <h3 class="font-large-1 white">{{ auth()->user()->username}}
                                        {{-- <span class="font-medium-1 white">(Project manager)</span> --}}
                                    </h3>
                                    <p class="white">
                                        {{-- <i class="ft-map-pin white"> </i> New York, USA<br> --}}
                                        <i class="ft-mail white"> </i> {{ auth()->user()->email}}
                                    </p>
                                    {{-- <p class="white text-bold-300 d-none d-sm-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed odio risus. Integer sit amet dolor elit. Suspendisse
                                        ac neque in lacus venenatis convallis. Sed eu lacus odio</p> --}}
                                    {{-- <ul class="list-inline">
                                        <li class="pr-1 line-height-1">
                                            <a href="#" class="font-medium-4 white ">
                                                <span class="ft-facebook"></span>
                                            </a>
                                        </li>
                                        <li class="pr-1 line-height-1">
                                            <a href="#" class="font-medium-4 white ">
                                                <span class="ft-twitter white"></span>
                                            </a>
                                        </li>
                                        <li class="line-height-1">
                                            <a href="#" class="font-medium-4 white ">
                                                <span class="ft-instagram"></span>
                                            </a>
                                        </li>
                                    </ul> --}}


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div id="timeline">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title-wrap bar-primary">
                                            <div class="card-title">User Profile</div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="timeline">
                                                {{-- <h4>Project ABC</h4> --}}
                                                <hr>
                                                <x-slot name="header">
                                                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                                        {{ __('Profile') }}
                                                    </h2>
                                                </x-slot>

                                                <div>
                                                    <div class="mx-auto py-10">
                                                        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                                            @livewire('profile.update-profile-information-form')

                                                            <x-jet-section-border />
                                                        @endif

                                                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                                            <div class="mt-10 sm:mt-0">
                                                                @livewire('profile.update-password-form')
                                                            </div>

                                                            <x-jet-section-border />
                                                        @endif

                                                        {{-- @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                                            <div class="mt-10 sm:mt-0">
                                                                @livewire('profile.two-factor-authentication-form')
                                                            </div>

                                                            <x-jet-section-border />
                                                        @endif

                                                        <div class="mt-10 sm:mt-0">
                                                            @livewire('profile.logout-other-browser-sessions-form')
                                                        </div>

                                                        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                                            <x-jet-section-border />

                                                            <div class="mt-10 sm:mt-0">
                                                                @livewire('profile.delete-user-form')
                                                            </div>
                                                        @endif --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Project Timeline div ends-->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
