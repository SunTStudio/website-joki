<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        * {
            /* renggangkan text */
            letter-spacing: 0.5px;
        }

        #logo-image {
            width: 30%;
        }


        #head-text {
            font-size: 1.2rem;
            font-weight: 500;
        }

        @media (min-width: 320px) and (max-width: 767px) {
            #image-login {
                display: none;
            }

            #logo-image {
                width: 60%;
            }

        }
    </style>
</head>

<body style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Login 5 - Bootstrap Brain Component -->
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="card shadow border-0">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6" id="image-login">
                    <div class="card1 pb-5">
                        <div class="row">
                            <h3 class="fw-bold ps-5"><span style="color: #1e3c72">Let's</span><span class="text-warning">Coding</span></h3>
                        </div>
                        <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                            <img src="{{ asset('bg-login.png') }}" class="img-fluid" style="width: 60%">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card2 card border-0 px-4 py-5">
                        <form method="POST" action="{{ route('authenticate') }}">
                            @csrf
                            <div class="row mb-4 px-3">
                            <h3 class="fw-bold text-light"><span style="color: #1e3c72">Let's</span><span class="text-warning">Coding</span></h3>
                                {{-- <p class="mb-0 me-4 mt-2" id="head-text">
                                    {{ strtoupper('Sistem Pelaporan Keluhan Pelanggan') }}</p> --}}
                            </div>
                            <hr>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Username</h6>
                                </label>
                                <input class="mb-4" type="text" name="username"
                                    placeholder="Enter a valid Username">
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Password</h6>
                                </label>
                                <input type="password" name="password" placeholder="Enter password">
                            </div>
                            {{-- <div class="row px-3 mb-4">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input id="chk1" type="checkbox" name="chk" class="custom-control-input">
                                <label for="chk1" class="custom-control-label text-sm">Remember me</label>
                            </div>
                            <a href="#" class="ms-auto mb-0 text-sm">Forgot Password?</a>
                        </div> --}}
                            <div class="row mb-3 mt-3 px-3">
                                <button type="submit" class="btn btn-blue text-center">Login</button>
                            </div>

                            {{-- buat untuk create akun baru --}}
                            <div class="row mb-4 px-3 text-center">
                                <small class="font-weight-bold">Belum Punya Akun? <a href=""
                                        class="text-danger">Registrasi Sekarang</a></small>
                            </div>
                            {{-- <div class="row mb-4 px-3">
                            <small class="font-weight-bold">Don't have an account? <a
                                    class="text-danger ">Register</a></small>
                        </div> --}}
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-blue py-4">
                <div class="row px-3">
                    <small class="ms-4 ms-sm-5 mb-2">Copyright &copy; 2025.</small>
                    {{-- <div class="social-contact ms-4 ms-sm-auto">
                        <span class="fa fa-facebook me-4 text-sm"></span>
                        <span class="fa fa-google-plus me-4 text-sm"></span>
                        <span class="fa fa-linkedin me-4 text-sm"></span>
                        <span class="fa fa-twitter me-4 me-sm-5 text-sm"></span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($errors->any())
        <script>
            let errorMessages = '';
            @foreach ($errors->all() as $error)
                errorMessages += '{{ $error }}' + '\n';
            @endforeach
            Swal.fire({
                icon: 'error',
                title: 'Validasi Gagal!',
                text: errorMessages,
                html: '<pre style="text-align: left; font-size: 0.95rem;">{{ implode('\n', $errors->all()) }}</pre>',
                showConfirmButton: true,
            });
        </script>
    @endif
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

</body>

</html>
