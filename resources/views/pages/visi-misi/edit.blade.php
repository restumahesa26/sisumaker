@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <a href="{{ route('visi-misi.index') }}" class="btn btn-warning btn-sm mr-3 mb-2">Kembali</a>
    <div class="d-flex justify-content-between mb-2 mt-1">
        <h4 class="fw-bold">Update Visi Misi</h4>
    </div>
    <form action="{{ route('visi-misi.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="visi_misi">Visi Misi</label>
                            <textarea class="ckeditor mt-2 form-control" name="visi_misi" id="visi_misi" placeholder="Masukkan Visi Misi" cols="30" rows="10">{!! old('visi_misi', $item->visi_misi) !!}</textarea>
                            @error('visi_misi')
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
