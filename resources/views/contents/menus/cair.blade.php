<div class="container mt-2">
    <table id="cair" class="table table-striped table-hover table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nama Bahan Cair</th>
                <th class="col-2">Stok</th>
                <th class="col-2">Lokasi</th>
                <th class="col-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cairs as $cair)
                <tr>
                    <td>{{ $cair->nama }}</td>
                    <td>{{ $cair->stok . ' ' . $cair->satuan }}</td>
                    <td>{{ $cair->lokasi }}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm button-padat me-3" data-bs-toggle="modal"
                            data-bs-target="#take_cair{{ $cair->id }}" {{ $cair->stok <= 0 ? 'disabled' : '' }}>
                            <i class="bx bxs-donate-blood"></i> Ambil
                        </button>

                        <button type="button" class="btn btn-success btn-sm button-alat me-3"
                            data-item-id="{{ $cair->id }}" data-jenis="{{ $cair->jenis }}" data-bs-toggle="modal"
                            data-bs-target="#put_cair{{ $cair->id }}">
                            <i class="bx bxs-archive-in"></i> Setor
                        </button>

                        @auth
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#setting_cair{{ $cair->id }}">
                                <i class='bx bx-cog'></i>
                            </button>
                        @endauth
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

</div>
