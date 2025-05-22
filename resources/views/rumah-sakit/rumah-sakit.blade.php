<x-layout>

    @include('rumah-sakit.modal.modal-tambah')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Data Rumah Sakit</h2>
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-tambah-rumahsakit">
                    Tambah Rumah Sakit
                </button>
                <br><br>
                <table class="table table-bordered">
                    <thead>
                        <th>Nama Rumah Sakit</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </thead>
                    @foreach ($rumahsakits as $rumahsakit)
                        @include('rumah-sakit.modal.modal-edit')
                        @include('rumah-sakit.modal.modal-hapus')
                        <tbody>
                            <tr>
                                <td>{{ $rumahsakit->nama_rumah_sakit }}</td>
                                <td>{{ $rumahsakit->alamat }}</td>
                                <td>{{ $rumahsakit->email }}</td>
                                <td>{{ $rumahsakit->telepon }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#modal-edit-rumahsakit{{ $rumahsakit->id }}">Edit</button>
                                    <button type="button" class="btn btn-danger" data-id="{{ $rumahsakit->id }}">Hapus
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>

            </div>
        </div>
    </div>

    <script>
        @if (session('success'))
            alert("{{ session('success') }}");
        @endif
    </script>

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
                token = $('[name=csrf-token]').attr('content');
                console.log(token);
                baris_yang_akan_dihapus = $(this).closest('tr');
                console.log(baris_yang_akan_dihapus);
                $('#modal-hapus-rumahsakit').modal('show');
            });

            $('#button-hapus').click(function() {
                $.ajax({
                    url: 'rumah-sakit/' + data_id,
                    type: 'DELETE',
                    beforeSend: function() {
                        $('#button-hapus').text('Menghapus...');
                    },
                    success: function(data) {
                        setTimeout(() => {
                            $('#modal-hapus-rumahsakit').modal('hide');
                            $('#button-hapus').text('Hapus');
                            location.reload();
                        }, 1000);

                        setTimeout(() => {
                            alert("Rumah Sakit berhasil dihapus");
                        }, 1000);
                    }
                });

            });
        });
    </script>

</x-layout>
