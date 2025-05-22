<x-layout>

    @include('pasien.modal.modal-tambah')
    @include('pasien.modal.modal-edit')
    @include('pasien.modal.modal-hapus')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Data Pasien</h2>
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="mb-2 btn btn-info" data-toggle="modal" data-target="#modal-tambah-pasien">
                    Tambah Pasien
                </button>

                <br>

                <label for="id_rumah_sakit">Filter Berdasarkan Rumah Sakit</label>
                <select name="id_rumah_sakit" id="id_rumah_sakit" class="form-control" style="width: 16rem"
                    onchange="getByRumahSakit(this.value)">
                    <option value="all">Semua</option>
                    @foreach ($rumahsakits as $rumahsakit)
                        <option value="{{ $rumahsakit->id }}">{{ $rumahsakit->nama_rumah_sakit }}</option>
                    @endforeach
                </select>
                <br>

                <div id="table-pasien">
                    <table class="table table-bordered">
                        <thead>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Lokasi Rumah Sakit</th>
                            <th>Aksi</th>
                        </thead>
                        @foreach ($pasiens as $pasien)
                            <tbody>
                                <tr>
                                    <td>{{ $pasien->nama_pasien }}</td>
                                    <td>{{ $pasien->alamat }}</td>
                                    <td>{{ $pasien->no_telepon }}</td>
                                    <td>{{ $pasien->rumahsakit->nama_rumah_sakit }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#modal-edit-pasien{{ $pasien->id }}">Edit</button>
                                        <button type="button" class="btn btn-danger"
                                            data-id="{{ $pasien->id }}">Hapus
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.btn-danger', function() {
                data_id = $(this).attr('data-id');
                console.log(data_id);
                $('#modal-hapus-pasien').modal('show');
            });

            $('#button-hapus').click(function() {
                $.ajax({
                    url: 'pasien/' + data_id,
                    type: 'DELETE',
                    beforeSend: function() {
                        $('#button-hapus').text('Menghapus...');
                    },
                    success: function(data) {
                        setTimeout(() => {
                            $('#modal-hapus-pasien').modal('hide');
                            $('#button-hapus').text('Hapus');
                            location.reload();
                        }, 1000);
                    }
                });

            });


        });

        // let filterRumahSakitId;

        function getByRumahSakit(selected_id_rumah_sakit = 'all') {
            console.log(selected_id_rumah_sakit);
            let filterRumahSakitId = $('#id_rumah_sakit');
            console.log(filterRumahSakitId);
            console.log(selected_id_rumah_sakit);
            if (selected_id_rumah_sakit != 'all') {
                $.ajax({
                    url: 'pasien/filter/' + selected_id_rumah_sakit,
                    type: 'GET',
                    data: {
                        id_rumah_sakit: selected_id_rumah_sakit
                    },
                    success: function(data) {
                        console.log(data);
                        // alert('berhasil sukses');
                        // $('#tabel-pasien').html(data);

                        let html = `
                        <table class='table table-bordered'>
                            <thead>
                                <tr>
                                    <th>Nama Pasien</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Lokasi Rumah Sakit</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                        `;

                        data.forEach(function(pasien) {
                            html += `
                            <tbody>
                                <tr>
                                    <td>${pasien.nama_pasien}</td>
                                    <td>${pasien.alamat}</td>
                                    <td>${pasien.no_telepon}</td>
                                    <td>${pasien.rumahsakit.nama_rumah_sakit}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#modal-edit-pasien${pasien.id}">Edit</button>
                                        <button type="button" class="btn btn-danger"
                                            data-id="${pasien.id}">Hapus
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            `;
                        });

                        html += `</table>`;

                        $('#table-pasien').html(html);
                    }

                });
            } else {
                $.ajax({
                    url: 'not-filter',
                    type: 'GET',
                    beforeSend: function() {
                        console.log('ajax dipangil');
                    },
                    success: function(data) {
                        // alert('ok');
                        console.log('ajax berhasil');
                        console.log(data);
                        let html = `
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th>Nama Pasien</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Lokasi Rumah Sakit</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                    `;

                        data.forEach(function(pasien) {
                            html += `
                        <tbody>
                            <tr>
                                <td>${pasien.nama_pasien}</td>
                                <td>${pasien.alamat}</td>
                                <td>${pasien.no_telepon}</td>
                                <td>${pasien.rumahsakit.nama_rumah_sakit}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#modal-edit-pasien${pasien.id}">Edit</button>
                                    <button type="button" class="btn btn-danger"
                                        data-id="${pasien.id}">Hapus
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        `;
                        });

                        html += `</table>`;

                        $('#table-pasien').html(html);
                    }
                });
            }
        }
    </script>

</x-layout>
