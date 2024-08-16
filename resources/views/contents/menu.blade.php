<!DOCTYPE html>
<html lang="en">

@include('scripts.script_header')

@include('layouts.header')

<body>
    <div id="preloader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <main id="main">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="ms-2 collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu-cair') }}">
                            <span class="p-2 pr-4 pl-4 rounded" style="{{ $title == 'cair' ? 'background-color:#0d6efd;color:#FFFFFF;' : 'color: #0d6efd !important;' }}"
                                onmouseover="this.style.backgroundColor='#0d6efd';this.style.color='#FFFFFF';"
                                onmouseout="{{ $title == 'cair' ? 'this.style.backgroundColor="#0d6efd";this.style.color="#FFFFFF";' : 'this.style.backgroundColor="transparent";this.style.color="#0d6efd"; this.style.border="none";' }}">
                                Bahan Cair
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu-padat') }}">
                            <span class="p-2 pr-4 pl-4 rounded" style="{{ $title == 'padat' ? 'background-color:#0d6efd;color:#FFFFFF;' : 'color: #0d6efd !important;' }}"
                                onmouseover="this.style.backgroundColor='#0d6efd';this.style.color='#FFFFFF';"
                                onmouseout="{{ $title == 'padat' ? 'this.style.backgroundColor="#0d6efd";this.style.color="#FFFFFF";' : 'this.style.backgroundColor="transparent";this.style.color="#0d6efd"; this.style.border="none";' }}">
                                Bahan Padat
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu-alat') }}">
                            <span class="p-2 pr-4 pl-4 rounded" style="{{ $title == 'alat' ? 'background-color:#0d6efd;color:#FFFFFF;' : 'color: #0d6efd !important;' }}"
                                onmouseover="this.style.backgroundColor='#0d6efd';this.style.color='#FFFFFF';"
                                onmouseout="{{ $title == 'alat' ? 'this.style.backgroundColor="#0d6efd";this.style.color="#FFFFFF";' : 'this.style.backgroundColor="transparent";this.style.color="#0d6efd"; this.style.border="none";' }}">
                                Alat
                            </span>
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('menu-kerusakan') }}">
                                <span class="p-2 pr-4 pl-4 rounded" style="{{ $title == 'kerusakan' ? 'background-color:#0d6efd;color:#FFFFFF;' : 'color: #0d6efd !important;' }}"
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
                {{-- <span class="navbar-text me-3">
                    <a type="button" href="{{ route('show-setting') }}" class="btn m-0 p-0" style="font-size: 1.8rem;color:#0d6efd;" onmouseover="this.style.color='#232425';"
                        onmouseout="this.style.color='#0d6efd';">
                        <i class='bx bx-cog'></i>
                    </a>
                </span> --}}
            @endauth
        </nav>

        @if ($title == 'cair')
            @include('contents.menus.cair')
        @elseif($title == 'padat')
            @include('contents.menus.padat')
        @elseif($title == 'alat')
            @include('contents.menus.alat')

            @foreach ($alats as $alat)
                <div class="modal fade modal-alat" id="take_alat{{ $alat->id }}" tabindex="-1">
                    <div class="modal-dialog" style="width: 30%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <a class="btn btn-warning"><i class="bx bxs-donate-blood"></i><b>
                                            {{ $alat->nama }}
                                        </b></a>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="" action="{{ route('store_take', ['jenis' => $title, 'id' => $alat->id]) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="container mb-4 ps-0 pe-0">
                                        <div class="row mb-2">
                                            <div class="col">Stok</div>
                                            <div class="col-auto">:</div>
                                            <div class="col-8"><span class="badge bg-primary">{{ $alat->stok . ' ' . $alat->satuan }}</span>
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
                                                <input type="text" class="form-control take-angka" id="ambil{{ $alat->id }}" placeholder="..." required name="ambil">
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
                            <form class="submit-form" action="{{ route('store_put', ['jenis' => $title, 'id' => $alat->id]) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="container mb-4 ps-0 pe-0">
                                        <div class="row mb-2">
                                            <div class="col">Stok</div>
                                            <div class="col-auto">:</div>
                                            <div class="col-8"><span <div class="col"><span class="badge bg-primary">{{ $alat->stok . ' ' . $alat->satuan }}</span>
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
                                                <input type="text" class="form-control put-angka" id="jumlah{{ $alat->id }}" placeholder="..." required name="kembali">
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

                <div class="modal fade modal-alat" id="setting_alat{{ $alat->id }}" tabindex="-1">
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

                            <form id="form-updateAlat{{ $alat->id }}" action="{{ route('update-alat', $alat->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="modal-body">
                                    <div class="container mb-4 ms-1 me-1 p-0">
                                        <div class="row mb-2">
                                            <div class="col-2">Nama</div>
                                            <div class="col-1">:</div>
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="..." name="namaEdit" value="{{ $alat->nama }}" required>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-2">Stok</div>
                                            <div class="col-1">:</div>
                                            <div class="col">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="stok" placeholder="..." -
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');" name="stokEdit" required value="{{ $alat->stok }}">
                                                    <select class="form-select" style="border-radius: 0 4px 4px 0;" id="satuanEdit" name="satuanEdit" required>
                                                        <option value="{{ $alat->satuan }}" selected>
                                                            {{ $alat->satuan }}</option>
                                                        @foreach ($satuans->reject(fn($satuan) => $satuan->satuan == $alat->satuan) as $satuan)
                                                            <option value="{{ $satuan->satuan }}">
                                                                {{ $satuan->satuan }}
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
                                        <a class="btn btn-danger btn-sm btn-destroy" href="{{ route('destroy-alat', $alat->id) }}" id="destroyAlat{{ $alat->id }}"
                                            onclick="return confirm('Hapus data ini?')" role="button">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        <button type="submit" class="btn btn-primary btn-sm" id="updatePadat{{ $alat->id }}">Simpan</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
            {{-- @elseif($title == 'kerusakan')
            @include('contents.menus.kerusakan') --}}
            {{-- @elseif($title == 'setting')
            @include('contents.settings.setting') --}}
        @elseif($title == 'satuan')
            @include('contents.settings.satuan')
            {{-- @foreach ($satuans as $satuan)
                <div class="modal fade" id="edit_satuan{{ $satuan->id }}" tabindex="-1" data-bs-keyboard="false">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <a class="btn btn-warning">
                                        <i class='bx bx-pencil'></i><b> Edit Satuan</b>
                                    </a>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <form id="form-updateSatuan{{ $satuan->id }}" action="{{ route('update-satuan', $satuan->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="satuanEdit" class="form-label">Satuan</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="..." name="satuanEdit" value="{{ $satuan->satuan }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-sm" id="updateSatuan{{ $satuan->id }}">Simpan</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach --}}
        @elseif($title == 'lokasi')
            @include('contents.settings.lokasi')
            {{-- @foreach ($lokasis as $lokasi)
                <div class="modal fade" id="edit_lokasi{{ $lokasi->id }}" tabindex="-1" data-bs-keyboard="false">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <a class="btn btn-warning">
                                        <i class='bx bx-pencil'></i><b> Edit lokasi</b>
                                    </a>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <form id="form-updateLokasi{{ $lokasi->id }}" action="{{ route('update-lokasi', $lokasi->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="lokasiEdit" class="form-label">
                                            Lokasi
                                        </label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="..." name="lokasiEdit" value="{{ $lokasi->lokasi }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-sm" id="updateLokasi{{ $lokasi->id }}">Simpan</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach --}}
        @elseif($title == 'laboratorium')
            @include('contents.settings.laboratorium')
            {{-- @foreach ($laboratoriums as $laboratorium)
                <div class="modal fade" id="edit_laboratorium{{ $laboratorium->id }}" tabindex="-1" data-bs-keyboard="false">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <a class="btn btn-warning">
                                        <i class='bx bx-pencil'></i><b> Edit laboratorium</b>
                                    </a>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <form id="form-updateLaboratorium{{ $laboratorium->id }}" action="{{ route('update-laboratorium', $laboratorium->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="laboratoriumEdit" class="form-label">
                                            Laboratorium
                                        </label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="..." name="laboratoriumEdit" value="{{ $laboratorium->laboratorium }}"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-sm" id="updateLaboratorium{{ $laboratorium->id }}">Simpan</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach --}}

        @endif

        <div class="modal fade" id="modalTake" tabindex="-1">
            <div class="modal-dialog" style="width: 30%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><i class="bx bxs-donate-blood"></i>&nbsp;<b id="labelTakeNama"></b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="submit-form">
                        <div class="modal-body">
                            <div class="container mb-4 ps-0 pe-0">
                                <div class="row mb-2">
                                    <div class="col">Stok</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span class="badge bg-primary" id="labelTakeStok"></span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">Lokasi</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span class="badge bg-primary" id="labelTakeLokasi"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <label for="inputTake" class="form-label mb-0">Ambil</label>
                                </div>
                                <div class="col">
                                    <div class="input-group">
                                        <input type="text" class="form-control take-angka" placeholder="..." required
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="ambil" id="inputTake">
                                        <span class="input-group-text" id="labelTakeSatuan"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalPut" tabindex="-1">
            <div class="modal-dialog" style="width: 30%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-success"><i class="bx bxs-archive-in"></i>&nbsp;<b id="labelPutNama"></b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="submit-put">
                        <div class="modal-body">
                            <div class="container mb-4 ps-0 pe-0">
                                <div class="row mb-2">
                                    <div class="col">Stok</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span class="badge bg-primary" id="labelPutStok"></span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">Lokasi</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span class="badge bg-primary" id="labelPutLokasi"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <label for="inputPut" class="form-label mb-0">Setor</label>
                                </div>
                                <div class="col">
                                    <div class="input-group">
                                        <input type="text" class="form-control take-angka" placeholder="..." required
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="setor" id="inputPut">
                                        <span class="input-group-text" id="labelPutSatuan"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalSetting" tabindex="-1">
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

                    <form id="submit-setting">
                        <div class="modal-body">
                            <div class="container mb-4 ps-0 pe-0">
                                <div class="row mb-2">
                                    <div class="col">Nama</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" placeholder="..." name="namaEdit" id="labelSettingNama" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">Stok</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="stokEdit"
                                                id="labelSettingStok" required>
                                            <select class="form-select" style="border-radius: 0 4px 4px 0;" id="labelSettingSatuan" name="satuanEdit" required>
                                            </select>
                                        </div>
                                        </td>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">Lokasi</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <select class="form-select" style="border-radius: 0 4px 4px 0;" id="labelSettingLokasi" name="lokasiEdit" required>
                                            </select>
                                        </div>
                                        </td>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer d-flex">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
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

    <a href="/" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up"></i>
    </a>

    @include('layouts.footer')

    @include('scripts.script_footer')
    @include('scripts.script_datatable')
    @include('scripts.script_menu')

    @include('scripts.script_modal')

    @guest
        @include('scripts.script_button')
    @endguest

    @include('scripts.script_pencarian')

</body>

</html>
