<!DOCTYPE html>
<html lang="en">

@include('scripts.script_header')

@include('layouts.header')

<body>
    <main id="main">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="ms-2 collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu-cair') }}">
                            <span class="p-2 pr-4 pl-4 rounded"
                                style="{{ $title == 'cair' ? 'background-color:#0d6efd;color:#FFFFFF;' : 'color: #0d6efd !important;' }}"
                                onmouseover="this.style.backgroundColor='#0d6efd';this.style.color='#FFFFFF';"
                                onmouseout="{{ $title == 'cair' ? 'this.style.backgroundColor="#0d6efd";this.style.color="#FFFFFF";' : 'this.style.backgroundColor="transparent";this.style.color="#0d6efd"; this.style.border="none";' }}">
                                Bahan Cair
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu-padat') }}">
                            <span class="p-2 pr-4 pl-4 rounded"
                                style="{{ $title == 'padat' ? 'background-color:#0d6efd;color:#FFFFFF;' : 'color: #0d6efd !important;' }}"
                                onmouseover="this.style.backgroundColor='#0d6efd';this.style.color='#FFFFFF';"
                                onmouseout="{{ $title == 'padat' ? 'this.style.backgroundColor="#0d6efd";this.style.color="#FFFFFF";' : 'this.style.backgroundColor="transparent";this.style.color="#0d6efd"; this.style.border="none";' }}">
                                Bahan Padat
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu-alat') }}">
                            <span class="p-2 pr-4 pl-4 rounded"
                                style="{{ $title == 'alat' ? 'background-color:#0d6efd;color:#FFFFFF;' : 'color: #0d6efd !important;' }}"
                                onmouseover="this.style.backgroundColor='#0d6efd';this.style.color='#FFFFFF';"
                                onmouseout="{{ $title == 'alat' ? 'this.style.backgroundColor="#0d6efd";this.style.color="#FFFFFF";' : 'this.style.backgroundColor="transparent";this.style.color="#0d6efd"; this.style.border="none";' }}">
                                Alat
                            </span>
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('menu-kerusakan') }}">
                                <span class="p-2 pr-4 pl-4 rounded"
                                    style="{{ $title == 'kerusakan' ? 'background-color:#0d6efd;color:#FFFFFF;' : 'color: #0d6efd !important;' }}"
                                    onmouseover="this.style.backgroundColor='#0d6efd';this.style.color='#FFFFFF';"
                                    onmouseout="{{ $title == 'kerusakan' ? 'this.style.backgroundColor="#0d6efd";this.style.color="#FFFFFF";' : 'this.style.backgroundColor="transparent";this.style.color="#0d6efd"; this.style.border="none";' }}">
                                    Kerusakan Alat
                                </span>
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
            @auth
                <span class="navbar-text me-3">
                    <a type="button" href="{{ route('show-setting') }}" class="btn m-0 p-0"
                        style="font-size: 1.8rem;color:#0d6efd;" onmouseover="this.style.color='#232425';"
                        onmouseout="this.style.color='#0d6efd';">
                        <i class='bx bx-cog'></i>
                    </a>
                </span>
            @endauth
        </nav>

        @if ($title == 'cair')
            @include('contents.menus.cair')
        @elseif($title == 'padat')
            @include('contents.menus.padat')
        @elseif($title == 'alat')
            @include('contents.menus.alat')
        @elseif($title == 'kerusakan')
            @include('contents.menus.kerusakan')
        @elseif($title == 'setting')
            @include('contents.settings.setting')
        @elseif($title == 'satuan')
            @include('contents.settings.satuan')
        @elseif($title == 'lokasi')
            @include('contents.settings.lokasi')
        @elseif($title == 'laboratorium')
            @include('contents.settings.laboratorium')
        @endif

        {{-- <a name="swal" id="swal" class="btn btn-primary" href="#" role="button">swal</a> --}}
    </main>
    @include('contents.modals.modal_history')
    @auth
        @include('contents.modals.modal_rekap')
        @include('contents.modals.modal_bahan')
        @include('contents.modals.modal_kerusakan')
        @include('contents.modals.modal_satuan')
        @include('contents.modals.modal_lokasi')
        @include('contents.modals.modal_laboratorium')
    @endauth



    <a href="/" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up"></i></a>



    @include('layouts.footer')

    @include('scripts.script_footer')
    @include('scripts.script_datatable')
    @include('scripts.script_menu')

    @foreach ($cairs as $cair)
        <div class="modal fade modal-cair" id="take_cair{{ $cair->id }}" tabindex="-1">
            <div class="modal-dialog" style="width: 30%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><i class="bx bxs-donate-blood"></i><b> {{ $cair->nama }}
                                </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="" action="{{ route('store_take', ['jenis' => $title, 'id' => $cair->id]) }}"
                        method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="container mb-4 ps-0 pe-0">
                                <div class="row mb-2">
                                    <div class="col">Stok</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span
                                            class="badge bg-primary">{{ $cair->stok . ' ' . $cair->satuan }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">Lokasi</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span class="badge bg-primary">{{ $cair->lokasi }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Jumlah Pengambilan
                                    <div class="input-group">
                                        <input type="text" class="form-control take-angka"
                                            id="ambil{{ $cair->id }}" placeholder="..." required name="ambil">
                                        <span class="input-group-text">{{ $cair->satuan }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="stok" value="{{ $cair->stok }}">
                        <input type="hidden" name="lokasi" value="{{ $cair->lokasi }}">
                        <input type="hidden" name="id_bahan" value="{{ $cair->id }}">
                        <input type="hidden" name="nim" value="{{ session('nim') }}">
                        <input type="hidden" name="tanggal" value="{{ Carbon\Carbon::now() }}">
                        <input type="hidden" name="keperluan" value="{{ $keperluan }}">
                        <input type="hidden" name="kembali" value="0">
                        <input type="hidden" name="cari" id="cari">
                        <input type="hidden" name="tab">

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade modal-cair" id="put_cair{{ $cair->id }}" tabindex="-1">
            <div class="modal-dialog" style="width: 30%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><i class="bx bxs-archive-in"></i><b> {{ $cair->nama }}
                                </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form class="submit-form"
                        action="{{ route('store_put', ['jenis' => $title, 'id' => $cair->id]) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="container mb-4 ps-0 pe-0">
                                <div class="row mb-2">
                                    <div class="col">Stok</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span
                                            class="badge bg-primary">{{ $cair->stok . ' ' . $cair->satuan }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">Lokasi</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span class="badge bg-primary">{{ $cair->lokasi }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Jumlah Pengembalian
                                    <div class="input-group">
                                        <input type="text" class="form-control put-angka"
                                            id="jumlah{{ $cair->id }}" placeholder="..." required
                                            name="kembali">
                                        <span class="input-group-text">{{ $cair->satuan }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="stok" value="{{ $cair->stok }}">
                        <input type="hidden" name="lokasi" value="{{ $cair->lokasi }}">
                        <input type="hidden" name="id_bahan" value="{{ $cair->id }}">
                        <input type="hidden" name="nim" value="{{ session('nim') }}">
                        <input type="hidden" name="tanggal" value="{{ Carbon\Carbon::now() }}">
                        <input type="hidden" name="keperluan" value="{{ $keperluan }}">
                        <input type="hidden" name="ambil" value="0">
                        <input type="hidden" name="cari" id="cari">
                        <input type="hidden" name="tab">

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="setting_cair{{ $cair->id }}" tabindex="-1">
            <div class="modal-dialog" style="width: 30%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-secondary">
                                <i class='bx bx-cog'></i><b> Edit</b>
                            </a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form id="form-updateCair{{ $cair->id }}" action="{{ route('update-cair', $cair->id) }}"
                        method="POST">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="container mb-4 ms-1 me-1 p-0">
                                <div class="row mb-2">
                                    <div class="col-2">Nama</div>
                                    <div class="col-1">:</div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="..." name="namaEdit"
                                            value="{{ $cair->nama }}" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-2">Stok</div>
                                    <div class="col-1">:</div>
                                    <div class="col">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="stok"
                                                placeholder="..." -
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                                name="stokEdit" required value="{{ $cair->stok }}">
                                            <select class="form-select" style="border-radius: 0 4px 4px 0;"
                                                id="satuanEdit" name="satuanEdit" required>
                                                <option value="{{ $cair->satuan }}" selected>
                                                    {{ $cair->satuan }}</option>
                                                @foreach ($satuans->reject(fn($satuan) => $satuan->satuan == $cair->satuan) as $satuan)
                                                    <option value="{{ $satuan->satuan }}">{{ $satuan->satuan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </td>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-2">Lokasi</div>
                                    <div class="col-1">:</div>
                                    <div class="col">
                                        <select class="form-select" id="lokasi" name="lokasiEdit" required>
                                            <option value="{{ $cair->lokasi }}" selected>
                                                {{ $cair->lokasi }}</option>
                                            @foreach ($lokasis->reject(fn($lokasi) => $lokasi->lokasi == $cair->lokasi) as $lokasi)
                                                <option value="{{ $lokasi->lokasi }}">
                                                    {{ $lokasi->lokasi }}
                                                </option>
                                            @endforeach
                                        </select>
                                        </td>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="modal-footer d-flex">
                            <div class="me-auto p-2">
                                <a class="btn btn-danger btn-sm" href="{{ route('destroy-cair', $cair->id) }}"
                                    id="destroyCair{{ $cair->id }}" role="button">
                                    <i class="bx bx-trash"></i>
                                </a>
                            </div>
                            <div class="p-2">
                                <button type="submit" class="btn btn-primary btn-sm"
                                    id="updateCair{{ $cair->id }}">Simpan</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        @include('scripts.script_cair')
    @endforeach

    @foreach ($padats as $padat)
        <div class="modal fade modal-padat" id="take_padat{{ $padat->id }}" tabindex="-1">
            <div class="modal-dialog" style="width: 30%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><i class="bx bxs-donate-blood"></i><b> {{ $padat->nama }}
                                </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form class="" action="{{ route('store_take', ['jenis' => $title, 'id' => $padat->id]) }}"
                        method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="container mb-4 ps-0 pe-0">
                                <div class="row mb-2">
                                    <div class="col">Stok</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span
                                            class="badge bg-primary">{{ $padat->stok . ' ' . $padat->satuan }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">Lokasi</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span class="badge bg-primary">{{ $padat->lokasi }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Jumlah Pengambilan
                                    <div class="input-group">
                                        <input type="text" class="form-control take-angka"
                                            id="ambil{{ $padat->id }}" placeholder="..." required name="ambil">
                                        <span class="input-group-text">{{ $padat->satuan }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="stok" value="{{ $padat->stok }}">
                        <input type="hidden" name="lokasi" value="{{ $padat->lokasi }}">
                        <input type="hidden" name="id_bahan" value="{{ $padat->id }}">
                        <input type="hidden" name="nim" value="{{ session('nim') }}">
                        <input type="hidden" name="tanggal" value="{{ Carbon\Carbon::now() }}">
                        <input type="hidden" name="keperluan" value="{{ $keperluan }}">
                        <input type="hidden" name="kembali" value="0">
                        <input type="hidden" name="cari" id="cari">
                        <input type="hidden" name="tab">

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade modal-padat" id="put_padat{{ $padat->id }}" tabindex="-1">
            <div class="modal-dialog" style="width: 30%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-success"> <i class="bx bxs-archive-in"></i><b> {{ $padat->nama }}
                                </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form class="submit-form"
                        action="{{ route('store_put', ['jenis' => $title, 'id' => $padat->id]) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="container mb-4 ps-0 pe-0">
                                <div class="row mb-2">
                                    <div class="col">Stok</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span
                                            class="badge bg-primary">{{ $padat->stok . ' ' . $padat->satuan }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">Lokasi</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span class="badge bg-primary">{{ $padat->lokasi }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Jumlah Pengembalian
                                    <div class="input-group">
                                        <input type="text" class="form-control put-angka"
                                            id="jumlah{{ $padat->id }}" placeholder="..." required
                                            name="kembali">
                                        <span class="input-group-text">{{ $padat->satuan }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="stok" value="{{ $padat->stok }}">
                        <input type="hidden" name="lokasi" value="{{ $padat->lokasi }}">
                        <input type="hidden" name="id_bahan" value="{{ $padat->id }}">
                        <input type="hidden" name="nim" value="{{ session('nim') }}">
                        <input type="hidden" name="tanggal" value="{{ Carbon\Carbon::now() }}">
                        <input type="hidden" name="keperluan" value="{{ $keperluan }}">
                        <input type="hidden" name="ambil" value="0">
                        <input type="hidden" name="cari" id="cari">
                        <input type="hidden" name="tab">

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="setting_padat{{ $padat->id }}" tabindex="-1">
            <div class="modal-dialog" style="width: 30%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-secondary">
                                <i class='bx bx-cog'></i><b> Edit</b>
                            </a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form id="form-updatePadat{{ $padat->id }}" action="{{ route('update-padat', $padat->id) }}"
                        method="POST">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="container mb-4 ms-1 me-1 p-0">
                                <div class="row mb-2">
                                    <div class="col-2">Nama</div>
                                    <div class="col-1">:</div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="..." name="namaEdit"
                                            value="{{ $padat->nama }}" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-2">Stok</div>
                                    <div class="col-1">:</div>
                                    <div class="col">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="stok"
                                                placeholder="..." -
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                                name="stokEdit" required value="{{ $padat->stok }}">
                                            <select class="form-select" style="border-radius: 0 4px 4px 0;"
                                                id="satuanEdit" name="satuanEdit" required>
                                                <option value="{{ $padat->satuan }}" selected>
                                                    {{ $padat->satuan }}</option>
                                                @foreach ($satuans->reject(fn($satuan) => $satuan->satuan == $padat->satuan) as $satuan)
                                                    <option value="{{ $satuan->satuan }}">{{ $satuan->satuan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </td>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-2">Lokasi</div>
                                    <div class="col-1">:</div>
                                    <div class="col">
                                        <select class="form-select" id="lokasi" name="lokasiEdit" required>
                                            <option value="{{ $padat->lokasi }}" selected>
                                                {{ $padat->lokasi }}</option>
                                            @foreach ($lokasis->reject(fn($lokasi) => $lokasi->lokasi == $padat->lokasi) as $lokasi)
                                                <option value="{{ $lokasi->lokasi }}">
                                                    {{ $lokasi->lokasi }}
                                                </option>
                                            @endforeach
                                        </select>
                                        </td>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="modal-footer d-flex">
                            <div class="me-auto p-2">
                                <a class="btn btn-danger btn-sm" href="{{ route('destroy-padat', $padat->id) }}"
                                    id="destroyPadat{{ $padat->id }}" role="button">
                                    <i class="bx bx-trash"></i>
                                </a>
                            </div>
                            <div class="p-2">
                                <button type="submit" class="btn btn-primary btn-sm"
                                    id="updatePadat{{ $padat->id }}">Simpan</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        @include('scripts.script_padat')
    @endforeach

    @foreach ($alats as $alat)
        <div class="modal fade modal-alat" id="take_alat{{ $alat->id }}" tabindex="-1">
            <div class="modal-dialog" style="width: 30%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><i class="bx bxs-donate-blood"></i><b> {{ $alat->nama }}
                                </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form class="" action="{{ route('store_take', ['jenis' => $title, 'id' => $alat->id]) }}"
                        method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="container mb-4 ps-0 pe-0">
                                <div class="row mb-2">
                                    <div class="col">Stok</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span
                                            class="badge bg-primary">{{ $alat->stok . ' ' . $alat->satuan }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">Lokasi</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span class="badge bg-primary">{{ $alat->lokasi }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Jumlah Pengambilan
                                    <div class="input-group">
                                        <input type="text" class="form-control take-angka"
                                            id="ambil{{ $alat->id }}" placeholder="..." required
                                            name="ambil">
                                        <span class="input-group-text">{{ $alat->satuan }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="stok" value="{{ $alat->stok }}">
                        <input type="hidden" name="lokasi" value="{{ $alat->lokasi }}">
                        <input type="hidden" name="id_bahan" value="{{ $alat->id }}">
                        <input type="hidden" name="nim" value="{{ session('nim') }}">
                        <input type="hidden" name="tanggal" value="{{ Carbon\Carbon::now() }}">
                        <input type="hidden" name="keperluan" value="{{ $keperluan }}">
                        <input type="hidden" name="kembali" value="0">
                        <input type="hidden" name="cari" id="cari">
                        <input type="hidden" name="tab">

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade modal-alat" id="put_alat{{ $alat->id }}" tabindex="-1">
            <div class="modal-dialog" style="width: 30%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-success">
                                <i class="bx bxs-archive-in"></i><b> {{ $alat->nama }}</b>
                            </a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form class="submit-form"
                        action="{{ route('store_put', ['jenis' => $title, 'id' => $alat->id]) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="container mb-4 ps-0 pe-0">
                                <div class="row mb-2">
                                    <div class="col">Stok</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span <div class="col"><span
                                                class="badge bg-primary">{{ $alat->stok . ' ' . $alat->satuan }}</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">Lokasi</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span class="badge bg-primary">{{ $alat->lokasi }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Jumlah Pengembalian
                                    <div class="input-group">
                                        <input type="text" class="form-control put-angka"
                                            id="jumlah{{ $alat->id }}" placeholder="..." required
                                            name="kembali">
                                        <span class="input-group-text">{{ $alat->satuan }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="stok" value="{{ $alat->stok }}">
                        <input type="hidden" name="lokasi" value="{{ $alat->lokasi }}">
                        <input type="hidden" name="id_bahan" value="{{ $alat->id }}">
                        <input type="hidden" name="nim" value="{{ session('nim') }}">
                        <input type="hidden" name="tanggal" value="{{ Carbon\Carbon::now() }}">
                        <input type="hidden" name="keperluan" value="{{ $keperluan }}">
                        <input type="hidden" name="ambil" value="0">
                        <input type="hidden" name="cari" id="cari">
                        <input type="hidden" name="tab">

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="setting_alat{{ $alat->id }}" tabindex="-1">
            <div class="modal-dialog" style="width: 30%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-secondary">
                                <i class='bx bx-cog'></i><b> Edit</b>
                            </a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form id="form-updateAlat{{ $alat->id }}" action="{{ route('update-alat', $alat->id) }}"
                        method="POST">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="container mb-4 ms-1 me-1 p-0">
                                <div class="row mb-2">
                                    <div class="col-2">Nama</div>
                                    <div class="col-1">:</div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="..." name="namaEdit"
                                            value="{{ $alat->nama }}" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-2">Stok</div>
                                    <div class="col-1">:</div>
                                    <div class="col">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="stok"
                                                placeholder="..." -
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                                name="stokEdit" required value="{{ $alat->stok }}">
                                            <select class="form-select" style="border-radius: 0 4px 4px 0;"
                                                id="satuanEdit" name="satuanEdit" required>
                                                <option value="{{ $alat->satuan }}" selected>
                                                    {{ $alat->satuan }}</option>
                                                @foreach ($satuans->reject(fn($satuan) => $satuan->satuan == $alat->satuan) as $satuan)
                                                    <option value="{{ $satuan->satuan }}">{{ $satuan->satuan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </td>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-2">Lokasi</div>
                                    <div class="col-1">:</div>
                                    <div class="col">
                                        <select class="form-select" id="lokasi" name="lokasiEdit" required>
                                            <option value="{{ $alat->lokasi }}" selected>
                                                {{ $alat->lokasi }}</option>
                                            @foreach ($lokasis->reject(fn($lokasi) => $lokasi->lokasi == $alat->lokasi) as $lokasi)
                                                <option value="{{ $lokasi->lokasi }}">
                                                    {{ $lokasi->lokasi }}
                                                </option>
                                            @endforeach
                                        </select>
                                        </td>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="modal-footer d-flex">
                            <div class="me-auto p-2">
                                <a class="btn btn-danger btn-sm" href="{{ route('destroy-alat', $alat->id) }}"
                                    id="destroyAlat{{ $alat->id }}" role="button">
                                    <i class="bx bx-trash"></i>
                                </a>
                            </div>
                            <div class="p-2">
                                <button type="submit" class="btn btn-primary btn-sm"
                                    id="updatePadat{{ $alat->id }}">Simpan</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        @include('scripts.script_alat')
    @endforeach

    @foreach ($kerusakans as $kerusakan)
        @include('scripts.script_kerusakan')
    @endforeach

    @foreach ($satuans as $satuan)
        @include('scripts.script_satuan')
    @endforeach

    @foreach ($lokasis as $lokasi)
        @include('scripts.script_lokasi')
    @endforeach

    @foreach ($laboratoriums as $laboratorium)
        @include('scripts.script_laboratorium')
    @endforeach

    @guest
        @include('scripts.script_button')
    @endguest

    @include('scripts.script_pencarian')

</body>

</html>
