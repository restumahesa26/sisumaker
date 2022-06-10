@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <a href="{{ route('undangan.index') }}" class="btn btn-warning btn-sm mr-3 mb-2">Kembali</a>
    <div class="d-flex justify-content-between mb-2 mt-1">
        <h4 class="fw-bold">Edit Undangan - {{ $item->no_urut }}</h4>
    </div>
    <form action="{{ route('undangan.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-6 mb-4 order-0">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="no_urut">Nomor Urut</label>
                            <input type="number" name="no_urut" id="no_urut" value="{{ old('no_urut', $item->no_urut) }}" placeholder="Masukkan Nomor Urut" class="form-control @error('no_urut') is-invalid @enderror" min="1">
                            @error('no_urut')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="nomor_surat">Nomor Surat</label>
                            <input type="text" name="nomor_surat" id="nomor_surat" value="{{ old('nomor_surat', $item->nomor_surat) }}" placeholder="Masukkan Nomor Surat" class="form-control @error('nomor_surat') is-invalid @enderror">
                            @error('nomor_surat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="tanggal">Tanggal</label>
                            <input type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $item->tanggal) }}" placeholder="Masukkan Tanggal" class="form-control @error('tanggal') is-invalid @enderror">
                            @error('tanggal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="softcopy">Softcopy</label>
                            @if ($item->softcopy != NULL)
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal_softcopy">
                                Lihat File
                            </button>
                            @endif
                            <br>
                            <div class="input-group mt-2">
                                <input type="file" class="form-control @error('softcopy') is-invalid @enderror" id="softcopy" name="softcopy" />
                                <label class="input-group-text" for="softcopy">Upload</label>
                            </div>
                            @error('softcopy')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4 order-0">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <input type="text" name="perihal" id="perihal" value="{{ old('perihal', $item->perihal) }}" placeholder="Masukkan Perihal" class="form-control @error('perihal') is-invalid @enderror">
                            @error('perihal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="pengirim">Pengirim</label>
                            <input type="text" name="pengirim" id="pengirim" value="{{ old('pengirim', $item->pengirim) }}" placeholder="Masukkan Pengirim" class="form-control @error('pengirim') is-invalid @enderror">
                            @error('pengirim')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="penerima">Penerima</label>
                            <input type="text" name="penerima" id="penerima" value="{{ old('penerima', $item->penerima) }}" placeholder="Masukkan Penerima" class="form-control @error('penerima') is-invalid @enderror">
                            @error('penerima')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </div>
        </div>
    </form>
    <div class="modal fade" id="modal_softcopy" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">File Softcopy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <embed src="{{ asset('storage/file-undangan/'.$item->softcopy) }}" width="100%" height="550px">
                    </embed>
                </div>
            </div>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="bs-toast toast toast-placement-ex m-2 fade show bg-danger top-0 end-0 hide" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header top-0 end-0">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold">Kesalahan</div>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
@endsection

@push('addon-style')
    <link href="{{ url('backend/assets/vendor/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" >
@endpush

@push('addon-script')
    <script src="{{ url('backend/assets/vendor/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <script>
        $('#tanggal').keypress(function(e) {
            e.preventDefault();
        });
    </script>

    <script>
        $('#tanggal').datepicker({
            format: 'yyyy/mm/dd',
            todayBtn: 'linked',
            todayHighlight: true,
            autoclose: true,
        });
    </script>
@endpush