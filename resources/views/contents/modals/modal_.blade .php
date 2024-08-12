 <div class="modal fade" id="add_satuan" tabindex="-1" data-bs-keyboard="false">
     <div class="modal-dialog modal-sm">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">
                     <a class="btn btn-warning">
                         <i class='bx bx-pencil'></i><b> Tambah Satuan</b>
                     </a>
                 </h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
             </div>

             <form action="{{ route('store-satuan') }}" method="POST">
                 @csrf
                 <div class="modal-body">
                     <div class="mb-3">
                         <label for="stok" class="form-label">
                             Nama
                         </label>
                         <div class="input-group mb-3">
                             <input type="text" class="form-control" placeholder="..." name="nama" required>
                         </div>
                     </div>
                     <div class="mb-3">
                         <label for="satuan" class="form-label">Satuan</label>
                         <div class="input-group mb-3">
                             <input type="text" class="form-control" placeholder="..." name="satuan" required>
                         </div>
                     </div>
                 </div>

                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                 </div>
             </form>

         </div>
     </div>
 </div>

 @foreach ($satuans as $satuan)
     <div class="modal fade" id="edit_satuan{{ $satuan->id }}" tabindex="-1" data-bs-keyboard="false">
         <div class="modal-dialog modal-sm">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">
                         <a class="btn btn-warning">
                             <i class='bx bx-pencil'></i><b> Edit Satuan</b>
                         </a>
                     </h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                 </div>

                 <form action="" method="POST">
                     @csrf
                     <div class="modal-body">
                         <div class="mb-3">
                             <label for="stok" class="form-label">
                                 Nama
                             </label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control" placeholder="..." name="nama"
                                     value="{{ $satuan->nama }}" required>
                             </div>
                         </div>
                         <div class="mb-3">
                             <label for="satuan" class="form-label">Satuan</label>
                             <div class="input-group mb-3">
                                 <input type="text" class="form-control" placeholder="..." name="satuan"
                                     value="{{ $satuan->satuan }}" required>
                             </div>
                         </div>
                     </div>

                     <div class="modal-footer">
                         <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                     </div>
                 </form>

             </div>
         </div>
     </div>
 @endforeach
