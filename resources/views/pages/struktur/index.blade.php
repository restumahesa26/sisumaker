@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between mb-4">
        <h4 class="fw-bold">Data Struktur</h4>
        <a href="{{ route('struktur.create') }}" class="btn btn-primary"><i class="bx bx-plus-circle me-1"></i>Tambah Data</a>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse ($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jabatan }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('struktur.edit', $item->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('struktur.destroy', $item->id) }}" method="POST" class="d-inline btn-hapus">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="bx bx-trash me-1"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="text-center">
                                        <td colspan="7"> -- Data Kosong --</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
        $('.btn-hapus').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Hapus Data?',
            text: "Data Akan Terhapus",
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }else {
                    //
                }
            });
        });
    </script>
@endpush
