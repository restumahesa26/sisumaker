@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between mb-4">
        <h4 class="fw-bold">Data Undangan</h4>
        @if (Auth::user()->role == 'Sekretariat')
            <a href="{{ route('undangan.create') }}" class="btn btn-primary"><i class="bx bx-plus-circle me-1"></i>Tambah Data</a>
        @endif
    </div>
    {{-- <div class="row">
        <div class="col-8">
            <form action="{{ route('undangan.cari-surat') }}" method="get">
                <input type="search" name="search" id="search" placeholder="Cari surat berdasarkan nomor surat, perihal, pengirim, atau penerima" class="form-control mb-3 w-100">
            </form>
        </div>
        <div class="col-2">
            <a href="{{ route('undangan.index') }}" class="btn btn-primary">Refresh</a>
        </div>
    </div> --}}
    <div class="nav-align-top mb-4">
        <ul class="nav nav-pills mb-3" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                    data-bs-target="#semua" aria-controls="semua" aria-selected="true">
                    Semua Undangan
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                    data-bs-target="#sekretaris" aria-controls="sekretaris"
                    aria-selected="false">
                    Belum Diverifikasi Sekretaris&nbsp;<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger fw-bold">{{ $items->where('tanggal_sekretaris', '=', NULL)->count() }}</span>
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                    data-bs-target="#pimpinan" aria-controls="pimpinan"
                    aria-selected="false">
                    Belum Diverifikasi Pimpinan&nbsp;<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger fw-bold">{{ $items->where('tanggal_pimpinan', '=', NULL)->where('tanggal_sekretaris', '!=', NULL)->count() }}</span>
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                    data-bs-target="#selesai" aria-controls="selesai"
                    aria-selected="false">
                    Selesai Diverifikasi
                </button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="semua" role="tabpanel">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th style="width: 5%">Nomor Agenda</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Perihal</th>
                                <th>Pengirim</th>
                                <th style="width: 10%">Softcopy</th>
                                <th style="width: 20% !important">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($items as $item)
                            <tr>
                                <th style="width: 5%">
                                    {{ $item->no_urut }}
                                </th>
                                <td>{{ $item->nomor_surat }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                <td>{{ $item->perihal }}</td>
                                <td>{{ $item->pengirim }}</td>
                                <td style="width: 10%">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#softcopy-1{{ $item->id }}">
                                        Lihat File
                                    </button>
                                </td>
                                <td style="width: 20%">
                                    @if (Auth::user()->role == 'Sekretariat')
                                        <a class="btn btn-info btn-sm" href="{{ route('undangan.edit', $item->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('undangan.destroy', $item->id) }}" method="POST" class="d-inline btn-hapus">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bx bx-trash me-1"></i>Delete
                                            </button>
                                        </form>
                                    @elseif (Auth::user()->role == 'Sekretaris' || Auth::user()->role == 'Pimpinan')
                                        <a class="btn btn-info btn-sm" href="{{ route('undangan.show', $item->id) }}">
                                            <i class="bx bx-show-alt me-1"></i> Lihat
                                        </a>
                                        @if ($item->disposisi)
                                            <a class="btn btn-primary btn-sm" href="{{ route('undangan.cetak-disposisi', $item->id) }}" target="_blank">
                                                <i class="bx bx-printer me-1"></i> Cetak Disposisi
                                            </a>
                                        @endif

                                    @endif
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
            <div class="tab-pane fade" id="sekretaris" role="tabpanel">
                <div class="table-responsive">
                    <table class="table" id="table2">
                        <thead>
                            <tr>
                                <th style="width: 5%">Nomor Agenda</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Perihal</th>
                                <th>Pengirim</th>
                                <th style="width: 10%">Softcopy</th>
                                <th style="width: 20% !important">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($items->where('tanggal_sekretaris', '=', NULL) as $item)
                            <tr>
                                <th style="width: 5%">
                                    {{ $item->no_urut }}
                                </th>
                                <td>{{ $item->nomor_surat }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                <td>{{ $item->perihal }}</td>
                                <td>{{ $item->pengirim }}</td>
                                <td style="width: 10%">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#softcopy-2{{ $item->id }}">
                                        Lihat File
                                    </button>
                                </td>
                                <td style="width: 20%">
                                    @if (Auth::user()->role == 'Sekretariat')
                                        <a class="btn btn-info btn-sm" href="{{ route('undangan.edit', $item->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('undangan.destroy', $item->id) }}" method="POST" class="d-inline btn-hapus2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bx bx-trash me-1"></i>Delete
                                            </button>
                                        </form>
                                    @elseif (Auth::user()->role == 'Sekretaris' || Auth::user()->role == 'Pimpinan')
                                        <a class="btn btn-info btn-sm" href="{{ route('undangan.show', $item->id) }}">
                                            <i class="bx bx-show-alt me-1"></i> Lihat
                                        </a>
                                        @if ($item->disposisi)
                                            <a class="btn btn-primary btn-sm" href="{{ route('undangan.cetak-disposisi', $item->id) }}" target="_blank">
                                                <i class="bx bx-printer me-1"></i> Cetak Disposisi
                                            </a>
                                        @endif

                                    @endif
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
            <div class="tab-pane fade" id="pimpinan" role="tabpanel">
                <div class="table-responsive">
                    <table class="table" id="table3">
                        <thead>
                            <tr>
                                <th style="width: 5%">Nomor Agenda</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Perihal</th>
                                <th>Pengirim</th>
                                <th style="width: 10%">Softcopy</th>
                                <th style="width: 20% !important">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($items->where('tanggal_pimpinan', '=', NULL)->where('tanggal_sekretaris', '!=', NULL) as $item)
                            <tr>
                                <th style="width: 5%">
                                    {{ $item->no_urut }}
                                </th>
                                <td>{{ $item->nomor_surat }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                <td>{{ $item->perihal }}</td>
                                <td>{{ $item->pengirim }}</td>
                                <td style="width: 10%">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#softcopy-3{{ $item->id }}">
                                        Lihat File
                                    </button>
                                </td>
                                <td style="width: 20%">
                                    @if (Auth::user()->role == 'Sekretariat')
                                        <a class="btn btn-info btn-sm" href="{{ route('undangan.edit', $item->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('undangan.destroy', $item->id) }}" method="POST" class="d-inline btn-hapus3">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bx bx-trash me-1"></i>Delete
                                            </button>
                                        </form>
                                    @elseif (Auth::user()->role == 'Sekretaris' || Auth::user()->role == 'Pimpinan')
                                        <a class="btn btn-info btn-sm" href="{{ route('undangan.show', $item->id) }}">
                                            <i class="bx bx-show-alt me-1"></i> Lihat
                                        </a>
                                        @if ($item->disposisi)
                                            <a class="btn btn-primary btn-sm" href="{{ route('undangan.cetak-disposisi', $item->id) }}" target="_blank">
                                                <i class="bx bx-printer me-1"></i> Cetak Disposisi
                                            </a>
                                        @endif

                                    @endif
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
            <div class="tab-pane fade" id="selesai" role="tabpanel">
                <div class="table-responsive">
                    <table class="table" id="table4">
                        <thead>
                            <tr>
                                <th style="width: 5%">Nomor Agenda</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Perihal</th>
                                <th>Pengirim</th>
                                <th style="width: 10%">Softcopy</th>
                                <th style="width: 20% !important">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($items->where('tanggal_sekretaris', '!=', NULL)->where('tanggal_pimpinan', '!=', NULL) as $item)
                            <tr>
                                <th style="width: 5%">
                                    {{ $item->no_urut }}
                                </th>
                                <td>{{ $item->nomor_surat }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                <td>{{ $item->perihal }}</td>
                                <td>{{ $item->pengirim }}</td>
                                <td style="width: 10%">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#softcopy-4{{ $item->id }}">
                                        Lihat File
                                    </button>
                                </td>
                                <td style="width: 20%">
                                    @if (Auth::user()->role == 'Sekretariat')
                                        <a class="btn btn-info btn-sm" href="{{ route('undangan.edit', $item->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('undangan.destroy', $item->id) }}" method="POST" class="d-inline btn-hapus4">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bx bx-trash me-1"></i>Delete
                                            </button>
                                        </form>
                                    @elseif (Auth::user()->role == 'Sekretaris' || Auth::user()->role == 'Pimpinan')
                                        <a class="btn btn-info btn-sm" href="{{ route('undangan.show', $item->id) }}">
                                            <i class="bx bx-show-alt me-1"></i> Lihat
                                        </a>
                                        @if ($item->disposisi)
                                            <a class="btn btn-primary btn-sm" href="{{ route('undangan.cetak-disposisi', $item->id) }}" target="_blank">
                                                <i class="bx bx-printer me-1"></i> Cetak Disposisi
                                            </a>
                                        @endif

                                    @endif
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
@if (Auth::user()->role == 'Sekretaris')
    @if ($items->where('tanggal_sekretaris', '=', NULL)->count() > 0)
    <div class="bs-toast toast toast-placement-ex m-2 fade show bg-primary bottom-0 end-0 hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header top-0 end-0">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Pemberitahuan</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Terdapat Undangan Yang Belum Diverifikasi, Silahkan Diverifikasi.
        </div>
    </div>
    @endif
@endif
@if (Auth::user()->role == 'Pimpinan')
    @if ($items->where('tanggal_pimpinan', '=', NULL)->where('tanggal_sekretaris', '!=', NULL)->count() > 0)
    <div class="bs-toast toast toast-placement-ex m-2 fade show bg-primary bottom-0 end-0 hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header top-0 end-0">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Pemberitahuan</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Terdapat Undangan Yang Belum Diverifikasi, Silahkan Diverifikasi.
        </div>
    </div>
    @endif
@endif
@foreach ($items as $item)
<div class="modal fade" id="softcopy-1{{ $item->id }}" tabindex="-1" aria-hidden="true">
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
@endforeach
@foreach ($items->where('tanggal_sekretaris', '=', NULL) as $item)
<div class="modal fade" id="softcopy-2{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">File Softcopy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/file-undangan/'.$item->softcopy) }}" width="100%" height="550px">
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach ($items->where('tanggal_pimpinan', '=', NULL)->where('tanggal_sekretaris', '!=', NULL) as $item)
<div class="modal fade" id="softcopy-3{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">File Softcopy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/file-undangan/'.$item->softcopy) }}" width="100%" height="550px">
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach ($items->where('tanggal_sekretaris', '!=', NULL)->where('tanggal_pimpinan', '!=', NULL) as $item)
<div class="modal fade" id="softcopy-4{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">File Softcopy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('storage/file-undangan/'.$item->softcopy) }}" width="100%" height="550px">
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endpush

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#table1').DataTable({
                'ordering' : false
            });
        });
        $(document).ready(function () {
            $('#table2').DataTable({
                'ordering' : false
            });
        });
        $(document).ready(function () {
            $('#table3').DataTable({
                'ordering' : false
            });
        });
        $(document).ready(function () {
            $('#table4').DataTable({
                'ordering' : false
            });
        });
    </script>
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
        $('.btn-hapus2').on('click', function (e) {
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
        $('.btn-hapus3').on('click', function (e) {
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
        $('.btn-hapus4').on('click', function (e) {
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

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
@endpush
