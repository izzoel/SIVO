<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIVO | Sistem Informasi Inventaris Depo</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- =======================================================
  * Template Name: iPortfolio
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    {{-- <i class="bi bi-list mobile-nav-toggle d-xl-none"></i> --}}

    <!-- ======= Header ======= -->
    {{-- <header id="header"> --}}
    {{-- <div class="d-flex flex-column">

            <div class="profile">
                <img src="assets/img/profile-img.jpg" alt="" class="img-fluid rounded-circle">
                <h1 class="text-light"><a href="index.html">Alex Smith</a></h1>
                <div class="social-links mt-3 text-center">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>

            <nav id="navbar" class="nav-menu navbar">
                <ul>
                    <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i>
                            <span>Home</span></a></li>
                    <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a>
                    </li>
                    <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i>
                            <span>Resume</span></a></li>
                    <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i>
                            <span>Portfolio</span></a></li>
                    <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i>
                            <span>Services</span></a></li>
                    <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i>
                            <span>Contact</span></a></li>
                </ul>
            </nav><!-- .nav-menu -->
        </div> --}}
    {{-- </header><!-- End Header --> --}}

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="hero-container" data-aos="fade-in">
            <h1>Sistem Informasi Inventaris Depo</h1>
            <p>Cek Persediaan <span class="typed" data-typed-items="Bahan Cair, Bahan Padat, Alat"></span></p>
            {{-- <p>Sistem <span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer"></span></p> --}}
        </div>
    </section><!-- End Hero -->

    <main id="">
        {{-- <main id="main"> --}}

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2>About</h2>
                    <p><button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#admin"><b>SIVO</b>
                        </button> merupakan sistem infomasi inventaris yang bertujuan dalam mempermudah
                        melakukan proses
                        inventarisasi barang dan pengecekan bahan.
                    </p>
                </div>

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-cair-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-cair" type="button" role="tab" aria-controls="nav-cair"
                            aria-selected="true">Bahan Cair</button>
                        <button class="nav-link" id="nav-padat-tab" data-bs-toggle="tab" data-bs-target="#nav-padat"
                            type="button" role="tab" aria-controls="nav-padat" aria-selected="false">Bahan
                            Padat</button>
                        <button class="nav-link" id="nav-alat-tab" data-bs-toggle="tab" data-bs-target="#nav-alat"
                            type="button" role="tab" aria-controls="nav-alat" aria-selected="false">Alat</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-cair" role="tabpanel"
                        aria-labelledby="nav-cair-tab">
                        <div class="row m-2 p-3" data-aos="fade-up">
                            <table id="cair" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Bahan Cair</th>
                                        <th>Stok</th>
                                        <th>Lokasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dcair as $d)
                                        <tr>
                                            <td>{{ $d->nama }}</td>
                                            <td>{{ $d->stok }} ml</td>
                                            <td>{{ $d->lokasi }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#cair{{ $d->id }}"
                                                    {{ $d->stok <= 0 ? 'disabled' : '' }}>
                                                    <i class='bx bxs-donate-blood'></i>
                                                </button>
                                                @auth
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#restok_cair{{ $d->id }}">
                                                        <i class='bx bxs-archive-in'></i>
                                                    </button>
                                                @endauth
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-padat" role="tabpanel" aria-labelledby="nav-padat-tab">
                        <div class="row m-2 p-3" data-aos="fade-up">
                            <table id="padat" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Bahan Padat</th>
                                        <th>Stok</th>
                                        <th>Lokasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dpadat as $d)
                                        <tr>
                                            <td>{{ $d->nama }}</td>
                                            <td>{{ $d->stok }} gram</td>
                                            <td>{{ $d->lokasi }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#padat{{ $d->id }}"
                                                    {{ $d->stok <= 0 ? 'disabled' : '' }}>
                                                    <i class='bx bxs-donate-blood'></i>
                                                </button>
                                                @auth
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#restok_padat{{ $d->id }}">
                                                        <i class='bx bxs-archive-in'></i>
                                                    </button>
                                                @endauth
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-alat" role="tabpanel" aria-labelledby="nav-alat-tab">
                        <div class="row m-2 p-3" data-aos="fade-up">
                            <table id="alat" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Alat</th>
                                        <th>Stok</th>
                                        <th>Lokasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dalat as $d)
                                        <tr>
                                            <td>{{ $d->nama }}</td>
                                            <td>{{ $d->stok }}</td>
                                            <td>{{ $d->lokasi }}</td>
                                            <td>
                                                <a class="btn btn-warning btn-sm" href="" role="button">
                                                    <i class='bx bxs-donate-blood'></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                {{-- 
                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <img src="assets/img/profile-img.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                        <h3>UI/UX Designer &amp; Web Developer.</h3>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </p>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>1 May
                                            1995</span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong>
                                        <span>www.example.com</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+123 456
                                            7890</span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>New York,
                                            USA</span></li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>30</span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong>
                                        <span>Master</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>PhEmailone:</strong>
                                        <span>email@example.com</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong>
                                        <span>Available</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p>
                            Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt
                            adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
                            Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus
                            itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis
                            culpa magni laudantium dolores.
                        </p>
                    </div>
                </div> --}}

            </div>
        </section><!-- End About Section -->

    </main><!-- End #main -->
    {{-- 
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>iPortfolio</span></strong>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End  Footer --> --}}

    @foreach ($dcair as $m)
        <div class="modal fade" id="cair{{ $m->id }}" tabindex="-1" aria-labelledby="modalBahanCair"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><b>{{ $m->nama }} </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('takeCair', '') . '/' . $m->id }}">
                        @csrf
                        <div class="modal-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td><span class="badge bg-primary">{{ $m->stok . ' ml' }}</span></td>
                                        <input type="hidden" name="id" value="{{ $m->id }}">
                                        <input type="hidden" name="stok" value="{{ $m->stok }}">
                                        <input type="hidden" name="lokas" value="{{ $m->stok }}">
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td>:</td>
                                        <td><span class="badge bg-secondary">{{ $m->lokasi }}</span></td>
                                    </tr>
                                </tbody>
                            </table>


                            <div class="row p-2 m-2 mt-0">
                                <label for="ambil">Jumlah Pengambilan</label>
                                <input class="form-control form-control-sm" id="ambil{{ $m->id }}"
                                    name="ambil" type="text">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @auth
            <div class="modal fade" id="restok_cair{{ $m->id }}" tabindex="-1" aria-labelledby="modalBahanCair"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <a class="btn btn-warning"><b>{{ $m->nama }} </b></a>
                            </h5>
                            {{-- <h5>Example heading <span class="badge bg-secondary">New</span></h5> --}}
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('restokCair', '') . '/' . $m->id }}">
                            @csrf
                            <div class="modal-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Stok</td>
                                            <td>:</td>
                                            <td><span class="badge bg-primary">{{ $m->stok . ' ml' }}</span></td>
                                            <input type="hidden" name="id" value="{{ $m->id }}">
                                            <input type="hidden" name="stok" value="{{ $m->stok }}">
                                        </tr>
                                        <tr>
                                            <td>Lokasi</td>
                                            <td>:</td>
                                            <td>
                                                <select class="form-select" aria-label="lokasi bahan" name="lokasi">
                                                    <option disabled>-- pilih lokasi --</option>

                                                    @foreach ($lokasi as $lok)
                                                        <option value="{{ $lok }}"
                                                            {{ $lok === $m->lokasi ? 'selected' : '' }}>
                                                            {{ $lok }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                                <div class="row p-2 m-2 mt-0">
                                    <label for="ambil">Jumlah Penambahan</label>
                                    <input class="form-control form-control-sm" id="restok{{ $m->id }}"
                                        name="restok" type="text">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    @endforeach

    @foreach ($dpadat as $n)
        <div class="modal fade" id="padat{{ $n->id }}" tabindex="-1" aria-labelledby="modalBahanCair"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><b>{{ $n->nama }} </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('takeCair', '') . '/' . $n->id }}">
                        @csrf
                        <div class="modal-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td><span class="badge bg-primary">{{ $n->stok . ' ml' }}</span></td>
                                        <input type="hidden" name="id" value="{{ $n->id }}">
                                        <input type="hidden" name="stok" value="{{ $n->stok }}">
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td>:</td>
                                        <td><span class="badge bg-secondary">{{ $n->lokasi }}</span></td>
                                    </tr>
                                </tbody>
                            </table>


                            <div class="row p-2 m-2 mt-0">
                                <label for="ambil">Jumlah Pengambilan</label>
                                <input class="form-control form-control-sm" id="ambil{{ $n->id }}"
                                    name="ambil" type="text">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @auth
            <div class="modal fade" id="restok_padat{{ $n->id }}" tabindex="-1"
                aria-labelledby="modalBahanCair" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <a class="btn btn-warning"><b>{{ $n->nama }} </b></a>
                            </h5>
                            {{-- <h5>Example heading <span class="badge bg-secondary">New</span></h5> --}}
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('restokCair', '') . '/' . $n->id }}">
                            @csrf
                            <div class="modal-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Stok</td>
                                            <td>:</td>
                                            <td><span class="badge bg-primary">{{ $n->stok . ' ml' }}</span></td>
                                            <input type="hidden" name="id" value="{{ $n->id }}">
                                            <input type="hidden" name="stok" value="{{ $n->stok }}">
                                        </tr>
                                        <tr>
                                            <td>Lokasi</td>
                                            <td>:</td>
                                            <td>
                                                <select class="form-select" aria-label="lokasi bahan" name="lokasi">
                                                    <option disabled>-- pilih lokasi --</option>

                                                    @foreach ($lokasi as $lok)
                                                        <option value="{{ $lok }}"
                                                            {{ $lok === $n->lokasi ? 'selected' : '' }}>
                                                            {{ $lok }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                                <div class="row p-2 m-2 mt-0">
                                    <label for="ambil">Jumlah Penambahan</label>
                                    <input class="form-control form-control-sm" id="restok{{ $n->id }}"
                                        name="restok" type="text">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    @endforeach



    <div class="modal fade" id="admin" tabindex="-1" aria-labelledby="modalAdmin" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                @guest


                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Login
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="login" action="{{ route('login') }}">
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    aria-describedby="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Login</button>
                        </div>
                    </form>
                @endguest
                @auth
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Login
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="login" action="{{ route('logout') }}">
                        <div class="modal-body">
                            @csrf
                            Logout dari akun Admin?
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                        </div>
                    </form>
                @endauth

            </div>
        </div>
    </div>

    <a href="/" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-repeat"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/typed.js/typed.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/table.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        new DataTable('#padat');
        new DataTable('#cair');
        new DataTable('#alat');
    </script>


    <script>
        var selectedTabId = @json($selectedTabId);
        var nameValue = @json($nameValue);

        if (selectedTabId) {
            var tab = $('#' + selectedTabId);
            var element = $('#about');
            var table = $('#cair').DataTable();
            if (tab.length) {
                tab.click();
                element[0].scrollIntoView({
                    behavior: 'smooth'
                });
                table.search(nameValue).draw();
            }
        }
    </script>





    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the selectedTabId from the PHP variable
            var selectedTabId = @json($selectedTabId);
            var nameValue = @json($nameValue);

            // alert(selectedTabId);

            // Open the tab based on the selectedTabId
            if (selectedTabId) {
                var tab = document.getElementById(selectedTabId);
                var element = document.getElementById('about');
                var table = $('#cair').DataTable();
                if (tab) {
                    tab.click(); // Assuming you have a function to handle tab clicks
                    // if (element) {
                    element.scrollIntoView({
                        behavior: 'smooth'
                    });

                    table.search(nameValue).draw();
                }
            }
        });
    </script> --}}

    {{-- <script>
        $('#login').on('submit', function(e) {
            e.preventDefault();
            routeLogin = "{{ route('login') }}";

            $.get(routeLogin, function(data) {
                if (data.nama == $('#username').val() && $('#password').val() == 'nimda') {
                    $("#login").unbind('submit');
                    Swal.fire({
                        title: 'Login Berhasil',
                        icon: 'success',
                    });
                    $("#admin").modal('hide');

                } else {
                    Swal.fire({
                        title: 'Login Gagal',
                        text: "Username atau Password Salah!",
                        icon: 'error',
                    })
                }
                // alert(data.password);
                // console.log(data.nama);
            });


            // Swal.fire({
            //     title: 'Data Tidak Ditemukan',
            //     text: "NIM/Nama tidak ditemukan",
            //     icon: 'error',
            // })


            // alert(routeLogin);

        });
    </script> --}}



</body>

</html>
