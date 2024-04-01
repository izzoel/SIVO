@foreach ($dcair as $m)
    <div class="modal fade modal-cair" id="cair{{ $m->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <a class="btn btn-warning"><b>{{ $m->nama }} </b></a>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="takeForm"
                    action="{{ auth()->check() ? route('admin_take', ['id' => $m->id]) : route('take', $m->id) }}"
                    method="POST">
                    @csrf
                    <div class="modal-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Stok</td>
                                    <td>:</td>
                                    <td><span class="badge bg-primary">{{ $m->stok . ' ml' }}</span></td>
                                    <input type="hidden" name="stok" value="{{ $m->stok }}">
                                    <input type="hidden" name="lokasi" value="{{ $m->lokasi }}">
                                    <input type="hidden" name="tab" value="cair">
                                </tr>
                                <tr>
                                    <td>Lokasi</td>
                                    <td>:</td>
                                    <td><span class="badge bg-secondary">{{ $m->lokasi }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <label for="ambil{{ $m->id }}">Jumlah Pengambilan</label>
                        <div class="input-group">
                            <input type="text" class="form-control angka" id="ambil{{ $m->id }}"
                                placeholder="..." required>
                            <span class="input-group-text">ml</span>
                        </div>
                    </div>
                    <input type="hidden" name="id_bahan">
                    <input type="hidden" name="nim" value="{{ $biodata->nim }}">
                    <input type="hidden" name="tanggal" value="{{ Carbon\Carbon::now() }}">
                    <input type="hidden" name="keperluan" value="{{ $keperluan }}">
                    <input type="hidden" name="ambil">



                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-sm" onclick="submitForm()">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- @auth
        <div class="modal fade" id="restok_cair{{ $m->id }}" tabindex="-1" aria-labelledby="modalBahanCair"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><b>{{ $m->nama }} </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('restok', '') . '/' . $m->id }}">
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
                                        <input type="hidden" name="tab" value="cair">
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

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endauth --}}
@endforeach
