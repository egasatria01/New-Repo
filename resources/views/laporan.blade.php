@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
<div class="container-fluid">
</div>
@stop

@section('content')
<div class="container-fluid">
        <div class="col-12 border">
            <div class="form-group">
                <div class="bg-primary p-2 mb-3 text-center">
                    <label for="penulis">Laporan Pasien</label>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="modal-footer">
                            <a href="{{ route('admin.print.pasien')}}" target="_blank" class="btn btn-outline-primary w-100"><i class="fa fa-print"></i>Cetak PDF</a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="modal-footer">
                            <a href="{{ route('admin.pasien.export')}}" target="_blank" class="btn btn-outline-primary w-100">Export</a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-warning w-100" data-toggle="modal" data-target="#importDataPasien">Import</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Import Data FORM -->
<div class="modal fade" id="importDataPasien" tabindex="-1" aria-labelledby="exampleModallabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-tittle" id="exampleModalLabel">Import Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.laporan.import') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="cover">Upload File</label>
                        <input type="file" class="form-control" name="file"/>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Import Data</button>            
                </form>
            </div>
        </div>
    </div>
</div>

<br>
<br>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-4 border">
            <div class="form-group">
                <div class="bg-danger p-2 mb-3 text-center">
                    <label for="penulis">Laporan kamar</label>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-danger w-100">Pilih</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 border">
            <div class="form-group">
                <div class="bg-danger p-2 mb-3 text-center">
                    <label for="penulis">Laporan Spesialis</label>
                </div>
                <div class="row">
                    </div>
                    <div class="col-6">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-danger w-100">Pilih</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
@endsection
