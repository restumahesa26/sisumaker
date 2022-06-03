@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between mb-4">
        <h4 class="fw-bold">Data Surat Keluar</h4>
        <a href="{{ route('surat-keluar.create') }}" class="btn btn-primary"><i class="bx bx-plus-circle me-1"></i>Tambah Data</a>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('surat-keluar.cari-surat') }}" method="get">
                                    <input type="search" name="search" id="search" placeholder="Cari surat berdasarkan nomor surat" class="form-control mb-3 w-100">
                                </form>
                            </div>
                            <div class="col">
                                <a href="{{ route('surat-keluar.index') }}" class="btn btn-primary">Refresh</a>
                            </div>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nomor Agenda</th>
                                        <th>Nomor Surat</th>
                                        <th>Tanggal Surat</th>
                                        <th>Perihal</th>
                                        <th>Pengirim</th>
                                        <th>Penerima</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse ($items as $item)
                                    <tr>
                                        <td>
                                            {{ $item->no_agenda }}
                                        </td>
                                        <td>{{ $item->nomor_surat }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_surat)->translatedFormat('d F Y') }}</td>
                                        <td>{{ $item->perihal }}</td>
                                        <td>{{ $item->pengirim }}</td>
                                        <td>{{ $item->penerima }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('surat-keluar.edit', $item->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('surat-keluar.destroy', $item->id) }}" method="POST" class="d-inline btn-hapus">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
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

    @if(session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session()->get("success") }}'
        })
    </script>
    @endif
@endpush
