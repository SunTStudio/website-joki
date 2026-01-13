<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- icon browser --}}
    <link rel="icon" href="{{ asset('logo_main.png') }}" type="image/png">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
    <style>
        * {
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }



        /* Efek Hover pada Sidebar Nav Link */
        .sidebar .nav-link {
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            padding-left: 20px;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-left-color: #fff;
            transform: translateX(5px);
            border-radius: 0 5px 5px 0;
        }

        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            border-left-color: #fff;
            font-weight: 600;
        }

        /* Efek pada Icon */
        .sidebar .nav-link i {
            transition: all 0.3s ease;
            margin-right: 8px;
        }

        .sidebar .nav-link:hover i {
            transform: scale(1.15);
            color: #fff;
        }

        /* Efek pada Sidebar Brand */
        .sidebar-brand {
            transition: all 0.3s ease;
        }

        .sidebar-brand:hover {
            transform: scale(1.05);
        }

        /* Efek pada Sidebar Heading */
        .sidebar-heading {
            transition: all 0.3s ease;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        /* Styling untuk Collapse Items */
        .collapse-inner {
            background-color: rgba(255, 255, 255, 0.95) !important;
            border-radius: 8px !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .collapse-header {
            font-weight: 700;
            color: #1e3c72;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.8rem;
        }

        .collapse-item {
            padding: 12px 5px !important;
            color: #2a5298;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            margin-bottom: 5px;
            border-radius: 4px;
            font-weight: 500;
        }

        .collapse-item:hover {
            background-color: #e7f0ff;
            border-left-color: #2a5298;
            color: #1e3c72;
            transform: translateX(5px);
            text-decoration: none;
        }

        .collapse-item:before {
            opacity: 0;
            transition: opacity 0.3s ease;
            margin-right: 5px;
        }

        .collapse-item:hover:before {
            opacity: 1;
        }

        /* Object Fit untuk semua gambar */
        img {
            object-fit: cover;
            object-position: center;
            width: 100%;
        }

        img.rounded-circle {
            object-fit: cover;
        }

        /* Margin untuk tombol di tabel (berlaku untuk HP dan Desktop) */
        table td a,
        table td button {
            margin: 0.2rem;
        }
    </style>
    @yield('style')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"
            style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#"
                style="padding: 0.75rem 1rem; gap: 0;">

                <div class="sidebar-brand-icon" style="margin: 0; padding: 0;">
                    <img src="{{ asset('logo_main.png') }}" alt="" class="img-fluid"
                        style="width: 35px; height: 35px;">
                    {{-- <h3 class="fw-bold text-light"><span style="color: #1e3c72">Let's</span><span class="text-warning">Coding</span></h3> --}}
                </div>
                <div class="sidebar-brand-text" style="margin: 0; padding-left: 8px; font-size: 0.95rem;"><sup
                        style="color: #c7ff44">Let's</sup>
                    Coding</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Produk -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.produk') }}">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Produk</span></a>
            </li>

            <!-- Nav Item - Proses -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.proses') }}">
                    <i class="fas fa-fw fa-spinner"></i>
                    <span>Proses</span></a>
            </li>

            <!-- Nav Item - Selesai -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.selesai') }}">
                    <i class="fas fa-fw fa-check-circle"></i>
                    <span>Selesai</span></a>
            </li>

            <!-- Nav Item - Batal -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.batal') }}">
                    <i class="fas fa-fw fa-times-circle"></i>
                    <span>Batal</span></a>
            </li>

            <!-- Nav Item - Testimoni -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.testimoni') }}">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Testimoni</span></a>
            </li>

            <!-- Nav Item - Portofolio -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.portofolio') }}">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Portofolio</span></a>
            </li>
            {{-- subscribers --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.subscribers') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Subscribers</span></a>
            </li>



            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><strong>{{ auth()->user()->name }}</strong>
                                    <br> <small>
                                        Administrator</small></span>
                                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item btn-sm btn-warning btn">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PT Sintaks Media Solusindo</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
    <script>
        $(document).ready(function() {
            if ($(window).width() < 768) {
                $('.sidebar').addClass('toggled');
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Maaf!',
                text: '{{ session('error') }}',
                showConfirmButton: true,
            });
        </script>
    @endif
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script>
        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();

            let form = $(this).closest('form');

            Swal.fire({
                title: 'Yakin ingin hapus?',
                text: "Data tidak bisa dikembalikan setelah dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // kirim form kalau user klik hapus
                }
            })
        });
    </script>
    @yield('script')

</body>

</html>
