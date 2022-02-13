<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="app-assets/images/backgrounds/02.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('dashboard')}}"><img class="brand-logo" alt="Chameleon admin logo" src="{{ asset('app-assets/images/logo/logo.png') }}" />
                    <h3 class="brand-text">Chameleon</h3>
                </a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="navigation-background"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="{{ route('dashboard')}}"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
            </li>
        </ul>
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="{{ route('admin.role')}}"><i class="ft-edit"></i><span class="menu-title" data-i18n="">Role</span></a>
            </li>
        </ul>
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="{{ route('admin.permission')}}"><i class="ft-edit"></i><span class="menu-title" data-i18n="">Permission</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
