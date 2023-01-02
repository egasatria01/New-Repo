@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
    <h1 class="m-0 text-dark">Data Pasien</h1>
@stop

@section('content')
    <?php
    $params_id = null;

    ?>
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-body">
                <button class="btn btn-primary" data-toggle="modal" data-target="#tambahPasienModal" id="createNewPasien">
                    <i class="fa fa-plus">Tambah Data</i>
                </button>
                <hr>
                <table id="table-data" class="table table-bordered">
                    <thead>
                        {{-- Tambah Pasien --}}
                        <div class="modal fade" id="tambahPasienModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="pasienForm" name="pasienForm" method="post"
                                            enctype="multipart/form-data">
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="nama_pasien">Nama Pasien</label>
                                                    <input type="text"class="form-control" name="nama_pasien"
                                                        id="nama_pasien" required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="umur_pasien">Umur Pasien</label>
                                                    <input type="text"class="form-control" name="umur_pasien"
                                                        id="umur_pasien" required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_pasien">Tanggal lahir Pasien</label>
                                                    <input type="date"class="form-control" name="tgl_pasien"
                                                        id="tgl_pasien" required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat_pasien">Alamat</label>
                                                    <textarea type="text" class="form-control" id="alamat_pasien" name="alamat_pasien"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_tlp">No Telp Pasien</label>
                                                    <input type="text"class="form-control" name="no_tlp" id="no_tlp"
                                                        required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis_kelamin_p">Jenis Kelamin</label>
                                                    <select name="jenis_kelamin_p" class="form-control"
                                                        id="jenis_kelamin_p">
                                                        <option>Pilih Jenis Kelamin....</option>
                                                        <option value="laki-laki">Laki - Laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal lahir Pasien</label>
                                                    <input type="date"class="form-control" name="tanggal" id="tanggal"
                                                        required />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary" id="saveBtn"
                                                        value="create">Kirim</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </thead>
                </table>
                <table id="table-data" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>ID Pasien</th>
                            <th>Nama Pasien</th>
                            <th>Umur </th>
                            <th>Tanggal Lahir </th>
                            <th>Alamat</th>
                            <th>No Telp Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php

                            $no = 1;
                        @endphp
                        @foreach ($pasien as $pasiens)
                            <tr>

                                <td>{{ $pasiens->id_pasien }}</td>
                                <td>{{ $pasiens->nama_pasien }}</td>
                                <td>{{ $pasiens->umur_pasien }}</td>
                                <td>{{ $pasiens->tgl_pasien }}</td>
                                <td>{{ $pasiens->alamat_pasien }}</td>
                                <td>{{ $pasiens->no_tlp }}</td>
                                <td>{{ $pasiens->jenis_kelamin_p }}</td>
                                <td>{{ $pasiens->tanggal }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="btn-edit-buku" class="btn btn-success" data-toggle="modal"
                                            data-target="#editBukuModal">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger" onclick="deleteConfirmation('' )">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editBukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times; </span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        @method ('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit-judul">Nama</label>
                                    <input type="text" class="form-control" id="edit-judul" name="judul"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label for="edit-penulis">Umur</label>
                                    <input type="text" class="form-control" name="penulis" id="edit-penulis"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label for="edit-tahun">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tahun" id="edit-tahun"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label for="penulis">Alamat</label>
                                    <textarea type="text" class="form-control" name="description" value=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="edit-tahun">No Telp Pasien</label>
                                    <input type="text" class="form-control" name="tahun" id="edit-tahun"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Jenis Kelamin</label>
                                    <select name="province" class="form-control">
                                        <option value="">Pilih Jenis Kelamin....</option>
                                        <option value="">Laki - Laki</option>
                                        <option value="">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="edit-id" />
                            <input type="hidden" name="old_cover" id="edit-old-cover" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // create
        $(function() {})

        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#pasienForm').serialize(),
                url: "{{ route('pasien.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {

                    $('#pasienForm').trigger("reset");
                    $('#tambahPasienModal').modal('hide');
                    table.draw();

                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
            location.reload()
        });

        function updateConfirmation(id) {
            $("#edit-no_kamar").val($(".editKamar-" + id).attr("data-no_kamar"))
            $("#edit-nama_kamar").val($(".editKamar-" + id).attr("data-nama_kamar"))
            $("#edit-kelas_kamar").val($(".editKamar-" + id).attr("data-kelas_kamar"))
            $("#edit-status_kamar").val($(".editKamar-" + id).attr("data-status_kamar"))
            $("#edit-tanggal").val($(".editKamar-" + id).attr("data-tanggal"))
            $("#editForm").attr("action", "{{ url('kamar/') }}/" + id)
        }
    </script>
@endpush
