@foreach ($padats as $padat)
    <div class="modal fade modal-padat" id="padat{{ $padat->id }}" tabindex="-1">
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
                            <input type="text" class="form-control angka" id="ambil{{ $padat->id }}"
                                placeholder="..." required>
                            <span class="input-group-text">gr</span>
                        </div>
                    </div>
                    <input type="hidden" name="stok" value="{{ $padat->stok }}">
                    <input type="hidden" name="lokasi" value="{{ $padat->lokasi }}">
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
 @endforeach
