@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between mb-4">
        <h4 class="fw-bold">Data Surat Masuk - {{ $item->no_agenda }}</h4>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-4 order-0">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="no_agenda">Nomor Agenda</label>
                        <input type="number" name="no_agenda" id="no_agenda" value="{{ old('no_agenda', $item->no_agenda) }}" placeholder="Masukkan Nomor Agenda" class="form-control @error('no_agenda') is-invalid @enderror" readonly>
                        @error('no_agenda')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="nomor_surat">Nomor Surat</label>
                        <input type="text" name="nomor_surat" id="nomor_surat" value="{{ old('nomor_surat', $item->nomor_surat) }}" placeholder="Masukkan Nomor Surat" class="form-control @error('nomor_surat') is-invalid @enderror" readonly>
                        @error('nomor_surat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="tanggal_surat">Tanggal Surat</label>
                        <input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ old('tanggal_surat', $item->tanggal_surat) }}" placeholder="Masukkan Tanggal Surat" class="form-control @error('tanggal_surat') is-invalid @enderror" readonly>
                        @error('tanggal_surat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="softcopy">Softcopy</label><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4 order-0">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="perihal">Perihal</label>
                        <input type="text" name="perihal" id="perihal" value="{{ old('perihal', $item->perihal) }}" placeholder="Masukkan Perihal" class="form-control @error('perihal') is-invalid @enderror" readonly>
                        @error('perihal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="pengirim">Pengirim</label>
                        <input type="text" name="pengirim" id="pengirim" value="{{ old('pengirim', $item->pengirim) }}" placeholder="Masukkan Pengirim" class="form-control @error('pengirim') is-invalid @enderror" readonly>
                        @error('pengirim')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="penerima">Penerima</label>
                        <input type="text" name="penerima" id="penerima" value="{{ old('penerima', $item->penerima) }}" placeholder="Masukkan Penerima" class="form-control @error('penerima') is-invalid @enderror" readonly>
                        @error('penerima')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            @if (Auth::user()->role == 'Sekretaris' && $item->tanggal_sekretaris == NULL)
                <a href="{{ route('surat-masuk.verifikasi', $item->id) }}" class="btn btn-primary mt-3">Verifikasi Surat</a>
            @endif
            @if (Auth::user()->role == 'Pimpinan' && $item->tanggal_pimpinan == NULL)
                <a href="{{ route('surat-masuk.verifikasi', $item->id) }}" class="btn btn-primary mt-3">Verifikasi Surat</a>
            @endif
        </div>
    </div>
    @if ($item2)
    <form action="{{ route('disposisi.update', $item2->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tujuan">Tujuan Disposisi</label>
                            <input type="text" name="tujuan" id="tujuan" value="{{ old('tujuan', $item2->tujuan) }}" placeholder="Masukkan Tujuan Disposisi" class="form-control @error('tujuan') is-invalid @enderror">
                            @error('tujuan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="tindak_lanjut">Tindak Lanjut Disposisi</label>
                            <input type="text" name="tindak_lanjut" id="tindak_lanjut" value="{{ old('tindak_lanjut', $item2->tindak_lanjut) }}" placeholder="Masukkan Tindak Lanjut Disposisi" class="form-control @error('tindak_lanjut') is-invalid @enderror">
                            @error('tindak_lanjut')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="catatan">Catatan Disposisi</label>
                            <input type="text" name="catatan" id="catatan" value="{{ old('catatan', $item2->catatan) }}" placeholder="Masukkan Catatan Disposisi" class="form-control @error('catatan') is-invalid @enderror">
                            @error('catatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Ubah Disposisi Surat</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @else
        <form action="{{ route('disposisi.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="tujuan">Tujuan Disposisi</label>
                                <input type="text" name="tujuan" id="tujuan" value="{{ old('tujuan') }}" placeholder="Masukkan Tujuan Disposisi" class="form-control @error('tujuan') is-invalid @enderror">
                                @error('tujuan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="tindak_lanjut">Tindak Lanjut Disposisi</label>
                                <input type="text" name="tindak_lanjut" id="tindak_lanjut" value="{{ old('tindak_lanjut') }}" placeholder="Masukkan Tindak Lanjut Disposisi" class="form-control @error('tindak_lanjut') is-invalid @enderror">
                                @error('tindak_lanjut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="catatan">Catatan Disposisi</label>
                                <input type="text" name="catatan" id="catatan" value="{{ old('catatan') }}" placeholder="Masukkan Catatan Disposisi" class="form-control @error('catatan') is-invalid @enderror">
                                @error('catatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input type="hidden" name="surat_masuk_id" value="{{ $item->id }}">
                            <button type="submit" class="btn btn-primary mt-3">Buat Disposisi Surat</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
</div>
@endsection
