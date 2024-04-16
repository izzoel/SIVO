<div class="modal fade" id="modal_bahan" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <a class="btn btn-primary">
                        <i class='bx bxs-vial'></i><b> Bahan</b>
                    </a>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="form_bahan" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="input_bahan" id="import_bahan"
                                    checked>
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


                    <div class="mt-3" id="import">
                        {{-- <input type="text" name="id_bahan" id="">
                        <input type="file" name="excel" id=""> --}}
                        <input class="form-control" type="file" id="import_excel" name="excel" accept=".xlsx">
                        <div id="import_excel" class="form-text">
                            <a href="#"><strong>[template.xlsx]</strong></a>
                            <br>
                            <i>
                                jika data sudah
                                ada maka akan di
                                update.
                            </i>
                        </div>
                    </div>

                    <div class="mt-3" id="input" style="display: none">

                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select class="form-select" id="jenis" name="jenis">
                                <option value="" disabled selected>-- Pilih Jenis --</option>
                                <option value="Cair">Cair</option>
                                <option value="Padat">Padat</option>
                                <option value="Alat">Alat</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="stok" placeholder="..."
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                <span class="input-group-text d-none" id="gr">gr</span>
                                <span class="input-group-text d-none" id="pcs">pcs</span>
                                <span class="input-group-text" id="ml">ml</span>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="lokasi" class="form-label">Lokasi
                                <a type="button" data-bs-toggle="modal" data-bs-target="#lokasi"
                                    class="btn btn-sm ms-0 p-0 d-none">
                                    <span class="badge badge-sm small bg-primary text-white">+</span>
                                </a>
                            </label>
                            <select class="form-select" id="lokasi" name="lokasi">
                                <option value="" disabled selected>-- Pilih Lokasi --</option>
                                <option value="Rak Besi">Rak Besi</option>
                                <option value="Rak Besi + Rak Besi Stok">Rak Besi + Rak Besi Stok</option>
                                <option value="Rak Besi Stok">Rak Besi Stok</option>
                                <option value="Rak Stok (Kayu Putih)">Rak Stok (Kayu Putih)</option>
                            </select>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" onclick="store_bahan()">Simpan</button>
                    <button type="submit" class="btn btn-primary btn-sm" id="submit_import">Import</button>
                </div>
            </form>

        </div>
    </div>
</div>
