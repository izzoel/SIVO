<div class="container ">
    <table id="padat" class="table table-striped table-hover table-bordered" style="width:100%">
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
                        <button type="button" class="btn btn-warning btn-sm button-padat me-3" data-bs-toggle="modal"
                            data-bs-target="#take_padat{{ $padat->id }}" {{ $padat->stok <= 0 ? 'disabled' : '' }}>
                            <i class="bx bxs-donate-blood"></i>Ambil
                        </button>

                        <button type="button" class="btn btn-success btn-sm button-alat"
                            data-item-id="{{ $padat->id }}" data-jenis="{{ $padat->jenis }}" data-bs-toggle="modal"
                            data-bs-target="#put_padat{{ $padat->id }}">
                            <i class="bx bxs-archive-in"></i>Setor
                        </button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    @foreach ($padats as $padat)
        <div class="modal fade modal-padat" id="take_padat{{ $padat->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><b>{{ $padat->nama }} </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
