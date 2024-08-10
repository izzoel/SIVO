<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/sivo.png') }}" rel="sivo">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('vendor/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />

    <!-- Styles -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

</head>

<header id="header" style="z-index: auto">
    @if (auth()->check())
        <title>SIVO | Admin Panel</title>
    @else
        <title>SIVO | Menu</title>
    @endif
    <div class="d-flex flex-column">
        <div class="profile text-center">
            <img src="assets/avatars/{{ session('avatar') }}.png" alt=""
                class="img-fluid rounded-circle mx-auto d-block">
            <h4 class="text-light"><a>{{ $nama }}</a> <a href="{{ route('logout') }}"
                    class="btn btn-sm btn-danger"><i class="bx bx-power-off"></i></a></h4>
            <span
                class="badge rounded-pill  {{ $keperluan === 'Praktikum' ? 'bg-primary' : ($keperluan === 'Penelitian' ? 'bg-success' : 'bg-danger') }}">{{ $keperluan }}</span>
        </div>
    </div>
    <div class="row pe-4 pt-4">
        <div class="col-md-3">
            <div href="#hero" class="text-white p-3 pb-1" disabled><span>NIM</span></div>
        </div>
        <div class="col-md-1">
            <div class="text-white p-3 pb-1" disabled><span>:</span></div>
        </div>
        <div class="col-md-auto">
            <div class="text-white p-3 pb-1" disabled> <span class="badge rounded-pill"
                    style="background-color: chocolate">{{ session('nim') }}</span></div>
        </div>
    </div>
    <div class="row pe-4 pb-4">
        <div class="col-md-3">
            <div href="#hero" class="text-white p-3" disabled><span>Prodi</span></div>
        </div>
        <div class="col-md-1">
            <div class="text-white p-3" disabled><span>:</span></div>
        </div>
        <div class="col-md-auto">
            <div class="text-white p-3" disabled><span
                    class="badge rounded-pill bg-success">{{ session('prodi') }}</span></div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">

            <div class="btn-group btn-group-sm" role="group">
                <span class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modal_history"><i
                        class='bx bx-history'></i><b> History</b></span>
                @auth
                    <span class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modal_rekap"><i
                            class='bx bx-spreadsheet'></i><b> Rekap</b></span>
                    <span class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_bahan"><i
                            class='bx bxs-vial'></i><b> Bahan</b></span>
                @endauth
            </div>

        </div>
        <div class="card-body">

            <div class="row" style="overflow-y: auto; max-height: 120px;" id="list-history">
                @php($historyMap = [])
                @foreach ($historys->sortByDesc('tanggal') as $history)
                    @if (!isset($historyMap[$history->keperluan]))
                        @php($historyMap[$history->keperluan] = true)
                        <div class="col-auto">
                            <div class="card-text text-secondary">
                                {{ \Carbon\Carbon::parse($history->tanggal)->translatedFormat('d F Y') }}
                            </div>
                        </div>
                        <div class="col">
                            <hr>
                        </div>
                        <div class="col-auto">
                            <span
                                class="badge rounded-pill  {{ $history->keperluan === 'Praktikum' ? 'bg-primary' : ($history->keperluan === 'Penelitian' ? 'bg-success' : 'bg-danger') }}">{{ $history->keperluan }}
                            </span>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </div>

</header>

<body>
    <main id="main">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="ms-4 collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="https://tracer.unbl.ac.id/"
                            style="color: black !important; text-decoration: none;">
                            <span class="p-2 pr-4 pl-4 rounded" style=" color: #0d6efd !important;"
                                onmouseover="this.style.backgroundColor='black';this.style.color='#FFFFFF';"
                                onmouseout="this.style.backgroundColor='transparent';this.style.color='#0d6efd'; this.style.border='none';">
                                Bahan Cair
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://tracer.unbl.ac.id/"
                            style="color: black !important; text-decoration: none;">
                            <span class="p-2 pr-4 pl-4 rounded" style=" color: #0d6efd !important;"
                                onmouseover="this.style.backgroundColor='black';this.style.color='#FFFFFF';"
                                onmouseout="this.style.backgroundColor='transparent';this.style.color='#0d6efd'; this.style.border='none';">
                                Bahan Padat
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://tracer.unbl.ac.id/"
                            style="color: black !important; text-decoration: none;">
                            <span class="p-2 pr-4 pl-4 rounded" style=" color: #0d6efd !important;"
                                onmouseover="this.style.backgroundColor='black';this.style.color='#FFFFFF';"
                                onmouseout="this.style.backgroundColor='transparent';this.style.color='#0d6efd'; this.style.border='none';">
                                Alat
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://tracer.unbl.ac.id/"
                            style="color: black !important; text-decoration: none;">
                            <span class="p-2 pr-4 pl-4 rounded" style=" color: #0d6efd !important;"
                                onmouseover="this.style.backgroundColor='black';this.style.color='#FFFFFF';"
                                onmouseout="this.style.backgroundColor='transparent';this.style.color='#0d6efd'; this.style.border='none';">
                                Kerusakan Alat
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <section id="about">
            <div class="container-fluid">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-cair-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-cair" type="button" role="tab">Bahan
                            Cair</button>
                        <button class=" nav-link" id="nav-padat-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-padat" type="button" role="tab"
                            aria-selected="false">Bahan&nbsp;Padat</button>
                        <button class="nav-link" id="nav-alat-tab" data-bs-toggle="tab" data-bs-target="#nav-alat"
                            type="button" role="tab">Alat</button>
                        @auth
                            <button class="nav-link" id="nav-alat-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-kerusakan" type="button" role="tab">Kerusakan Alat</button>
                        @endauth
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-cair" role="tabpanel">
                        <div class="row m-2 p-3">
                            <table id="cair" class="table table-striped table-hover table-bordered"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Bahan Cair</th>
                                        <th class="col-2">Stok</th>
                                        <th class="col-2">Lokasi</th>
                                        <th class="col-3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cairs as $cair)
                                        <tr>
                                            <td>{{ $cair->nama }}</td>
                                            <td>{{ $cair->stok . ' ml' }}</td>
                                            <td>{{ $cair->lokasi }}</td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-warning btn-sm button-padat me-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#take_cair{{ $cair->id }}"
                                                    {{ $cair->stok <= 0 ? 'disabled' : '' }}>
                                                    <i class="bx bxs-donate-blood"></i>Ambil
                                                </button>

                                                <button type="button" class="btn btn-success btn-sm button-alat"
                                                    data-item-id="{{ $cair->id }}"
                                                    data-jenis="{{ $cair->jenis }}" data-bs-toggle="modal"
                                                    data-bs-target="#put_cair{{ $cair->id }}">
                                                    <i class="bx bxs-archive-in"></i>Setor
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-padat" role="tabpanel">
                        <div class="row m-2 p-3">
                            <table id="padat" class="table table-striped table-hover table-bordered"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Bahan Padat</th>
                                        <th class="col-2">Stok</th>
                                        <th class="col-2">Lokasi</th>
                                        <th class="col-3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($padats as $padat)
                                        <tr>
                                            <td>{{ $padat->nama }}</td>
                                            <td>{{ $padat->stok . ' gr' }}</td>
                                            <td>{{ $padat->lokasi }}</td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-warning btn-sm button-padat me-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#take_padat{{ $padat->id }}"
                                                    {{ $padat->stok <= 0 ? 'disabled' : '' }}>
                                                    <i class="bx bxs-donate-blood"></i>Ambil
                                                </button>

                                                <button type="button" class="btn btn-success btn-sm button-alat"
                                                    data-item-id="{{ $padat->id }}"
                                                    data-jenis="{{ $padat->jenis }}" data-bs-toggle="modal"
                                                    data-bs-target="#put_padat{{ $padat->id }}">
                                                    <i class="bx bxs-archive-in"></i>Setor
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-alat" role="tabpanel">
                        <div class="row m-2 p-3">
                            <table id="alat" class="table table-striped table-hover table-bordered"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Alat</th>
                                        <th class="col-2">Stok</th>
                                        <th class="col-2">Lokasi</th>
                                        <th class="col-3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alats as $alat)
                                        <tr>
                                            <td>{{ $alat->nama }}</td>
                                            <td>{{ $alat->stok . ' pcs' }}</td>
                                            <td>{{ $alat->lokasi }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm button-alat me-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#take_alat{{ $alat->id }}"
                                                    {{ $alat->stok <= 0 ? 'disabled' : '' }}>
                                                    <i class="bx bxs-donate-blood"></i>Ambil
                                                </button>

                                                <button type="button" class="btn btn-success btn-sm button-alat"
                                                    data-item-id="{{ $alat->id }}"
                                                    data-jenis="{{ $alat->jenis }}" data-bs-toggle="modal"
                                                    data-bs-target="#put_alat{{ $alat->id }}">
                                                    <i class="bx bxs-archive-in"></i>Setor
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-kerusakan" role="tabpanel">
                        <div class="row m-2 p-3">
                            <table id="kerusakan" class="table table-striped table-hover table-bordered"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Alat</th>
                                        <th class="col-2">Lokasi</th>
                                        <th class="col-2">Kondisi</th>
                                        <th class="col-2">Status</th>
                                        <th class="col-3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kerusakans as $kerusakan)
                                        <tr>
                                            <td>{{ $kerusakan->nama }}</td>
                                            <td>Lab. {{ $kerusakan->lokasi }}</td>
                                            <td>{{ $kerusakan->kondisi }}</td>
                                            <td>{{ $kerusakan->status }}</td>
                                            <td>

                                                <button type="button"
                                                    class="btn btn-warning btn-sm button-kerusakan me-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#kerusakan{{ $kerusakan->id }}">
                                                    <i class='bx bx-edit-alt'></i> Edit
                                                </button>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('modals.modal_history')


    @auth
        @include('modals.modal_rekap')
        @include('modals.modal_bahan')
        @include('modals.modal_lokasi')
        @include('modals.modal_kerusakan')
    @endauth

    @foreach ($cairs as $cair)
        <div class="modal fade modal-cair" id="take_cair{{ $cair->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><b>{{ $cair->nama }} </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form class="submit-form" action="{{ route('store_take', $cair->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td><span class="badge bg-primary">{{ $cair->stok . ' ml' }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td>:</td>
                                        <td><span class="badge bg-secondary">{{ $cair->lokasi }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <label for="ambil{{ $cair->id }}">Jumlah Pengambilan</label>
                            <div class="input-group">
                                <input type="text" class="form-control take-angka" id="ambil{{ $cair->id }}"
                                    placeholder="..." required name="ambil">
                                <span class="input-group-text">ml</span>
                            </div>
                        </div>
                        <input type="hidden" name="stok" value="{{ $cair->stok }}">
                        <input type="hidden" name="lokasi" value="{{ $cair->lokasi }}">
                        <input type="hidden" name="id_bahan" value="{{ $cair->id }}">
                        <input type="hidden" name="nim" value="{{ session('nim') }}">
                        <input type="hidden" name="tanggal" value="{{ Carbon\Carbon::now() }}">
                        <input type="hidden" name="keperluan" value="{{ $keperluan }}">
                        {{-- <input type="hidden" name="ambil"> --}}
                        <input type="hidden" name="kembali" value="0">
                        <input type="hidden" name="tab">

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade modal-cair" id="put_cair{{ $cair->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><b>{{ $cair->nama }} </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form class="submit-form" action="{{ route('store_put', $cair->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td><span class="badge bg-primary">{{ $cair->stok . ' ml' }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td>:</td>
                                        <td><span class="badge bg-secondary">{{ $cair->lokasi }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <label for="jumlah{{ $cair->id }}">Jumlah Pengembalian</label>
                            <div class="input-group">
                                <input type="text" class="form-control put-angka" id="jumlah{{ $cair->id }}"
                                    placeholder="..." required name="kembali">
                                <span class="input-group-text">ml</span>
                            </div>
                        </div>
                        <input type="hidden" name="stok" value="{{ $cair->stok }}">
                        <input type="hidden" name="lokasi" value="{{ $cair->lokasi }}">
                        <input type="hidden" name="id_bahan" value="{{ $cair->id }}">
                        <input type="hidden" name="nim" value="{{ session('nim') }}">
                        <input type="hidden" name="tanggal" value="{{ Carbon\Carbon::now() }}">
                        <input type="hidden" name="keperluan" value="{{ $keperluan }}">
                        <input type="hidden" name="ambil" value="0">
                        {{-- <input type="hidden" name="kembali"> --}}
                        <input type="hidden" name="tab">

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($padats as $padat)
        <div class="modal fade modal-padat" id="take_padat{{ $padat->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><b>{{ $padat->nama }} </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form class="" action="{{ route('store_take', $padat->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td><span class="badge bg-primary">{{ $padat->stok . ' gr' }}</span></td>

                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td>:</td>
                                        <td><span class="badge bg-secondary">{{ $padat->lokasi }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <label for="ambil{{ $padat->id }}">Jumlah Pengambilan</label>
                            <div class="input-group">
                                <input type="text" class="form-control take-angka" id="ambil{{ $padat->id }}"
                                    placeholder="..." required name="ambil">
                                <span class="input-group-text">gr</span>
                            </div>
                        </div>
                        <input type="hidden" name="stok" value="{{ $padat->stok }}">
                        <input type="hidden" name="lokasi" value="{{ $padat->lokasi }}">
                        <input type="hidden" name="id_bahan" value="{{ $padat->id }}">
                        <input type="hidden" name="nim" value="{{ session('nim') }}">
                        <input type="hidden" name="tanggal" value="{{ Carbon\Carbon::now() }}">
                        <input type="hidden" name="keperluan" value="{{ $keperluan }}">
                        <input type="hidden" name="kembali" value="0">
                        <input type="hidden" name="tab">

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade modal-padat" id="put_padat{{ $padat->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><b>{{ $padat->nama }} </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form class="submit-form" action="{{ route('store_put', $padat->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td><span class="badge bg-primary">{{ $padat->stok . ' ml' }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td>:</td>
                                        <td><span class="badge bg-secondary">{{ $padat->lokasi }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <label for="jumlah{{ $padat->id }}">Jumlah Pengembalian</label>
                            <div class="input-group">
                                <input type="text" class="form-control put-angka" id="jumlah{{ $padat->id }}"
                                    placeholder="..." required name="kembali">
                                <span class="input-group-text">ml</span>
                            </div>
                        </div>
                        <input type="hidden" name="stok" value="{{ $padat->stok }}">
                        <input type="hidden" name="lokasi" value="{{ $padat->lokasi }}">
                        <input type="hidden" name="id_bahan" value="{{ $padat->id }}">
                        <input type="hidden" name="nim" value="{{ session('nim') }}">
                        <input type="hidden" name="tanggal" value="{{ Carbon\Carbon::now() }}">
                        <input type="hidden" name="keperluan" value="{{ $keperluan }}">
                        <input type="hidden" name="ambil" value="0">
                        {{-- <input type="hidden" name="kembali"> --}}
                        <input type="hidden" name="tab">

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($alats as $alat)
        <div class="modal fade modal-alat" id="take_alat{{ $alat->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><b>{{ $alat->nama }} </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form class="" action="{{ route('store_take', $alat->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td><span class="badge bg-primary">{{ $alat->stok . ' gr' }}</span></td>

                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td>:</td>
                                        <td><span class="badge bg-secondary">{{ $alat->lokasi }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <label for="ambil{{ $alat->id }}">Jumlah Pengambilan</label>
                            <div class="input-group">
                                <input type="text" class="form-control take-angka" id="ambil{{ $alat->id }}"
                                    placeholder="..." required name="ambil">
                                <span class="input-group-text">pcs</span>
                            </div>
                        </div>
                        <input type="hidden" name="stok" value="{{ $alat->stok }}">
                        <input type="hidden" name="lokasi" value="{{ $alat->lokasi }}">
                        <input type="hidden" name="id_bahan" value="{{ $alat->id }}">
                        <input type="hidden" name="nim" value="{{ session('nim') }}">
                        <input type="hidden" name="tanggal" value="{{ Carbon\Carbon::now() }}">
                        <input type="hidden" name="keperluan" value="{{ $keperluan }}">
                        <input type="hidden" name="kembali" value="0">
                        <input type="hidden" name="tab">


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade modal-cair" id="put_alat{{ $alat->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><b>{{ $alat->nama }} </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form class="submit-form" action="{{ route('store_put', $alat->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td><span class="badge bg-primary">{{ $alat->stok . ' ml' }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td>:</td>
                                        <td><span class="badge bg-secondary">{{ $alat->lokasi }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <label for="jumlah{{ $alat->id }}">Jumlah Pengembalian</label>
                            <div class="input-group">
                                <input type="text" class="form-control put-angka" id="jumlah{{ $alat->id }}"
                                    placeholder="..." required name="kembali">
                                <span class="input-group-text">pcs</span>
                            </div>
                        </div>
                        <input type="hidden" name="stok" value="{{ $alat->stok }}">
                        <input type="hidden" name="lokasi" value="{{ $alat->lokasi }}">
                        <input type="hidden" name="id_bahan" value="{{ $alat->id }}">
                        <input type="hidden" name="nim" value="{{ session('nim') }}">
                        <input type="hidden" name="tanggal" value="{{ Carbon\Carbon::now() }}">
                        <input type="hidden" name="keperluan" value="{{ $keperluan }}">
                        <input type="hidden" name="ambil" value="0">
                        <input type="hidden" name="tab">

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($kerusakans as $kerusakan)
        <div class="modal fade modal-alat" id="kerusakan{{ $kerusakan->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><b>{{ $kerusakan->nama }} </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('update-kerusakan', $kerusakan->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama Kerusakan</label>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                placeholder="..." value="{{ $kerusakan->nama }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lokasi" class="form-label">Lokasi</label>
                                            <input type="text" class="form-control" id="lokasi" name="lokasi"
                                                placeholder="..." value="{{ $kerusakan->lokasi }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="kondisi" class="form-label">Kondisi</label>
                                            <input type="text" class="form-control" id="kondisi" name="kondisi"
                                                placeholder="..." value="{{ $kerusakan->kondisi }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <input type="text" class="form-control" id="status" name="status"
                                                placeholder="..." value="{{ $kerusakan->status }}">
                                        </div>

                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" name="nim" value="{{ session('nim') }}">
                        <input type="hidden" name="tanggal" value="{{ Carbon\Carbon::now() }}">
                        <input type="hidden" name="tab">


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade modal-cair" id="put_alat{{ $alat->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><b>{{ $alat->nama }} </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form class="submit-form" action="{{ route('store_put', $alat->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td><span class="badge bg-primary">{{ $alat->stok . ' ml' }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td>:</td>
                                        <td><span class="badge bg-secondary">{{ $alat->lokasi }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <label for="jumlah{{ $alat->id }}">Jumlah Pengembalian</label>
                            <div class="input-group">
                                <input type="text" class="form-control put-angka" id="jumlah{{ $alat->id }}"
                                    placeholder="..." required name="kembali">
                                <span class="input-group-text">pcs</span>
                            </div>
                        </div>
                        <input type="hidden" name="stok" value="{{ $alat->stok }}">
                        <input type="hidden" name="lokasi" value="{{ $alat->lokasi }}">
                        <input type="hidden" name="id_bahan" value="{{ $alat->id }}">
                        <input type="hidden" name="nim" value="{{ session('nim') }}">
                        <input type="hidden" name="tanggal" value="{{ Carbon\Carbon::now() }}">
                        <input type="hidden" name="keperluan" value="{{ $keperluan }}">
                        <input type="hidden" name="ambil" value="0">
                        <input type="hidden" name="tab">

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


    <a href="/" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up"></i></a>

    <footer id="footer" style="z-index: auto">
        <div class="container">
            <div class="copyright">
                <button type="button" class="btn btn-warning">
                    <strong><span>[ Versi BETA ]</span></strong>
                </button>
                </p>
            </div>
            <div class="credits">
                Developed by <a href="https://izzoel.github.io/"
                    style="text-decoration: none; color: #d2691e;"><b>zetware</b> </a>@2024
            </div>
        </div>
    </footer>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/typed.js/typed.umd.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

    <script>
        $('#cair').DataTable({
            language: {
                "lengthMenu": "Tampilkan _MENU_ baris per halaman",
                "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
                "search": "Cari:",
            },
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "Semua"]
            ],
        });

        $('#padat').DataTable({
            language: {
                "lengthMenu": "Tampilkan _MENU_ baris per halaman",
                "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
                "search": "Cari:",
            },
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "Semua"]
            ],
        });

        $('#alat').DataTable({
            language: {
                "lengthMenu": "Tampilkan _MENU_ baris per halaman",
                "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
                "search": "Cari:",
            },
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "Semua"]
            ],
        });
        $('#kerusakan').DataTable({
            dom: 'B<"row mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row mb-2"<"col-sm-12">><"row mb-2"<"col-sm-12"t>><"row mb-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6">>',
            language: {
                "lengthMenu": "Tampilkan _MENU_ baris per halaman",
                "search": "Cari:",
                "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
            },
            buttons: [{
                text: '+ Tambah',
                title: 'Tambah',
                className: 'btn btn-sm btn-danger mb-2',
                action: function(e, dt, node, config) {
                    $('#modal_kerusakan').modal('show');
                }
            }],
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "Semua"]
            ],
        });

        $('#nav-' + "{{ session('tab') }}".toLowerCase() + '-tab').trigger('click');

        $('#tabel_history').DataTable({
            language: {
                "lengthMenu": "Tampilkan _MENU_ baris per halaman",
                "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
                "search": "Cari:",
            },
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "Semua"]
            ],
            columnDefs: [{
                targets: 0,
                orderData: [0],
                orderable: false,
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).attr('data-order', rowData[0]);
                }
            }],
            order: [
                [0, 'desc']
            ]
        });

        var rekap = $('#tabel_rekap').DataTable({
            dom: 'B<"row mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row mb-2"<"col-sm-12">><"row mb-2"<"col-sm-12"t>><"row mb-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6">>',
            language: {
                "lengthMenu": "Tampilkan _MENU_ baris per halaman",
                "search": "Cari:",
                "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ baris",
            },
            buttons: [{
                extend: 'excelHtml5',
                text: '<i class="bi bi-filetype-xlsx"></i> Excel',
                title: 'Rekap Data',
                className: 'btn btn-sm btn-warning mb-2',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            }],
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "Semua"]
            ],
        });

        $('#filter_bulan').on('change', function() {
            var month = $(this).val();
            rekap.search(month).draw();
        });

        $('#input_bahan, #import_bahan').on('change', function() {
            $('#form_import').toggle('fast');
            $('#form_submit').toggle('fast');
        });
        $('#input_kerusakan, #import_kerusakan').on('change', function() {
            $('#form_import2').toggle('fast');
            $('#form_submit2').toggle('fast');
        });

        $("#jenis").change(function() {
            var jenis = $(this).val();
            if (jenis == "Cair") {
                $("#ml").removeClass("d-none");
                $("#gr, #pcs").addClass("d-none");
            } else if (jenis == "Padat") {
                $("#gr").removeClass("d-none");
                $("#ml, #pcs").addClass("d-none");
            } else {
                $("#pcs").removeClass("d-none");
                $("#ml, #gr").addClass("d-none");
            }
        });

        function submitBahan() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            let token = $("meta[name='_token']").attr("content");
            let nama = $("#nama").val();
            let jenis = $('select[name=jenis] option').filter(':selected').val()
            let stok = $("#stok").val();
            let lokasi = $('select[name=lokasi] option').filter(':selected').val()
            data = {
                _token: token,
                nama: nama,
                jenis: jenis,
                stok: stok,
                lokasi: lokasi
            };

            $.ajax({
                url: "{{ route('store-bahan') }}",
                method: 'post',
                data: data,
                success: function(data) {
                    // alert('berhasil');
                    $('#modal_bahan').modal('hide');
                    location.reload();

                },
                error: function(data) {
                    alert('gagal');
                },
            });

        }

        function importBahan() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                enctype: 'multipart/form-data'
            });


            let token = $("meta[name='_token']").attr("content");
            let excel = $("#import_excel").val();

            data = {
                _token: token,
                excel: excel,
            };

            $.ajax({
                url: "{{ route('import-bahan') }}",
                method: 'post',
                data: data,
                success: function(data) {
                    // alert('berhasil');
                    $('#modal_bahan').modal('hide');
                    location.reload();

                },
                error: function(data) {
                    alert('gagal');
                },
            });

        }
    </script>



</body>

</html>
