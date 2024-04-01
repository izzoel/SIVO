<div class="modal fade" id="restok_{{ $type . $item->id }}" tabindex="-1" aria-labelledby="modalBahan{{ ucfirst($type) }}"
    aria-hidden="true">
    <div class="modal fade" id="restok_cair{{ $m->id }}" tabindex="-1" aria-labelledby="modalBahanCair"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <a class="btn btn-warning"><b>{{ $m->nama }} </b></a>
                    </h5>
                    {{-- <h5>Example heading <span class="badge bg-secondary">New</span></h5> --}}
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


                        <div class="row p-2 m-2 mt-0">
                            <label for="ambil">Jumlah Penambahan</label>
                            <input class="form-control form-control-sm" id="restok{{ $m->id }}" name="restok"
                                type="text">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
