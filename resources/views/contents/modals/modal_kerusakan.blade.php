<div class="modal fade" id="modal_kerusakan" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <a class="btn btn-danger">
                        <i class='bx bx-hdd'></i><b> Kerusakan Alat</b>
                    </a>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="container-fluid">
                <div class="row mt-3 ps-3">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="input_kerusakan" id="import_kerusakan"
                                checked>
                            <label class="form-check-label text-dark" for="import_kerusakan">
                                Import Excel
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="input_kerusakan" id="input_kerusakan">
                            <label class="form-check-label text-dark" for="input_kerusakan">
                                Input Kerusakan
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <form id="form_import2" action="{{ route('import-kerusakan') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mt-3" id="import">
                        <input class="form-control" type="file" id="import_excel" name="excel" accept=".xlsx">
                        <div id="import_excel" class="form-text">
                            <a href="{{ asset('Template Import Kerusakan Alat.xlsx') }}"><strong>[Template Import
                                    Kerusakan.xlsx]</strong></a>
                            <br>
                            <i>
                                jika data sudah
                                ada maka akan di
                                update.
                            </i>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" id="import_button">Import</button>
                </div>
            </form>

            <form id="form-storeKerusakan" action="{{ route('store-kerusakan') }}" method="POST" style="display: none">
                @csrf
                <div class="modal-body">
                    <div class="mt-3" id="input">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Alat</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="..."
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            {{-- <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="..."> --}}
                            <select class="form-select" id="lokasi" name="lokasi" required>
                                <option value="" disabled selected>-- Pilih Lokasi --</option>
                                @foreach ($laboratoriums as $laboratorium)
                                    <option value="{{ $laboratorium->laboratorium }}">{{ $laboratorium->laboratorium }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kondisi" class="form-label">Kondisi</label>
                            <input type="text" class="form-control" id="kondisi" name="kondisi" placeholder="..."
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="status" name="status" placeholder="..."
                                required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" id="storeKerusakan">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>
