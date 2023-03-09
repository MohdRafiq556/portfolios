<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Portfolio</title>

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('admin_dashboard/css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

        <!-- start other links -->

    </head>
    <body class="sb-nav-fixed">
        <x-admin.top-nav.admin-top-navbar-user-information></x-admin.top-nav.admin-top-navbar-user-information>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{route('admin.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            @if(auth()->user()->userHasRole('Admin'))
                                <x-admin.sidebar.admin-sidebar-project-categories-links></x-admin.sidebar.admin-sidebar-project-categories-links>

                                <x-admin.sidebar.admin-sidebar-projects-links></x-admin.sidebar.admin-sidebar-projects-links>

                                <div class="sb-sidenav-menu-heading">Addons</div>

                                <x-admin.sidebar.admin-sidebar-users-links></x-admin.sidebar.admin-sidebar-users-links>

                                <x-admin.sidebar.authorization-links></x-admin.sidebar.authorization-links>
                            @endif
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        @if(Auth::check())
                            <div class="sb-sidenav-menu-heading text-uppercase">{{auth()->user()->name}}</div>
                        @endif
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <!-- main -->
                
                @yield('content')
                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Portfolio - Mohd Rafiq 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('admin_dashboard/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('admin_dashboard/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('admin_dashboard/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('admin_dashboard/js/datatables-simple-demo.js')}}"></script>
    </body>
</html>
