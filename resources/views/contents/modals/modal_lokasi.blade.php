<div class="modal fade" id="add_lokasi" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <a class="btn btn-warning">
                        <i class='bx bx-pencil'></i><b> Tambah Lokasi</b>
                    </a>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('store-lokasi') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">
                            Lokasi
                        </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="..." name="lokasi" required>
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

@foreach ($lokasis as $lokasi)
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

                <form action="{{ route('update-lokasi', $lokasi->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="lokasiEdit" class="form-label">
                                Lokasi
                            </label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="..." name="lokasiEdit"
                                    value="{{ $lokasi->lokasi }}" required>
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
@endforeach
