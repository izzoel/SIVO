<div class="container mt-2">
    <table id="padat" class="table table-striped table-hover table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nama Bahan Padat</th>
                <th class="col-2">Stok</th>
                <th class="col-2">Lokasi</th>
                <th class="col-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($padats as $padat)
                <tr>
                    <td>{{ $padat->nama }}</td>
                    <td>{{ $padat->stok . ' ' . $padat->satuan }}</td>
                    <td>{{ $padat->lokasi }}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm button-padat me-3" data-bs-toggle="modal"
                            data-bs-target="#take_padat{{ $padat->id }}" {{ $padat->stok <= 0 ? 'disabled' : '' }}>
                            <i class="bx bxs-donate-blood"></i> Ambil
                        </button>

                        <button type="button" class="btn btn-success btn-sm button-padat me-3"
                            data-item-id="{{ $padat->id }}" data-jenis="{{ $padat->jenis }}" data-bs-toggle="modal"
                            data-bs-target="#put_padat{{ $padat->id }}">
                            <i class="bx bxs-archive-in"></i> Setor
                        </button>

                        @auth
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#setting_padat{{ $padat->id }}">
                                <i class='bx bx-cog'></i>
                            </button>
                        @endauth
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

</div>
