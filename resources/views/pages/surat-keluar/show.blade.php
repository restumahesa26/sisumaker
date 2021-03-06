@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <a href="{{ route('surat-keluar.index') }}" class="btn btn-warning btn-sm mr-3 mb-2">Kembali</a>
    <div class="d-flex justify-content-start mb-2">
        <h4 class="fw-bold">Data Surat Keluar - {{ $item->no_agenda }}</h4>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-4 order-0">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="no_agenda">Nomor Agenda</label>
                        <input type="number" name="no_agenda" id="no_agenda"
                            value="{{ old('no_agenda', $item->no_agenda) }}" placeholder="Masukkan Nomor Agenda"
                            class="form-control @error('no_agenda') is-invalid @enderror" readonly>
                        @error('no_agenda')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="nomor_surat">Nomor Surat</label>
                        <input type="text" name="nomor_surat" id="nomor_surat"
                            value="{{ old('nomor_surat', $item->nomor_surat) }}" placeholder="Masukkan Nomor Surat"
                            class="form-control @error('nomor_surat') is-invalid @enderror" readonly>
                        @error('nomor_surat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="tanggal_surat">Tanggal Surat</label>
                        <input type="text" name="tanggal_surat" id="tanggal_surat"
                            value="{{ old('tanggal_surat', $item->tanggal_surat) }}"
                            placeholder="Masukkan Tanggal Surat"
                            class="form-control @error('tanggal_surat') is-invalid @enderror" readonly>
                        @error('tanggal_surat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="softcopy">Softcopy</label><br>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal_softcopy"
                        > Lihat File
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4 order-0">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="perihal">Perihal</label>
                        <input type="text" name="perihal" id="perihal" value="{{ old('perihal', $item->perihal) }}"
                            placeholder="Masukkan Perihal" class="form-control @error('perihal') is-invalid @enderror"
                            readonly>
                        @error('perihal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="pengirim">Pengirim</label>
                        <input type="text" name="pengirim" id="pengirim" value="{{ old('pengirim', $item->pengirim) }}"
                            placeholder="Masukkan Pengirim" class="form-control @error('pengirim') is-invalid @enderror"
                            readonly>
                        @error('pengirim')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="penerima">Penerima</label>
                        <input type="text" name="penerima" id="penerima" value="{{ old('penerima', $item->penerima) }}"
                            placeholder="Masukkan Penerima" class="form-control @error('penerima') is-invalid @enderror"
                            readonly>
                        @error('penerima')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_softcopy" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">File Softcopy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/file-surat/surat-keluar/'.$item->softcopy) }}" width="100%" height="550px">
                </embed>
            </div>
        </div>
    </div>
</div>
@if(session()->has('success'))
    <div class="bs-toast toast toast-placement-ex m-2 fade show bg-primary top-0 end-0 hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header top-0 end-0">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Berhasil</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ session()->get('success') }}
        </div>
    </div>
@endif
@endsection
