<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title') | A-Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{asset('vendors/sb-admin')}}/css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{asset('vendors/sb-admin')}}/assets/img/favicon.png" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
        <a class="navbar-brand pe-3 ps-4 ps-lg-2 text-success" href="{{route('index')}}">A-Dashboard</a>
        <ul class="navbar-nav align-items-center ms-auto">
            <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="{{asset('vendors/sb-admin')}}/assets/img/illustrations/profiles/profile-1.png" /></a>
                <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <img class="dropdown-user-img" src="{{asset('vendors/sb-admin')}}/assets/img/illustrations/profiles/profile-1.png" />
                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name">{{Auth::user()->name}}</div>
                            <div class="dropdown-user-details-email">{{Auth::user()->email}}</div>
                        </div>
                    </h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#!">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">
                        <div class="sidenav-menu-heading">General</div>
                        <a class="nav-link @yield('dashboard_active')" href="{{route('index')}}">
                            <div class="nav-link-icon"><i class="fa-solid fa-chart-line"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link @yield('booking_active')" href="{{route('booking.index')}}">
                            <div class="nav-link-icon"><i class="fa-solid fa-bell-concierge"></i></div>
                            Bookings
                        </a>
                    </div>
                </div>
                <div class="sidenav-footer">
                    <div class="sidenav-footer-content">
                        <div class="sidenav-footer-subtitle">Logged in as:</div>
                        <div class="sidenav-footer-title">{{Auth::user()->name}}</div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                {{$slot}}
            </main>
            <footer class="footer-admin mt-auto footer-light">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright &copy; {{date("Y")}}</div>
                        <div class="col-md-6 text-md-end small">
                            Create with <i class="fa-solid fa-heart"></i> by <a href="https://www.instagram.com/a_dev.id/" target="_blank">a-dev</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('vendors/sb-admin')}}/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('vendors/sb-admin')}}/js/datatables/datatables-simple-demo.js"></script>

</body>

</html>