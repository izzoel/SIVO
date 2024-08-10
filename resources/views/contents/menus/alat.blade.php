<div class="container ">
    <table id="alat" class="table table-striped table-hover table-bordered" style="width:100%">
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
                        <button type="button" class="btn btn-warning btn-sm button-alat me-3" data-bs-toggle="modal"
                            data-bs-target="#take_alat{{ $alat->id }}" {{ $alat->stok <= 0 ? 'disabled' : '' }}>
                            <i class="bx bxs-donate-blood"></i>Ambil
                        </button>

                        <button type="button" class="btn btn-success btn-sm button-alat"
                            data-item-id="{{ $alat->id }}" data-jenis="{{ $alat->jenis }}" data-bs-toggle="modal"
                            data-bs-target="#put_alat{{ $alat->id }}">
                            <i class="bx bxs-archive-in"></i>Setor
                        </button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>


    @foreach ($alats as $alat)
        <div class="modal fade modal-alat" id="take_alat{{ $alat->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><b>{{ $alat->nama }} </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <input type="hidden" name="cari" id="cari">
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
