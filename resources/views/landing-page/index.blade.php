<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Let's Coding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/landing_page.css">
    <style>
        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2) !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark py-3" id="navbar">
        <div class="container">
            <h3 class="fw-bold text-light">Let's<span class="text-warning">Coding</span></h3>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Portofolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontak</a>
                    </li>
                    {{-- login --}}
                    <li class="nav-item ms-lg-3">
                        <a class=" btn btn-light btn-sm fw-bold" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 text-white">
                    <h1 class="display-4 fw-bold mb-3">Tugas Coding Numpuk? <br> Serahkan pada Ahlinya!</h1>
                    <p class="lead mb-4">Jasa joki tugas website dan programming profesional. Pengerjaan cepat, coding
                        rapi, dan harga pas di kantong mahasiswa.</p>
                    <a href="#"
                        class="btn btn-light text-primary fw-bold rounded-pill px-4 py-2 shadow-sm">Konsultasi
                        Sekarang</a>
                </div>
                <div class="col">
                    {{-- kasih shadow --}}
                    <img src="{{ asset('hero.png') }}" alt="" class="img-fluid"
                        style="filter: drop-shadow(0 0 1rem rgba(0, 0, 0, 0.2));">
                </div>
            </div>
        </div>
    </section>
    <section id="produk-kami">
        <div class="container">
            <div class="headline text-center p-5">
                <p>Produk Kami</p>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('landing_page/landing_page.jpg') }}" class="card-img-top img-fluid"
                            alt="...">
                        <div class="card-body produk">
                            <h5 class="card-title">Jasa Landing Page</h5>
                            <p class="card-text">Tingkatkan konversi penjualan dengan landing page yang menarik, cepat,
                                dan responsif untuk semua perangkat.</p>
                            <div class="mb-3">
                                <h6 class="fw-bold text-primary mb-0">Mulai Rp 150.000</h6>
                                <small class="text-muted">Estimasi: 1-2 Hari</small>
                            </div>
                            <a href="#" class="btn btn-primary">Pesan Sekarang</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('landing_page/landing_page.jpg') }}" class="card-img-top img-fluid"
                            alt="...">
                        <div class="card-body produk">
                            <h5 class="card-title">Website Dinamis</h5>
                            <p class="card-text">Website dengan panel admin yang memudahkan Anda mengelola konten,
                                artikel, dan galeri tanpa ribet.</p>
                            <div class="mb-3">
                                <h6 class="fw-bold text-primary mb-0">Mulai Rp 350.000</h6>
                                <small class="text-muted">Estimasi: 3-5 Hari</small>
                            </div>
                            <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('landing_page/landing_page.jpg') }}" class="card-img-top img-fluid"
                            alt="...">
                        <div class="card-body produk">
                            <h5 class="card-title">Custom Website</h5>
                            <p class="card-text">Butuh fitur khusus? Kami bangun website sesuai kebutuhan spesifik
                                bisnis Anda dengan teknologi terbaru.</p>
                            <div class="mb-3">
                                <h6 class="fw-bold text-primary mb-0">Hubungi Kami</h6>
                                <small class="text-muted">Estimasi: Menyesuaikan</small>
                            </div>
                            <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>

    </section>
    <section id="portofolio" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-light">Portofolio Terbaru</h2>
                <p class="text-light">Beberapa hasil karya terbaik yang telah kami kerjakan</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="portfolio-header position-relative">
                            <div class="portfolio-grid">
                                <img src="{{ asset('landing_page/landing_page.jpg') }}" alt="Project 1 Main">
                                <img src="{{ asset('landing_page/landing_page.jpg') }}" alt="Project 1 Sub">
                                <img src="{{ asset('landing_page/landing_page.jpg') }}" alt="Project 1 Sub">
                            </div>
                            <span
                                class="position-absolute top-0 start-0 bg-primary text-white px-3 py-1 m-3 rounded-pill small shadow-sm">Web
                                App</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Sistem Informasi Sekolah</h5>
                            <p class="card-text text-muted">Platform manajemen data siswa, guru, dan nilai akademik
                                berbasis Laravel yang efisien.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="portfolio-header position-relative">
                            <div class="portfolio-grid">
                                <img src="{{ asset('landing_page/landing_page.jpg') }}" alt="Project 2 Main">
                                <img src="{{ asset('landing_page/landing_page.jpg') }}" alt="Project 2 Sub">
                                <img src="{{ asset('landing_page/landing_page.jpg') }}" alt="Project 2 Sub">
                            </div>
                            <span
                                class="position-absolute top-0 start-0 bg-success text-white px-3 py-1 m-3 rounded-pill small shadow-sm">Landing
                                Page</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Company Profile UMKM</h5>
                            <p class="card-text text-muted">Desain modern dan responsif untuk meningkatkan branding dan
                                kepercayaan pelanggan bisnis lokal.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="portfolio-header position-relative">
                            <div class="portfolio-grid">
                                <img src="{{ asset('landing_page/landing_page.jpg') }}" alt="Project 3 Main">
                                <img src="{{ asset('landing_page/landing_page.jpg') }}" alt="Project 3 Sub">
                                <img src="{{ asset('landing_page/landing_page.jpg') }}" alt="Project 3 Sub">
                            </div>
                            <span
                                class="position-absolute top-0 start-0 bg-warning text-dark px-3 py-1 m-3 rounded-pill small shadow-sm">E-Commerce</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Toko Online Fashion</h5>
                            <p class="card-text text-muted">Website toko online lengkap dengan fitur keranjang belanja,
                                checkout, dan integrasi pembayaran.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="teknologi" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-light">Teknologi</h2>
                <p class="text-light">Kami menggunakan teknologi modern untuk hasil terbaik</p>
            </div>
            <div class="row row-cols-2 row-cols-md-4 g-4">
                @foreach ([['name' => 'Laravel', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/laravel/laravel-original.svg'], ['name' => 'HTML', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/html5/html5-original.svg'], ['name' => 'CSS', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/css3/css3-original.svg'], ['name' => 'Bootstrap', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/bootstrap/bootstrap-original.svg'], ['name' => 'JavaScript', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/javascript/javascript-original.svg'], ['name' => 'jQuery', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/jquery/jquery-original.svg'], ['name' => 'PHP', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/php/php-original.svg'], ['name' => 'MySQL', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/mysql/mysql-original.svg']] as $tech)
                    <div class="col">
                        <div class="card border-0 shadow-sm h-100 hover-card text-center">
                            <div class="card-body py-4 d-flex flex-column align-items-center justify-content-center">
                                <img src="{{ $tech['logo'] }}" alt="{{ $tech['name'] }}" class="mb-3"
                                    style="height: 50px; width: auto;">
                                <h5 class="fw-bold mb-0 text-dark">{{ $tech['name'] }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="kontak" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-white">Hubungi Kami</h2>
                <p class="text-white-50">Punya pertanyaan atau butuh konsultasi? Chat kami sekarang!</p>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="card border-0 shadow-sm h-100 hover-card">
                                <div class="card-body d-flex align-items-center p-4">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1">Lokasi</h5>
                                        <p class="mb-0 text-muted">Malang, Jawa Timur, Indonesia</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card border-0 shadow-sm h-100 hover-card">
                                <div class="card-body d-flex align-items-center p-4">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle p-3 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                            <path
                                                d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1">WhatsApp</h5>
                                        <p class="mb-0 text-muted">+62 812-3456-7890</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card border-0 shadow-sm h-100 hover-card">
                                <div class="card-body d-flex align-items-center p-4">
                                    <div class="bg-danger bg-opacity-10 text-danger rounded-circle p-3 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1">Email</h5>
                                        <p class="mb-0 text-muted">admin@jokicoding.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form class="p-4 p-md-5 bg-white rounded-4 shadow-lg">
                        <h4 class="fw-bold mb-4">Kirim Pesan</h4>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingName" placeholder="Nama Lengkap">
                            <label for="floatingName">Nama Lengkap</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingEmail"
                                placeholder="name@example.com">
                            <label for="floatingEmail">Email Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingMessage" style="height: 150px"></textarea>
                            <label for="floatingMessage">Pesan / Detail Tugas</label>
                        </div>
                        <button class="btn btn-primary w-100 py-3 fw-bold" type="submit">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="testimoni" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-light">Kata Mereka</h2>
                <p class="text-light">Testimoni asli dari klien yang puas dengan layanan kami</p>
            </div>
            <div class="row g-4">
                @foreach ([['name' => 'Budi Santoso', 'role' => 'Mahasiswa TI', 'text' => 'Gila sih, deadline tinggal 2 hari tapi bisa kelar dalam semalam. Codingannya juga rapi banget, gampang dipahamin pas presentasi.'], ['name' => 'Siti Aminah', 'role' => 'Mahasiswa SI', 'text' => 'Harganya pas banget di kantong mahasiswa. Adminnya ramah dan fast respon. Recommended banget buat yang lagi buntu skripsi!'], ['name' => 'Rizky Pratama', 'role' => 'Freelancer', 'text' => 'Hasil website company profile-nya elegan dan profesional. Klien saya puas banget sama hasilnya. Bakal langganan terus nih.']] as $testi)
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm p-3">
                            <div class="card-body">
                                <div class="mb-3 text-warning">
                                    @for ($i = 0; $i < 5; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                    @endfor
                                </div>
                                <p class="card-text fst-italic">"{{ $testi['text'] }}"</p>
                                <div class="d-flex align-items-center mt-4">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($testi['name']) }}&background=random"
                                        class="rounded-circle me-3" width="50" alt="{{ $testi['name'] }}">
                                    <div>
                                        <h6 class="fw-bold mb-0">{{ $testi['name'] }}</h6>
                                        <small class="text-muted">{{ $testi['role'] }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <footer class="bg-dark text-white pt-5 pb-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <h3 class="fw-bold mb-3">Let's<span class="text-primary">Coding</span></h3>
                    <p class="text-white-50">Solusi terbaik untuk tugas coding dan pembuatan website profesional.
                        Cepat, Aman, dan Terpercaya.</p>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="fw-bold mb-3">Menu</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Produk</a>
                        </li>
                        <li class="mb-2"><a href="#"
                                class="text-white-50 text-decoration-none">Portofolio</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Kontak</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="fw-bold mb-3">Layanan</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Jasa
                                Website</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Joki Tugas
                                Kuliah</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Fixing
                                Bug</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Redesign
                                UI/UX</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="fw-bold mb-3">Newsletter</h5>
                    <p class="text-white-50 small">Dapatkan promo menarik setiap minggunya.</p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email Anda" aria-label="Email Anda">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </div>
                </div>
            </div>
            <hr class="my-4 border-secondary">
            <div class="text-center text-white-50">
                <small>&copy; 2025 PT Sintaks Media Solusindo. All rights reserved.</small>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script>
        window.addEventListener('scroll', function() {
            var navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>

</html>
