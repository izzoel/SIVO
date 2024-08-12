<div class="container mt-2">
    <table id="cair" class="table table-striped table-hover table-bordered" style="width:100%">
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
                        <button type="button" class="btn btn-warning btn-sm button-padat me-3" data-bs-toggle="modal"
                            data-bs-target="#take_cair{{ $cair->id }}" {{ $cair->stok <= 0 ? 'disabled' : '' }}>
                            <i class="bx bxs-donate-blood"></i>Ambil
                        </button>

                        <button type="button" class="btn btn-success btn-sm button-alat"
                            data-item-id="{{ $cair->id }}" data-jenis="{{ $cair->jenis }}" data-bs-toggle="modal"
                            data-bs-target="#put_cair{{ $cair->id }}">
                            <i class="bx bxs-archive-in"></i>Setor
                        </button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

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
                        <input type="hidden" name="cari" id="cari">
                        <input type="hidden" name="tab">

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
