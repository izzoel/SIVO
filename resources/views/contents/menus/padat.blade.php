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
                        <button type="button" class="btn btn-warning btn-sm ambilModal me-3" data-id="{{ $padat->id }}" {{ $padat->stok <= 0 ? 'disabled' : '' }}>
                            <i class="bx bxs-donate-blood"></i> Ambil
                        </button>

                        <button type="button" class="btn btn-success btn-sm setorModal me-3" data-id="{{ $padat->id }}">
                            <i class="bx bxs-archive-in"></i> Setor
                        </button>

                        @auth
                            <button type="button" class="btn btn-secondary btn-sm settingModal" data-id="{{ $padat->id }}">
                                <i class='bx bx-cog'></i>
                            </button>
                        @endauth
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

</div>
