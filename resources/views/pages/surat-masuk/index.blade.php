@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between mb-4">
        <h4 class="fw-bold">Data Surat Masuk</h4>
        @if (Auth::user()->role == 'Sekretariat')
            <a href="{{ route('surat-masuk.create') }}" class="btn btn-primary"><i class="bx bx-plus-circle me-1"></i>Tambah Data</a>
        @endif
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
                                        <th>Nomor Agenda</th>
                                        <th>Nomor Surat</th>
                                        <th>Tanggal Surat</th>
                                        <th>Tanggal Sekretariat</th>
                                        <th>Tanggal Sekretaris</th>
                                        <th>Tanggal Pimpinan</th>
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
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_sekretariat)->translatedFormat('d F Y H:i') }}</td>
                                        <td>{{ ($item->tanggal_sekretaris != NULL) ? \Carbon\Carbon::parse($item->tanggal_sekretaris)->translatedFormat('d F Y H:i') : '-' }}</td>
                                        <td>{{ ($item->tanggal_pimpinan != NULL) ? \Carbon\Carbon::parse($item->tanggal_pimpinan)->translatedFormat('d F Y H:i') : '-' }}</td>
                                        <td>
                                            @if (Auth::user()->role == 'Sekretariat')
                                                <a class="btn btn-info btn-sm" href="{{ route('surat-masuk.edit', $item->id) }}">
                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                </a>
                                                <form action="{{ route('surat-masuk.destroy', $item->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bx bx-trash me-1"></i>Delete
                                                    </button>
                                                </form>
                                            @elseif (Auth::user()->role == 'Sekretaris' || Auth::user()->role == 'Pimpinan')
                                                <a class="btn btn-info btn-sm" href="{{ route('surat-masuk.show', $item->id) }}">
                                                    <i class="bx bx-show-alt me-1"></i> Lihat
                                                </a>
                                                @if ($item->disposisi)
                                                    <a class="btn btn-primary btn-sm" href="{{ route('surat-masuk.cetak-disposisi', $item->id) }}" target="_blank">
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
    </div>
</div>
@endsection
