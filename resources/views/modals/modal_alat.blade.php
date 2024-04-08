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
                                placeholder="..." required>
                            <span class="input-group-text">pcs</span>
                        </div>
                    </div>
                    <input type="hidden" name="stok" value="{{ $alat->stok }}">
                    <input type="hidden" name="lokasi" value="{{ $alat->lokasi }}">
                    <input type="hidden" name="id_bahan">
                    <input type="hidden" name="nim" value="{{ session('nim') }}">
                    <input type="hidden" name="tanggal" value="{{ Carbon\Carbon::now() }}">
                    <input type="hidden" name="keperluan" value="{{ $keperluan }}">
                    <input type="hidden" name="ambil">
                    <input type="hidden" name="kembali" value="0">
                    <input type="hidden" name="tab">


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm" ">Simpan</button>
                        {{-- <button type="button" class="btn btn-primary btn-sm" onclick="submitForm()">Simpan</button> --}}
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
                <form class="submit-form"
                    action="{{ route('store_put', $alat->id) }}"
                    method="POST">
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
                                placeholder="..." required>
                            <span class="input-group-text">pcs</span>
                        </div>
                    </div>
                    <input type="hidden" name="stok" value="{{ $alat->stok }}">
                    <input type="hidden" name="lokasi" value="{{ $alat->lokasi }}">
                    <input type="hidden" name="id_bahan">
                    <input type="hidden" name="nim" value="{{ session('nim') }}">
                    <input type="hidden" name="tanggal" value="{{ Carbon\Carbon::now() }}">
                    <input type="hidden" name="keperluan" value="{{ $keperluan }}">
                    <input type="hidden" name="ambil">
                    <input type="hidden" name="kembali">
                    <input type="hidden" name="tab">

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm" ">Simpan</button>
                        {{-- <button type="button" class="btn btn-primary btn-sm" onclick="submitForm()">Simpan</button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
