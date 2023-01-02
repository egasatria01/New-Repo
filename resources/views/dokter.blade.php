@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
    <h1 class="m-0 text-dark">Data Dokter</h1>
@stop

@section('content')
    <?php
    $params_id = null;

    ?>
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-body">
                <button class="btn btn-primary" data-toggle="modal" data-target="#tambahDokterModal" id="createNewDokter">
                    <i class="fa fa-plus"> Tambah Data</i>
                </button>
                <hr>
                <table id="table-data" class="table table-bordered">
                    <thead>
                        {{-- Tambah Data Dokter --}}
                        <div class="modal fade" id="tambahDokterModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dokter</5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="dokterForm" name="dokterForm" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_dokter">Nama Dokter</label>
                                                <input type="text"class="form-control" name="data_dokter"
                                                    id="nama_dokter" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="spesialis">Spesialis</label>
                                                <select class="form-control" name="spesialis" id="spesialis">
                                                    <option value="">== Pilih ID ==</option>
                                                    <option value="">A</option>
                                                    <option value="">B</option>
                                                    <option value="">C</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jam_praktek">Jam Praktek</label>
                                                <input type="year"class="form-control" name="jam_praktek"
                                                    id="jam_praktek" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="jk">Jenis Kelamin</label>
                                                <select class="form-control" name="jk" id="jk">
                                                    <option value="">Pilih Jenis Kelamin....</option>
                                                    <option value="laki-laki">Laki - Laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                                <label for="edit-tanggal">Tanggal </label>
                                                <input type="date" class="form-control" name="tanggal" id="edit-tanggal"
                                                    required />
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </thead>
                </table>
            </div>
            <table id="table-data" class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th>ID</th>
                        <th>Nama Dokter</th>
                        <th>ID Spesialis</th>
                        <th>Jam Praktek</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php

                        $no = 1;
                    @endphp
                    @foreach ($dokter as $dokters)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $dokters->id_dokter }}</td>
                            <td>{{ $dokters->nama_dokter }}</td>
                            <td>{{ $dokters->id_spesialis }}</td>
                            <td>{{ $dokters->jam_praktek }}</td>
                            <td>{{ $dokters->jenis_kelamin_d }}</td>
                            <td>{{ $dokters->tanggal }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" id="btn-edit-dokter"
                                        class="btn btn-success editDokter-{{ $dokters->id_dokter }}"
                                        onclick="updateConfirmation('{{ $dokters->id_dokter }}')" data-toggle="modal"
                                        data-target="#editDokterModal" data-id={{ $dokters->id_dokter }}
                                        data-nama_dokter={{ $dokters->nama_dokter }}
                                        data-id_spesialis={{ $dokters->id_spesialis }}
                                        data-jam_praktek={{ $dokters->jam_praktek }}
                                        data-jenis_kelamin_d={{ $dokters->jenis_kelamin_d }}
                                        data-tanggal={{ $dokters->tanggal }}>
                                        Edit
                                    </button>
                                    <a type="button" id="btn-hapus-kamar"
                                        class="btn btn-danger hapusKamar-{{ $dokters->id_dokter }}"
                                        onclick="return confirm('Apakah Kamu yakin?')"
                                        href="{{ url('dokter/delete/' . $dokters->id_dokter) }}">
                                        Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                </tbody>
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
                                    <label for="edit-nama_dokter">Nama Dokter</label>
                                    <input type="text"class="form-control" name="edit-nama_dokter"
                                        id="edit-nama_dokter" required />
                                </div>
                                <div class="form-group">
                                    <label for="edit-spesialis">Spesialis</label>
                                    <select name="edit-spesialis" class="form-control" id="edit-spesialis">
                                        <option value="">== Pilih ID ==</option>
                                        <option value="">A</option>
                                        <option value="">B</option>
                                        <option value="">C</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="edit-jam_praktek">Jam Praktek</label>
                                    <input type="year"class="form-control" name="edit-jam_praktek"
                                        id="edit-jam_praktek" required />
                                </div>
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select name="edit-jk" class="form-control" id="edit-jk">
                                        <option value="">Pilih Jenis Kelamin....</option>
                                        <option value="">Laki - Laki</option>
                                        <option value="">Perempuan</option>
                                    </select>
                                    <label for="edit-tanggal">Tanggal </label>
                                    <input type="date" class="form-control" name="tanggal" id="edit-tanggal"
                                        required />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="edit-id" />
                            <input type="hidden" name="old_cover" id="edit-old-cover" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Update</button>
                         </div>
                     @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        //create
        $(function() {})

        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#dokterForm').serialize(),
                url: "{{ route('dokter.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    $('#dokterForm').trigger("reset");
                    $('#tambahDokterModal').modal('hide');
                    table.draw();
                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        //update
        function updateConfirmation(id) {
            $("#edit-nama_dokter").val($(".editDokter-" + id).attr("data-nama_dokter"))
            $("#edit-spesialis").val($(".editDokter-" + id).attr("data-spesialis"))
            $("#edit-jam_praktek").val($(".editDokter-" + id).attr("data-jam_praktek"))
            $("#edit-jk").val($(".editDokter-" + id).attr("data-jk"))
            $("#edit-tanggal").val($(".editDokter-" + id).attr("data-tanggal"))
            $("#editForm").attr("action", "{{ url('dokter/') }}/" + id)
        }
    </script>
@endpush
