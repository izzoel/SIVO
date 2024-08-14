<div class="modal fade" id="modal_bahan" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <a class="btn btn-primary">
                        <i class='bx bxs-vial'></i><b> Bahan</b>
                    </a>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeModal(this)"></button>
            </div>

            <div class="container-fluid">
                <div class="row mt-3 ps-3">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="input_bahan" id="import_bahan" checked>
                            <label class="form-check-label text-dark" for="import_bahan">
                                Import Excel
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="input_bahan" id="input_bahan">
                            <label class="form-check-label text-dark" for="input_bahan">
                                Input Bahan
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <form id="form_import" action="{{ route('import-bahan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mt-3" id="import">
                        <input class="form-control" type="file" id="import_excel" name="excel" accept=".xlsx">
                        <div id="import_excel" class="form-text">
                            <a href="{{ asset('Template Import Bahan.xlsx') }}"><strong>[Template Import
                                    Bahan.xlsx]</strong></a>
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

            <form id="form_submit" action="{{ route('store-bahan') }}" method="POST" style="display: none">
                @csrf
                <div class="modal-body">
                    <div class="mt-3" id="input">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Bahan</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select class="form-select" id="jenis" name="jenis" required>
                                <option value="" disabled selected>-- Pilih Jenis --</option>
                                <option value="Cair">Cair</option>
                                <option value="Padat">Padat</option>
                                <option value="Alat">Alat</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok
                                <a type="button" href="{{ route('setting-satuan') }}" class="btn btn-sm ms-0 p-0">
                                    <i class='bx bx-cog text-primary'></i>
                                </a>
                            </label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" style="width: 5rem !important" id="stok"
                                    placeholder="..." - oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                    name="stok" required>
                                <select class="form-select" style="border-radius: 0 4px 4px 0;" id="satuan"
                                    name="satuan" required>
                                    <option value="" disabled selected>...</option>
                                    @foreach ($satuans as $satuan)
                                        <option value="{{ $satuan->satuan }}">{{ $satuan->satuan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-1">
                            <label for="lokasi" class="form-label">Lokasi
                                <a type="button" href="{{ route('setting-lokasi') }}" class="btn btn-sm ms-0 p-0"><i
                                        class='bx bx-cog text-primary'></i>
                                </a>
                            </label>
                            <select class="form-select" id="lokasi" name="lokasi" required>
                                <option value="" disabled selected>-- Pilih Lokasi --</option>
                                @foreach ($lokasis as $lokasi)
                                    <option value="{{ $lokasi->lokasi }}">{{ $lokasi->lokasi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" id="submit_button">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>
