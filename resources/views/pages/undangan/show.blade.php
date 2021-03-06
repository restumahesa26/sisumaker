@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <a href="{{ route('undangan.index') }}" class="btn btn-warning btn-sm mr-3 mb-2">Kembali</a>
    <div class="d-flex justify-content-start mb-2">
        <h4 class="fw-bold">Data Undangan - {{ $item->no_urut }}</h4>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-4 order-0">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="no_urut">Nomor Urut</label>
                        <input type="number" name="no_urut" id="no_urut"
                            value="{{ old('no_urut', $item->no_urut) }}" placeholder="Masukkan Nomor Urut"
                            class="form-control @error('no_urut') is-invalid @enderror" readonly>
                        @error('no_urut')
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
                        <label for="tanggal">Tanggal Surat</label>
                        <input type="text" name="tanggal" id="tanggal"
                            value="{{ old('tanggal', $item->tanggal) }}"
                            placeholder="Masukkan Tanggal Surat"
                            class="form-control @error('tanggal') is-invalid @enderror" readonly>
                        @error('tanggal')
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
            @if (Auth::user()->role == 'Sekretaris' && $item->tanggal_pimpinan == NULL && $item->tanggal_sekretaris == NULL)
            <a href="{{ route('undangan.verifikasi', $item->id) }}" class="btn btn-primary mt-3 btn-verifikasi">Verifikasi Undangan</a>
            @endif
            @if (Auth::user()->role == 'Pimpinan' && $item->tanggal_sekretaris != NULL && $item->tanggal_pimpinan == NULL)
            <a href="{{ route('undangan.verifikasi', $item->id) }}" class="btn btn-primary mt-3 btn-verifikasi">Verifikasi Undangan</a>
            @endif
        </div>
    </div>
    @if ($item2)
    <form action="{{ route('undangan-disposisi.update', $item2->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tujuan">Tujuan Disposisi</label>
                            <select name="tujuan" id="tujuan" class="form-control @error('tujuan') is-invalid @enderror">
                                <option value="" hidden>-- Pilih Tujuan Disposisi --</option>
                                <option value="Kasubbag Umum dan Perlengkapan" @if (old('tujuan', $item2->tujuan) == "Kasubbag Umum dan Perlengkapan")
                                    selected
                                @endif>Kasubbag Umum dan Perlengkapan</option>
                                <option value="Kasubbag Keuangan" @if (old('tujuan', $item2->tujuan) == "Kasubbag Keuangan")
                                    selected
                                @endif>Kasubbag Keuangan</option>
                                <option value="Kepala Bidang Perencanaan, Pengendalian, dan Evaluasi Pembangunan Daerah" @if (old('tujuan', $item2->tujuan) == "Kepala Bidang Perencanaan, Pengendalian, dan Evaluasi Pembangunan Daerah")
                                    selected
                                @endif>Kepala Bidang Perencanaan, Pengendalian, dan
                                Evaluasi Pembangunan Daerah</option>
                                <option value="Kepala Bidang Perekonomian dan Sumber Daya Alam" @if (old('tujuan', $item2->tujuan) == "Kepala Bidang Perekonomian dan Sumber Daya Alam")
                                    selected
                                @endif>Kepala Bidang Perekonomian dan Sumber Daya Alam</option>
                                <option value="Kepala Bidang Pemerintahan dan Pembangunan Manusia" @if (old('tujuan', $item2->tujuan) == "Kepala Bidang Pemerintahan dan Pembangunan Manusia")
                                    selected
                                @endif>Kepala Bidang Pemerintahan dan Pembangunan Manusia
                                </option>
                                <option value="Kepala Bidang Infrastruktur dan Kewilayahan" @if (old('tujuan', $item2->tujuan) == "Kepala Bidang Infrastruktur dan Kewilayahan")
                                    selected
                                @endif>Kepala Bidang Infrastruktur dan Kewilayahan</option>
                                <option value="Kepala Bidang Penelitian dan Pengembangan" @if (old('tujuan', $item2->tujuan) == "Kepala Bidang Penelitian dan Pengembangan")
                                    selected
                                @endif>Kepala Bidang Penelitian dan Pengembangan</option>
                                <option value="Lainnya" @if (old('tujuan', $item2->tujuan) == "Lainnya")
                                    selected
                                @endif>Lainnya</option>
                            </select>
                            @error('tujuan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="tindak_lanjut">Tindak Lanjut Disposisi</label>
                            <select name="tindak_lanjut" id="tindak_lanjut" class="form-control @error('tindak_lanjut') is-invalid @enderror">
                                <option value="" hidden>-- Pilih Tindak Lanjut --</option>
                                <option value="Tanggapan dan Saran" @if (old('tindak_lanjut', $item2->tindak_lanjut) == "Tanggapan dan Saran")
                                    selected
                                @endif>Tanggapan dan Saran</option>
                                <option value="Proses lebih lanjut" @if (old('tindak_lanjut', $item2->tindak_lanjut) == "Proses lebih lanjut")
                                    selected
                                @endif>Proses lebih lanjut</option>
                                <option value="Koordinasi/konfirmasikan" @if (old('tindak_lanjut', $item2->tindak_lanjut) == "Koordinasi/konfirmasikan")
                                    selected
                                @endif>Koordinasi/konfirmasikan</option>
                                <option value="Pelajari" @if (old('tindak_lanjut', $item2->tindak_lanjut) == "Pelajari")
                                    selected
                                @endif>Pelajari</option>
                                <option value="Untuk ditindak lanjuti" @if (old('tindak_lanjut', $item2->tindak_lanjut) == "Untuk ditindak lanjuti")
                                    selected
                                @endif>Untuk ditindak lanjuti</option>
                                <option value="Untuk diketahui/perhatian" @if (old('tindak_lanjut', $item2->tindak_lanjut) == "Untuk diketahui/perhatian")
                                    selected
                                @endif>Untuk diketahui/perhatian</option>
                                <option value="Hadiri/wakili" @if (old('tindak_lanjut', $item2->tindak_lanjut) == "Hadiri/wakili")
                                    selected
                                @endif>Hadiri/wakili</option>
                                <option value="File/Arsip" @if (old('tindak_lanjut', $item2->tindak_lanjut) == "File/Arsip")
                                    selected
                                @endif>File/Arsip</option>
                                <option value="Lainnya" @if (old('tindak_lanjut', $item2->tindak_lanjut) == "Lainnya")
                                    selected
                                @endif>Lainnya</option>
                            </select>
                            @error('tindak_lanjut')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="catatan">Catatan Disposisi</label>
                            <input type="text" name="catatan" id="catatan" value="{{ old('catatan', $item2->catatan) }}"
                                placeholder="Masukkan Catatan Disposisi"
                                class="form-control @error('catatan') is-invalid @enderror">
                            @error('catatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Ubah Disposisi Undangan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @elseif ($item->tanggal_pimpinan != NULL)
    <form action="{{ route('undangan-disposisi.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tujuan">Tujuan Disposisi</label>
                            <select name="tujuan" id="tujuan" class="form-control @error('tujuan') is-invalid @enderror">
                                <option value="" hidden>-- Pilih Tujuan Disposisi --</option>
                                <option value="Kasubbag Umum dan Perlengkapan" @if (old('tujuan') == "Kasubbag Umum dan Perlengkapan")
                                    selected
                                @endif>Kasubbag Umum dan Perlengkapan</option>
                                <option value="Kasubbag Keuangan" @if (old('tujuan') == "Kasubbag Keuangan")
                                    selected
                                @endif>Kasubbag Keuangan</option>
                                <option value="Kepala Bidang Perencanaan, Pengendalian, dan Evaluasi Pembangunan Daerah" @if (old('tujuan') == "Kepala Bidang Perencanaan, Pengendalian, dan Evaluasi Pembangunan Daerah")
                                    selected
                                @endif>Kepala Bidang Perencanaan, Pengendalian, dan
                                Evaluasi Pembangunan Daerah</option>
                                <option value="Kepala Bidang Perekonomian dan Sumber Daya Alam" @if (old('tujuan') == "Kepala Bidang Perekonomian dan Sumber Daya Alam")
                                    selected
                                @endif>Kepala Bidang Perekonomian dan Sumber Daya Alam</option>
                                <option value="Kepala Bidang Pemerintahan dan Pembangunan Manusia" @if (old('tujuan') == "Kepala Bidang Pemerintahan dan Pembangunan Manusia")
                                    selected
                                @endif>Kepala Bidang Pemerintahan dan Pembangunan Manusia
                                </option>
                                <option value="Kepala Bidang Infrastruktur dan Kewilayahan" @if (old('tujuan') == "Kepala Bidang Infrastruktur dan Kewilayahan")
                                    selected
                                @endif>Kepala Bidang Infrastruktur dan Kewilayahan</option>
                                <option value="Kepala Bidang Penelitian dan Pengembangan" @if (old('tujuan') == "Kepala Bidang Penelitian dan Pengembangan")
                                    selected
                                @endif>Kepala Bidang Penelitian dan Pengembangan</option>
                                <option value="Lainnya" @if (old('tujuan') == "Lainnya")
                                    selected
                                @endif>Lainnya</option>
                            </select>
                            @error('tujuan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="tindak_lanjut">Tindak Lanjut Disposisi</label>
                            <select name="tindak_lanjut" id="tindak_lanjut" class="form-control @error('tindak_lanjut') is-invalid @enderror">
                                <option value="" hidden>-- Pilih Tindak Lanjut --</option>
                                <option value="Tanggapan dan Saran" @if (old('tindak_lanjut') == "Tanggapan dan Saran")
                                    selected
                                @endif>Tanggapan dan Saran</option>
                                <option value="Proses lebih lanjut" @if (old('tindak_lanjut') == "Proses lebih lanjut")
                                    selected
                                @endif>Proses lebih lanjut</option>
                                <option value="Koordinasi/konfirmasikan" @if (old('tindak_lanjut') == "Koordinasi/konfirmasikan")
                                    selected
                                @endif>Koordinasi/konfirmasikan</option>
                                <option value="Pelajari" @if (old('tindak_lanjut') == "Pelajari")
                                    selected
                                @endif>Pelajari</option>
                                <option value="Untuk ditindak lanjuti" @if (old('tindak_lanjut') == "Untuk ditindak lanjuti")
                                    selected
                                @endif>Untuk ditindak lanjuti</option>
                                <option value="Untuk diketahui/perhatian" @if (old('tindak_lanjut') == "Untuk diketahui/perhatian")
                                    selected
                                @endif>Untuk diketahui/perhatian</option>
                                <option value="Hadiri/wakili" @if (old('tindak_lanjut') == "Hadiri/wakili")
                                    selected
                                @endif>Hadiri/wakili</option>
                                <option value="File/Arsip" @if (old('tindak_lanjut') == "File/Arsip")
                                    selected
                                @endif>File/Arsip</option>
                                <option value="Lainnya" @if (old('tindak_lanjut') == "Lainnya")
                                    selected
                                @endif>Lainnya</option>
                            </select>
                            @error('tindak_lanjut')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="catatan">Catatan Disposisi</label>
                            <input type="text" name="catatan" id="catatan" value="{{ old('catatan') }}"
                                placeholder="Masukkan Catatan Disposisi"
                                class="form-control @error('catatan') is-invalid @enderror">
                            @error('catatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <input type="hidden" name="undangan_id" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-primary mt-3">Buat Disposisi Undangan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endif
</div>
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

@push('addon-style')
    <link rel="stylesheet" href="{{ url('css/sweetalert2.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>
    <script>
        $('.btn-verifikasi').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = $(this).attr('href');
            Swal.fire({
                title: 'Verifikasi',
                text: "Verifikasi Undangan?",
                icon: 'info',
                allowOutsideClick: false,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Verifikasi',
                cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = form;
                    }else {
                        //
                    }
                });
        });
    </script>
@endpush
