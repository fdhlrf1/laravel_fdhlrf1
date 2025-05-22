<!-- Modal -->
<div class="modal fade" id="modal-tambah-pasien" tabindex="-1" aria-labelledby="modal-tambah-pasienLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-tambah-pasienLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pasien.store') }}" method="POST" id="tambah-pasien-form">
                    @csrf
                    <label for="nama_pasien" id="nama_pasien">Nama Pasien</label>
                    <input type="text" name="nama_pasien" class="mb-2 form-control">
                    @error('nama_pasien')
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

                    <label for="no_telepon" id="no_telepon">No Telepon</label>
                    <input type="number" name="no_telepon" class="mb-2 form-control">
                    @error('no_telepon')
                        <p class="mt-1 mb-1 text-sm text-danger">
                            {{ $message }}
                        </p>
                    @enderror

                    <select name="id_rumah_sakit" id="id_rumah_sakit" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Rumah Sakit --</option>
                        @foreach ($rumahsakits as $rumahsakit)
                            <option value="{{ $rumahsakit->id }}">{{ $rumahsakit->nama_rumah_sakit }}</option>
                        @endforeach
                    </select>
                    @error('id_rumah_sakit')
                        <p class="mt-1 mb-1 text-sm text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" name="submit" class="btn btn-primary" form="tambah-pasien-form">Simpan</button>
            </div>

        </div>
    </div>
</div>
