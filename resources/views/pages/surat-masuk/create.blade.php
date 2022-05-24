@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between mb-4">
        <h4 class="fw-bold">Tambah Surat Masuk</h4>
    </div>
    <form action="{{ route('surat-masuk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6 mb-4 order-0">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="no_agenda">Nomor Agenda</label>
                            <input type="number" name="no_agenda" id="no_agenda" value="{{ old('no_agenda') }}" placeholder="Masukkan Nomor Agenda" class="form-control @error('no_agenda') is-invalid @enderror">
                            @error('no_agenda')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="nomor_surat">Nomor Surat</label>
                            <input type="text" name="nomor_surat" id="nomor_surat" value="{{ old('nomor_surat') }}" placeholder="Masukkan Nomor Surat" class="form-control @error('nomor_surat') is-invalid @enderror">
                            @error('nomor_surat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="tanggal_surat">Tanggal Surat</label>
                            <input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ old('tanggal_surat') }}" placeholder="Masukkan Tanggal Surat" class="form-control @error('tanggal_surat') is-invalid @enderror">
                            @error('tanggal_surat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="softcopy">Softcopy</label><br>
                            <input type="file" name="softcopy" id="softcopy" value="{{ old('softcopy') }}" placeholder="Masukkan Softcopy" class="form-control-file @error('softcopy') is-invalid @enderror">
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
                            <input type="text" name="perihal" id="perihal" value="{{ old('perihal') }}" placeholder="Masukkan Perihal" class="form-control @error('perihal') is-invalid @enderror">
                            @error('perihal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="pengirim">Pengirim</label>
                            <input type="text" name="pengirim" id="pengirim" value="{{ old('pengirim') }}" placeholder="Masukkan Pengirim" class="form-control @error('pengirim') is-invalid @enderror">
                            @error('pengirim')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="penerima">Penerima</label>
                            <input type="text" name="penerima" id="penerima" value="{{ old('penerima') }}" placeholder="Masukkan Penerima" class="form-control @error('penerima') is-invalid @enderror">
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

</div>
@endsection
