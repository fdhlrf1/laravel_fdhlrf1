 <!-- Modal -->
 <div class="modal fade" id="modal-tambah-rumahsakit" tabindex="-1" aria-labelledby="modal-tambah-rumahsakitLabel"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modal-tambah-rumahsakitLabel">Tambah Data</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="{{ route('rumah-sakit.store') }}" method="POST" id="tambah-rumah-sakit-form">
                     @csrf
                     <label for="nama_rumah_sakit" id="nama_rumah_sakit">Nama Rumah Sakit</label>
                     <input type="text" name="nama_rumah_sakit" class="mb-2 form-control">
                     @error('nama_rumah_sakit')
                         <p class="mt-1 mb-1 text-sm text-danger">
                             {{ $message }}
                         </p>
                     @enderror

                     <label for="alamat" id="alamat">Alamat</label>
                     <textarea name="alamat" id="" cols="5" rows="5" class="mb-2 form-control"></textarea>
                     @error('alamat')
                         <p class="mt-1 mb-1 text-sm text-danger">
                             {{ $message }}
                         </p>
                     @enderror

                     <label for="email" id="email">Email</label>
                     <input type="email" name="email" class="mb-2 form-control">
                     @error('email')
                         <p class="mt-1 mb-1 text-sm text-danger">
                             {{ $message }}
                         </p>
                     @enderror

                     <label for="telepon" id="telepon">No Telepon</label>
                     <input type="number" name="telepon" class="mb-2 form-control">
                     @error('telepon')
                         <p class="mt-1 mb-1 text-sm text-danger">
                             {{ $message }}
                         </p>
                     @enderror
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                 <button type="submit" name="submit" class="btn btn-primary"
                     form="tambah-rumah-sakit-form">Simpan</button>
             </div>

         </div>
     </div>
 </div>
