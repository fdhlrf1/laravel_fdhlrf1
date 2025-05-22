 <!-- Modal -->
 <div class="modal fade" id="modal-hapus-rumahsakit" tabindex="-1" aria-labelledby="modal-hapus-rumahsakitLabel"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modal-hapus-rumahsakitLabel">Hapus Data</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 Apakah anda yakin ingin menghapus data ini?
                 {{-- <br> <span class="font-weight-bold">{{ $rumahsakit->nama_rumah_sakit }}</span> --}}
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                 <button type="button" class="btn btn-danger" id="button-hapus">Hapus</button>
             </div>
         </div>
     </div>
 </div>
