<div class="modal fade" id="modal_history" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <a class="btn btn-warning">
                        <i class='bx bx-history'>
                        </i><b> History</b>
                    </a>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table id="tabel_history" class="table table-striped table-bordered"
                    style="width:100%; text-align: center;">
                    <thead>
                        <tr>
                            <th style="text-align: center; vertical-align: middle;" rowspan="2">Tanggal</th>
                            @auth
                                <th style="text-align: center; vertical-align: middle;" rowspan="2">Nama</th>
                            @endauth
                            <th style="text-align: center; vertical-align: middle;" rowspan="2"">Nama Bahan</th>
                            <th style="text-align: center; vertical-align: middle;" rowspan="2"">Jenis</th>
                            <th style="text-align: center;" colspan="2">Jumlah</th>
                            <th style="text-align: center; vertical-align: middle;" rowspan="2"">Keperluan</th>
                        </tr>
                        <tr>
                            <th style="text-align: center;">Ambil</th>
                            <th style="text-align: center;">Kembali</th>
                        </tr>
                    </thead>
                    <tbody>
                        @auth
                            @foreach ($history_admins as $history)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($history->tanggal)->translatedFormat('d F Y H:i:s') }}</td>
                                    <td>
                                        {{ $history->mahasiswa->nama }}
                                    </td>
                                    <td>
                                        {{ $history->bahan->nama }}
                                    </td>
                                    <td>{{ $history->bahan->jenis }}</td>
                                    <td>{{ $history->jumlah_ambil }}</td>
                                    <td>{{ $history->jumlah_kembali }}</td>
                                    <td>
                                        <span
                                            class="badge rounded-pill  {{ $history->keperluan === 'Praktikum' ? 'bg-primary' : ($history->keperluan === 'Penelitian' ? 'bg-success' : 'bg-danger') }}">{{ $history->keperluan }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            @foreach ($historys as $history)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($history->tanggal)->translatedFormat('d F Y H:i:s') }}</td>
                                    <td>
                                        {{ $history->bahan->nama }}
                                    </td>
                                    <td>{{ $history->bahan->jenis }}</td>
                                    <td>{{ $history->jumlah_ambil }}</td>
                                    <td>{{ $history->jumlah_kembali }}</td>
                                    <td>
                                        <span
                                            class="badge rounded-pill  {{ $history->keperluan === 'Praktikum' ? 'bg-primary' : ($history->keperluan === 'Penelitian' ? 'bg-success' : 'bg-danger') }}">{{ $history->keperluan }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @endauth
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
