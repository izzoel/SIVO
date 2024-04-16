@foreach ($padats as $padat)
    <div class="modal fade modal-cair" id="put_padat{{ $padat->id }}" tabindex="-1">
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
                    <input type="hidden" name="tab">

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm" ">Simpan</button>

                </div>
            </form>
        </div>
    </div>
</div>
</div>
 @endforeach
