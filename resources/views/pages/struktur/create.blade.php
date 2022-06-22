@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <a href="{{ route('struktur.index') }}" class="btn btn-warning btn-sm mr-3 mb-2">Kembali</a>
    <div class="d-flex justify-content-between mb-2 mt-1">
        <h4 class="fw-bold">Tambah Visi Misi</h4>
    </div>
    <form action="{{ route('struktur.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                                placeholder="Masukkan Nama" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="jabatan">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror">
                                <option value="" hidden>-- Pilih Jabatan --</option>
                                <option value="Kepala Badan" @if (old('jabatan') == 'Kepala Badan') selected @endif>Kepala Badan</option>
                                <option value="Sekretaris" @if (old('jabatan') == 'Sekretaris') selected @endif>Sekretaris</option>
                                <option value="Sub Bagian Umum dan Perlengkapan" @if (old('jabatan') == 'Sub Bagian Umum dan Perlengkapan') selected @endif>Sub Bagian Umum dan Perlengkapan</option>
                                <option value="Sub Bagian Perencanaan, Evaluasi dan Pelaporan" @if (old('jabatan') == 'Sub Bagian Perencanaan, Evaluasi dan Pelaporan') selected @endif>Sub Bagian Perencanaan, Evaluasi dan Pelaporan</option>
                                <option value="Sub Bagian Keuangan" @if (old('jabatan') == 'Sub Bagian Keuangan') selected @endif>Sub Bagian Keuangan</option>
                                <option value="Kepala Bidang Perencanaan, Pengendalian dan Evaluasi Pembangunan Daerah" @if (old('jabatan') == 'Kepala Bidang Perencanaan, Pengendalian dan Evaluasi Pembangunan Daerah') selected @endif>Kepala Bidang Perencanaan, Pengendalian dan Evaluasi Pembangunan Daerah</option>
                                <option value="Kepala Sub Bidang Perencanaan dan Pendanaan" @if (old('jabatan') == 'Kepala Sub Bidang Perencanaan dan Pendanaan') selected @endif>Kepala Sub Bidang Perencanaan dan Pendanaan</option>
                                <option value="Kepala Sub Bidang Data dan Informasi" @if (old('jabatan') == 'Kepala Sub Bidang Data dan Informasi') selected @endif>Kepala Sub Bidang Data dan Informasi</option>
                                <option value="Kepala Sub Bidang Pengendalian, Evaluasi dan Pelaporan" @if (old('jabatan') == 'Kepala Sub Bidang Pengendalian, Evaluasi dan Pelaporan') selected @endif>Kepala Sub Bidang Pengendalian, Evaluasi dan Pelaporan</option>
                                <option value="Kepala Bidang Perekonomian dan Sumber Daya Alam (SDA)" @if (old('jabatan') == 'Kepala Bidang Perekonomian dan Sumber Daya Alam (SDA)') selected @endif>Kepala Bidang Perekonomian dan Sumber Daya Alam (SDA)</option>
                                <option value="Kepala Sub Bidang Pertanian dan Kemaritiman" @if (old('jabatan') == 'Kepala Sub Bidang Pertanian dan Kemaritiman') selected @endif>Kepala Sub Bidang Pertanian dan Kemaritiman</option>
                                <option value="Kepala Sub Bidang Pariwisata, Industri dan Perdagangan" @if (old('jabatan') == 'Kepala Sub Bidang Pariwisata, Industri dan Perdagangan') selected @endif>Kepala Sub Bidang Pariwisata, Industri dan Perdagangan</option>
                                <option value="Kepala Sub Bidang Ekonomi, Keuangan dan Pendanaan" @if (old('jabatan') == 'Kepala Sub Bidang Ekonomi, Keuangan dan Pendanaan') selected @endif>Kepala Sub Bidang Ekonomi, Keuangan dan Pendanaan</option>
                                <option value="Kepala Bidang Pemerintahan dan Pembangunan Manusia" @if (old('jabatan') == 'Kepala Bidang Pemerintahan dan Pembangunan Manusia') selected @endif>Kepala Bidang Pemerintahan dan Pembangunan Manusia</option>
                                <option value="Kepala Sub Bidang Pemerintahan dan Politik" @if (old('jabatan') == 'Kepala Sub Bidang Pemerintahan dan Politik') selected @endif>Kepala Sub Bidang Pemerintahan dan Politik</option>
                                <option value="Kepala Sub Bidang Pendidikan, Mental dan Budaya" @if (old('jabatan') == 'Kepala Sub Bidang Pendidikan, Mental dan Budaya') selected @endif>Kepala Sub Bidang Pendidikan, Mental dan Budaya</option>
                                <option value="Kepala Sub Bidang Kesehatan dan Kesejahteraan Rakyat" @if (old('jabatan') == 'Kepala Sub Bidang Kesehatan dan Kesejahteraan Rakyat') selected @endif>Kepala Sub Bidang Kesehatan dan Kesejahteraan Rakyat</option>
                                <option value="Kepala Bidang Infrastruktur dan Kewilayahan" @if (old('jabatan') == 'Kepala Bidang Infrastruktur dan Kewilayahan') selected @endif>Kepala Bidang Infrastruktur dan Kewilayahan</option>
                                <option value="Kepala Sub Bidang Pembangunan Infrastruktur" @if (old('jabatan') == 'Kepala Sub Bidang Pembangunan Infrastruktur') selected @endif>Kepala Sub Bidang Pembangunan Infrastruktur</option>
                                <option value="Kepala Sub Bidang Pengembangan Wilayah dan Tata Ruang" @if (old('jabatan') == 'Kepala Sub Bidang Pengembangan Wilayah dan Tata Ruang') selected @endif>Kepala Sub Bidang Pengembangan Wilayah dan Tata Ruang</option>
                                <option value="Kepala Sub Bidang Prasarana Wilayah dan Permukiman" @if (old('jabatan') == 'Kepala Sub Bidang Prasarana Wilayah dan Permukiman') selected @endif>Kepala Sub Bidang Prasarana Wilayah dan Permukiman</option>
                                <option value="Kepala Bidang Penelitian dan Pengembangan" @if (old('jabatan') == 'Kepala Bidang Penelitian dan Pengembangan') selected @endif>Kepala Bidang Penelitian dan Pengembangan</option>
                                <option value="Kepala Sub Bidang Sosial dan Pemerintahan" @if (old('jabatan') == 'Kepala Sub Bidang Sosial dan Pemerintahan') selected @endif>Kepala Sub Bidang Sosial dan Pemerintahan</option>
                                <option value="Kepala Sub Bidang Ekonomi dan Pembangunan" @if (old('jabatan') == 'Kepala Sub Bidang Ekonomi dan Pembangunan') selected @endif>Kepala Sub Bidang Ekonomi dan Pembangunan</option>
                                <option value="Kepala Sub Bidang Inovasi dan Teknologi" @if (old('jabatan') == 'Kepala Sub Bidang Inovasi dan Teknologi') selected @endif>Kepala Sub Bidang Inovasi dan Teknologi</option>
                            </select>
                            @error('jabatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 btn-block">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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

@push('addon-script')
<script type="text/javascript" src="{{ url('js/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('visi_misi', {
            height: 700,
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
            filebrowserUploadMethod: 'form'
        });
</script>
@endpush
