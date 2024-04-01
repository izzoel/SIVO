<!-- Modal -->
<div class="modal fade" id="modal_biodata">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Isi Logbook</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('show-menu') }}" method="post">
                <div class="modal-body">
                    @csrf
                    {{-- <input type="file" name="file">
                    <button type="submit">Import</button> --}}

                    <div class="form-group">
                        <label for="nama" class="form-label">Nama Mahasiswa</label>
                        <select class="form-select form-control" id="data_mahasiswa" name="data_mahasiswa">
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="nama" class="form-label">Keperluan</label>
                        <select class="form-select form-control" id="keperluan" name="keperluan" required>
                            <option disabled selected value="">-- Pilih Keperluan --</option>
                            <option value="Praktikum">Praktikum</option>
                            <option value="Penelitian">Penelitian</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Lanjutkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
