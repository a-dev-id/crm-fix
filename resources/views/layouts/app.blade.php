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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">


    <style>
        .ck-editor__editable {
            min-height: 200px;
        }

    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
        <a class="navbar-brand pe-3 ps-4 ps-lg-2 text-success" href="{{route('dashboard.index')}}">A-Dashboard</a>
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
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Logout
                        </a>
                    </form>
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
                        <a class="nav-link @yield('dashboard_active')" href="{{route('dashboard.index')}}">
                            <div class="nav-link-icon"><i class="fa-solid fa-chart-line"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link @yield('booking_active')" href="{{route('booking.index')}}">
                            <div class="nav-link-icon"><i class="fa-solid fa-bell-concierge"></i></div>
                            Bookings
                        </a>
                        <a class="nav-link @yield('guest_active')" href="{{route('guest.index')}}">
                            <div class="nav-link-icon"><i class="fa-solid fa-users"></i></div>
                            Guests
                        </a>
                        <a class="nav-link @yield('room_active')" href="{{route('room.index')}}">
                            <div class="nav-link-icon"><i class="fa-solid fa-hotel"></i></div>
                            Rooms
                        </a>
                        <a class="nav-link @yield('experience_active')" href="{{route('experience.index')}}">
                            <div class="nav-link-icon"><i class="fa-solid fa-person-biking"></i></div>
                            Experiences
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('vendors/sb-admin')}}/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('vendors/sb-admin')}}/js/datatables/datatables-simple-demo.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    @stack('js')
    <script>
        ClassicEditor
        .create( document.querySelector( '#campaign-benefit' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#remarks' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        const autoCloseElements = document.querySelectorAll(".auto-close");
        
        function fadeAndSlide(element) {
            const fadeDuration = 500;
            const slideDuration = 500;

            let opacity = 1;
            const fadeInterval = setInterval(function () {
                if (opacity > 0) {
                    opacity -= 0.1;
                    element.style.opacity = opacity;
                } else {
                    clearInterval(fadeInterval);
                    let height = element.offsetHeight;
                    const slideInterval = setInterval(function () {
                        if (height > 0) {
                            height -= 10;
                            element.style.height = height + "px";
                        } else {
                            clearInterval(slideInterval);
                            element.parentNode.removeChild(element);
                        }
                    }, slideDuration / 10);
                }
            }, fadeDuration / 10);
        }
        
        setTimeout(function () {
            autoCloseElements.forEach(function (element) {
                fadeAndSlide(element);
            });
        }, 5000);
    </script>
    <script>
        $('.guest_id').selectpicker();
    </script>
</body>

</html>