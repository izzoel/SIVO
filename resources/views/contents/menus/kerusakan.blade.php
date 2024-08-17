<div class="mt-2 container ">
    <table id="kerusakan" class="table table-striped table-hover table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nama Alat</th>
                <th class="col-2">Lokasi</th>
                <th class="col-2">Kondisi</th>
                <th class="col-2">Status</th>
                <th class="col-3 text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kerusakans as $kerusakan)
                <tr>
                    <td>{{ $kerusakan->nama }}</td>
                    <td>Lab. {{ $kerusakan->lokasi }}</td>
                    <td>{{ $kerusakan->kondisi }}</td>
                    <td>{{ $kerusakan->status }}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm button-kerusakan me-3" data-bs-toggle="modal" data-bs-target="#updateKerusakan{{ $kerusakan->id }}">
                            <i class='bx bx-edit-alt'></i> Edit
                        </button>

                        <a class="btn btn-danger btn-sm btn-destroy hapusKerusakan" data-id="{{ $kerusakan->id }}" id="destroyButton" role="button">
                            <i class="bx bx-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    @foreach ($kerusakans as $kerusakan)
        <div class="modal fade modal-alat" id="updateKerusakan{{ $kerusakan->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><b>{{ $kerusakan->nama }} </b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="form-updateKerusakan{{ $kerusakan->id }}" action="{{ route('update-kerusakan', $kerusakan->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama Kerusakan</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="..." value="{{ $kerusakan->nama }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lokasi" class="form-label">Lokasi</label>
                                            <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="..." value="{{ $kerusakan->lokasi }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="kondisi" class="form-label">Kondisi</label>
                                            <input type="text" class="form-control" id="kondisi" name="kondisi" placeholder="..." value="{{ $kerusakan->kondisi }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <input type="text" class="form-control" id="status" name="status" placeholder="..." value="{{ $kerusakan->status }}">
                                        </div>

                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" name="nim" value="{{ session('nim') }}">
                        <input type="hidden" name="tanggal" value="{{ Carbon\Carbon::now() }}">
                        <input type="hidden" name="cari" id="cari">
                        <input type="hidden" name="tab">


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm" id="updateKerusakan{{ $kerusakan->id }}">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
