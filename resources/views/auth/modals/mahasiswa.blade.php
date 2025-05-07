@if (session('success'))
    @include('auth.toasts.success')
@endif


<div class="modal fade" id="M_S_mahasiswa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#nav-mahasiswa" aria-controls="nav-mahasiswa"
                                aria-selected="true">
                                <i class="tf-icons bx bx-pencil"></i> Input
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile"
                                aria-controls="navs-justified-profile" aria-selected="false">
                                <i class="tf-icons bx bx-cloud-upload"></i> Import
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-mahasiswa" role="tabpanel">
                            <form action="{{ route('mahasiswa_store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="S_nim">NIM<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="S_nim" name="nim" placeholder="4820101230000" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="S_nama">Nama<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="S_nama" name="nama" placeholder="John Doe" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="S_tempat_lahir">Tempat Lahir<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="S_tempat_lahir" name="tempat_lahir" placeholder="Banjarbaru" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="tanggal_lahir">Tanggal Lahir<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="kelamin">Jenis Kelamin<span class="text-danger">*</span></label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="kelamin" id="l" value="L" checked />
                                            <label class="form-check-label" for="l">Laki - Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="kelamin" id="p" value="P" />
                                            <label class="form-check-label" for="p">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="prodi">Program Studi<span class="text-danger">*</span></label>
                                    <select class="form-select" id="prodi" name="prodi" required>
                                        <option value="" class="text-muted" selected disabled>-- Pilih --</option>
                                        <option value="S1 FARMASI">S1 FARMASI</option>
                                        <option value="D3 FARMASI">D3 FARMASI</option>
                                        <option value="D3 ANALIS KESEHATAN">D3 ANALIS KESEHATAN</option>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                            <form id="importForm" action="{{ route('mahasiswa_import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="file" class="form-label">File Upload</label>
                                    <span class="text-muted" style="font-size: .7rem; font-style: italic"> (data yang sama akan ditimpa)</span>
                                    <input class="form-control" type="file" id="file" name="file" />
                                </div>
                                <a href="{{ asset('Template Import -- Mahasiswa.csv') }}" download="Template Import -- Mahasiswa.csv">
                                    <i class="tf-icons bx bxs-download"></i>Template <span class="badge bg-label-danger">.csv</span>
                                </a>

                                <div class="d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal modalUpdate fade" id="M_U_mahasiswa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="nav-align-top mb-4">
                    <div class="tab-pane fade show active" id="nav-mahasiswa" role="tabpanel">
                        <form id="U_route" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="U_nim">NIM<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="U_nim" name="nim" placeholder="4820101230000" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="U_nama">Nama<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="U_nama" name="nama" placeholder="John Doe" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tempat_lahir">Tempat Lahir<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="U_tempat_lahir" name="tempat_lahir" placeholder="Banjarbaru" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tanggal_lahir">Tanggal Lahir<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="U_tanggal_lahir" name="tanggal_lahir" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin<span class="text-danger">*</span></label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kelamin" id="U_l" value="L" />
                                        <label class="form-check-label" for="U_l">Laki - Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kelamin" id="U_p" value="P" />
                                        <label class="form-check-label" for="U_l">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="U_prodi">Program Studi<span class="text-danger">*</span></label>
                                <select class="form-select" id="U_prodi" name="prodi" required>
                                    <option value="S1 FARMASI">S1 FARMASI</option>
                                    <option value="D3 FARMASI">D3 FARMASI</option>
                                    <option value="D3 ANALIS KESEHATAN">D3 ANALIS KESEHATAN</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="U_hp">No HP</label>
                                <input type="text" class="form-control phone-mask" id="U_hp" name="hp" placeholder="0812 3456 7890" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="U_alamat">Alamat</label>
                                <textarea class="form-control" id="U_alamat" name="alamat" rows="3" placeholder="Jl. Raya Banjarbaru No. 1"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal modalDelete fade" id="M_D_mahasiswa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_mahasiswa">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <h4 class="text-center">
                        Yakin ingin <span class="text-danger">menghapus</span> data?
                    </h4>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-evenly">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <form id="D_route" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>

</div>
