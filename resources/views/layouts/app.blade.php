<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        @include('includes.header')

        @yield('title')

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

        @yield('onPageStyles')

        @include('includes.headerStyles')


        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    @include('includes.nav')


    @include('includes.sideMenu')

    @yield('content')

    @include('includes.footer')

    @include('includes.scripts')

    @yield('onPageScript')

    @livewireScripts

</body>
<!-- END: Body-->
</html>
