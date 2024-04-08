<div class="modal fade" id="rekap" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <div class="row">
                        <div class="col-auto">
                            <a class="btn btn-success">
                                <i class='bx bx-spreadsheet'>
                                </i><b> Rekap</b>
                            </a>
                        </div>
                        <div class="col">
                            <span>
                                <select id="filter_bulan" class="form-select">
                                    <option value="">-- Pilih Bulan --</option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Mei">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                            </span>
                        </div>
                    </div>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">

                <table id="tabel_rekap" class="table table-striped table-bordered"
                    style="width:100%; text-align: center;">
                    <thead>
                        <tr>
                            <th style="text-align: center; vertical-align: middle;" rowspan="2">Tanggal</th>
                            {{-- <th style="text-align: center; vertical-align: middle;" rowspan="2"">Nama Mahasiswa</th> --}}
                            <th style="text-align: center; vertical-align: middle;" rowspan="2"">Nama Bahan</th>
                            <th style="text-align: center; vertical-align: middle;" rowspan="2"">Jenis</th>
                            <th style="text-align: center;" colspan="2">Jumlah</th>
                            <th style="text-align: center; vertical-align: middle;" rowspan="2"">Stok</th>
                            <th style="text-align: center; vertical-align: middle;" rowspan="2"">Keperluan</th>
                        </tr>
                        <tr>
                            <th style="text-align: center;">Ambil</th>
                            <th style="text-align: center;">Kembali</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekaps as $rekap)
                            <tr>
                                {{-- <td>{{ \Carbon\Carbon::parse($rekap->tanggal)->translatedFormat('d F Y ') }}</td> --}}
                                <td>{{ \Carbon\Carbon::parse($rekap->tanggal)->translatedFormat('F Y ') }}</td>
                                {{-- <td>{{ $rekap->mahasiswa->nama }}</td> --}}
                                <td>{{ $rekap->bahan->nama }}</td>
                                <td>{{ $rekap->bahan->jenis }}</td>
                                {{-- <td>{{ $rekap->jumlah_ambil }}</td> --}}
                                <td>{{ $rekap->ambil }}</td>
                                {{-- <td>{{ $rekap->jumlah_kembali }}</td> --}}
                                <td>{{ $rekap->kembali }}</td>
                                <td>{{ $rekap->bahan->stok }}</td>
                                <td>
                                    <span
                                        class="badge rounded-pill {{ $rekap->keperluan === 'Praktikum' ? 'bg-primary' : ($rekap->keperluan === 'Penelitian' ? 'bg-success' : 'bg-danger') }}">{{ $rekap->keperluan }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
