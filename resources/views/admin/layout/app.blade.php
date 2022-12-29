<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>POS - Admin Panel</title>
    <link rel="apple-touch-icon" href="{{ asset('admin-panel/theme-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/ico/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-panel/theme-assets/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-panel/theme-assets/vendors/css/charts/chartist.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-panel/theme-assets/css/app-lite.css') }}">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-panel/theme-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-panel/theme-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-panel/theme-assets/css/pages/dashboard-ecommerce.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    <!-- fixed-top-->
    <nav
        class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="collapse navbar-collapse show" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                    class="ficon ft-maximize"></i></a></li>
                        <li class="nav-item dropdown navbar-search"><a class="nav-link dropdown-toggle hide"
                                data-toggle="dropdown" href="#"><i class="ficon ft-search"></i></a>
                            <ul class="dropdown-menu">
                                <li class="arrow_box">
                                    <form>
                                        <div class="input-group search-box">
                                            <div class="position-relative has-icon-right full-width">
                                                <input class="form-control" id="search" type="text"
                                                    placeholder="Search here...">
                                                <div class="form-control-position navbar-search-close"><i
                                                        class="ft-x"> </i></div>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link"
                                id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span
                                    class="selected-language"></span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                <div class="arrow_box"><a class="dropdown-item" href="#"><i
                                            class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item"
                                        href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a
                                        class="dropdown-item" href="#"><i class="flag-icon flag-icon-ru"></i>
                                        Russian</a><a class="dropdown-item" href="#"><i
                                            class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item"
                                        href="#"><i class="flag-icon flag-icon-es"></i> Spanish</a></div>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label"
                                href="#" data-toggle="dropdown"><i class="ficon ft-mail"> </i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right"><a class="dropdown-item" href="#"><i
                                            class="ft-book"></i> Read Mail</a><a class="dropdown-item"
                                        href="#"><i class="ft-bookmark"></i> Read Later</a><a
                                        class="dropdown-item" href="#"><i class="ft-check-square"></i> Mark all
                                        Read </a></div>
                            </div>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#"
                                data-toggle="dropdown"><span class="avatar avatar-online"><img
                                        src="{{ asset('admin-panel/theme-assets/images/portrait/small/avatar-s-19.png') }}"
                                        alt="avatar"><i></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right"><a class="dropdown-item" href="#"><span
                                            class="avatar avatar-online"><img
                                                src="{{ asset('admin-panel/theme-assets/images/portrait/small/avatar-s-19.png') }}"
                                                alt="avatar"><span
                                                class="user-name text-bold-700 ml-1">{{ Auth()->user()->name }}</span></span></a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i
                                            class="ft-user"></i> Edit Profile</a><a class="dropdown-item"
                                        href="#"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item"
                                        href="#"><i class="ft-check-square"></i> Task</a><a
                                        class="dropdown-item" href="#"><i class="ft-message-square"></i>
                                        Chats</a>
                                    <form action="{{ url('/logout') }}" method="POST">
                                        @csrf
                                        <div class="dropdown-divider"></div>
                                        <button class="btn btn-link">
                                            <p class="text-danger"><i class="ft-power"></i> Logout</p>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true"
        data-img="{{ asset('admin-panel/theme-assets/images/backgrounds/02.jpg') }}">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ url('admin') }}"><img
                            class="brand-logo" alt="admin logo"
                            src="{{ asset('admin-panel/theme-assets/images/logo/logo.png') }}" />
                        <h3 class="brand-text">pos</h3>
                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
            </ul>
        </div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item {{ Route::current()->uri == 'admin' ? 'active' : '' }}"><a
                        href="{{ url('admin') }}"><i class="ft-home"></i><span class="menu-title"
                            data-i18n="">Dashboard</span></a>
                </li>
                <li class="nav-item {{ Route::current()->uri == 'admin/categories' ? 'active' : '' }}"><a
                        href="{{ url('admin/categories') }}"><i class="ft-pie-chart"></i><span class="menu-title"
                            data-i18n="">Category</span></a>
                </li>
                <li class="nav-item {{ Route::current()->uri == 'admin/brands' ? 'active' : '' }}"><a
                        href="{{ url('admin/brands') }}"><i class="ft-droplet"></i><span class="menu-title"
                            data-i18n="">Brand</span></a>
                </li>
                <li class="nav-item {{ Route::current()->uri == 'admin/item-location' ? 'active' : '' }}"><a
                        href="{{ url('admin/item-location') }}"><i class="ft-map"></i><span class="menu-title"
                            data-i18n="">Item Location</span></a>
                </li>
                <li class="nav-item {{ Route::current()->uri == 'admin/items' ? 'active' : '' }}"><a
                        href="{{ url('admin/items') }}"><i class="ft-layers"></i><span class="menu-title"
                            data-i18n="">Item</span></a>
                </li>
                <li class="nav-item {{ Route::current()->uri == 'admin/suppliers' ? 'active' : '' }}"><a
                        href="{{ url('admin/suppliers') }}"><i class="ft-box"></i><span class="menu-title"
                            data-i18n="">Supplier</span></a>
                </li>
                <li class="nav-item {{ Route::current()->uri == 'admin/counters' ? 'active' : '' }}"><a
                        href="{{ url('admin/counters') }}"><i class="ft-printer"></i><span class="menu-title"
                            data-i18n="">Counter</span></a>
                </li>
                <li class="nav-item {{ Route::current()->uri == 'admin/customers' ? 'active' : '' }}"><a
                        href="{{ url('admin/customers') }}"><i class="ft-user"></i><span class="menu-title"
                            data-i18n="">Customer</span></a>
                </li>
                <li class="nav-item {{ Route::current()->uri == 'admin/users' ? 'active' : '' }}"><a
                        href="{{ url('admin/users') }}"><i class="ft-user"></i><span class="menu-title"
                            data-i18n="">User</span></a>
                </li>
                {{-- transaction tabs --}}
                <li class="nav-item {{ Route::current()->uri == 'admin/sales' ? 'active' : '' }}"><a href="{{ url('admin/sales') }}"><i class="ft-check-circle"></i><span
                            class="menu-title" data-i18n="">Sale</span></a>
                </li>
                <li class="nav-item"><a href="{{ url('admin/sample') }}"><i class="ft-layout"></i><span
                            class="menu-title" data-i18n="">Sample Features</span></a>
                </li>
            </ul>
        </div>
        <div class="navigation-background"></div>
    </div>

    <div class="app-content content">
        @yield('content')
        <!-- some content will go here ... -->
    </div>

    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
                class="float-md-left d-block d-md-inline-block">2022 &copy; Copyright <a
                    class="text-bold-800 grey darken-2" href="#" target="_blank">SoftComm Technology</a></span>
            </ul>
        </div>
    </footer>
    {{-- jquery to make select form --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('admin-panel/theme-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('admin-panel/theme-assets/vendors/js/charts/chartist.min.js') }}" type="text/javascript">
    </script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="{{ asset('admin-panel/theme-assets/js/core/app-menu-lite.js') }}" type="text/javascript"></script>
    <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
    <!-- END CHAMELEON  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('admin-panel/theme-assets/js/scripts/pages/dashboard-lite.js') }}" type="text/javascript">
    </script>
    <!-- END PAGE LEVEL JS-->
    @yield('js')
</body>

</html>
