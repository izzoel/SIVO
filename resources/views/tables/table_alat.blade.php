 <table id="alat" class="table table-striped table-hover table-bordered" style="width:100%">
     <thead>
         <tr>
             <th>Nama Alat</th>
             <th class="col-2">Stok</th>
             <th class="col-2">Lokasi</th>
             <th class="col-3">Aksi</th>
         </tr>
     </thead>
     <tbody>
         @foreach ($alats as $alat)
             <tr>
                 <td>{{ $alat->nama }}</td>
                 <td>{{ $alat->stok . ' ml' }}</td>
                 <td>{{ $alat->lokasi }}</td>
                 <td>
                     <button type="button" class="btn btn-warning btn-sm button-alat me-3"
                         data-item-id="{{ $alat->id }}" data-jenis="{{ $alat->jenis }}" data-bs-toggle="modal"
                         data-bs-target="#take_alat{{ $alat->id }}">
                         <i class="bx bxs-donate-blood"></i>Ambil
                     </button>

                     <button type="button" class="btn btn-success btn-sm button-alat"
                         data-item-id="{{ $alat->id }}" data-jenis="{{ $alat->jenis }}" data-bs-toggle="modal"
                         data-bs-target="#put_alat{{ $alat->id }}">
                         <i class="bx bxs-archive-in"></i>Setor
                     </button>
                 </td>
             </tr>
         @endforeach

     </tbody>
 </table>
