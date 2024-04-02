<div class="modal fade" id="history" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <a class="btn btn-warning"><b>History</b></a>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table id="tabel_history" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Bahan</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                            <th>Keperluan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($historys as $history)
                            <tr>
                                <td>{{ $history->tanggal_ambil }}</td>
                                <td>
                                    {{ $history->bahan->nama }}
                                </td>
                                <td>{{ $history->bahan->jenis }}</td>
                                <td>{{ $history->jumlah_ambil }}</td>
                                <td>{{ $history->keperluan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
