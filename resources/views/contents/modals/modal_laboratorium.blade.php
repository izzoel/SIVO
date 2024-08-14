<div class="modal fade" id="add_laboratorium" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <a class="btn btn-warning">
                        <i class='bx bx-pencil'></i><b> Tambah Laboratorium</b>
                    </a>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="form-storeLaboratorium" action="{{ route('store-laboratorium') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="laboratorium" class="form-label">
                            Laboratorium
                        </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="..." name="laboratorium" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" id="storeLaboratorium">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>
