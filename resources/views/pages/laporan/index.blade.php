@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between mb-4">
        <h4 class="fw-bold">Laporan</h4>
    </div>
    <div class="nav-align-top mb-4">
        <ul class="nav nav-pills mb-3" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                    data-bs-target="#surat_masuk" aria-controls="surat_masuk" aria-selected="true">
                    Surat Masuk
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#surat_keluar"
                    aria-controls="surat_keluar" aria-selected="false">
                    Surat Keluar
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#undangan"
                    aria-controls="undangan" aria-selected="false">
                    Undangan
                </button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="surat_masuk" role="tabpanel">
                <a href="{{ route('surat-masuk.cetak-semua') }}" class="btn btn-primary px-5 mb-3" target="_blank">Cetak
                    Semua Laporan</a>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                    data-bs-target="#surat_masuk_tanggal" style="margin-left: 14px !important;">
                    Cetak Berdasarkan Tanggal
                </button>
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
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($suratMasuk as $item)
                            <tr>
                                <td>
                                    {{ $item->no_agenda }}
                                </td>
                                <td>{{ $item->nomor_surat }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_surat)->translatedFormat('d F Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_sekretariat)->translatedFormat('d F Y H:i') }}
                                </td>
                                <td>{{ ($item->tanggal_sekretaris != NULL) ? \Carbon\Carbon::parse($item->tanggal_sekretaris)->translatedFormat('d F Y H:i') : '-' }}
                                </td>
                                <td>{{ ($item->tanggal_pimpinan != NULL) ? \Carbon\Carbon::parse($item->tanggal_pimpinan)->translatedFormat('d F Y H:i') : '-' }}
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
                <div class="modal fade" id="surat_masuk_tanggal" data-bs-backdrop="static" tabindex="-1">
                    <div class="modal-dialog">
                        <form class="modal-content" action="{{ route('surat-masuk.cetak-tanggal') }}" method="GET" target="_blank">
                            <div class="modal-header">
                                <h5 class="modal-title" id="backDropModalTitle">Cetak Laporan Surat Masuk Berdasarkan Tanggal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="surat_masuk_tanggal_awal" class="form-label">Tanggal Awal</label>
                                        <input type="text" name="awal" id="surat_masuk_tanggal_awal" class="form-control" placeholder="Masukkan Tanggal Awal" required autocomplete="off" />
                                    </div>
                                    <div class="col mb-0">
                                        <label for="surat_masuk_tanggal_akhir" class="form-label">Tanggal Akhir</label>
                                        <input type="text" name="akhir" id="surat_masuk_tanggal_akhir" class="form-control" placeholder="Masukkan Tanggal Akhir" required autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Cetak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="surat_keluar" role="tabpanel">
                <a href="{{ route('surat-keluar.cetak-semua') }}" class="btn btn-primary px-5 mb-3"
                    target="_blank">Cetak Semua Laporan</a>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                    data-bs-target="#surat_keluar_tanggal" style="margin-left: 14px !important;">
                    Cetak Berdasarkan Tanggal
                </button>
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
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($suratKeluar as $item)
                            <tr>
                                <td>
                                    {{ $item->no_agenda }}
                                </td>
                                <td>{{ $item->nomor_surat }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_surat)->translatedFormat('d F Y') }}</td>
                                <td>{{ $item->perihal }}</td>
                                <td>{{ $item->pengirim }}</td>
                                <td>{{ $item->penerima }}</td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="7"> -- Data Kosong --</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="surat_keluar_tanggal" data-bs-backdrop="static" tabindex="-1">
                    <div class="modal-dialog">
                        <form class="modal-content" action="{{ route('surat-keluar.cetak-tanggal') }}" method="GET" target="_blank">
                            <div class="modal-header">
                                <h5 class="modal-title" id="backDropModalTitle">Cetak Laporan Surat Keluar Berdasarkan Tanggal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="surat_keluar_tanggal_awal" class="form-label">Tanggal Awal</label>
                                        <input type="text" id="surat_keluar_tanggal_awal" class="form-control" name="awal"
                                            placeholder="Masukkan Tanggal Awal" required autocomplete="off" />
                                    </div>
                                    <div class="col mb-0">
                                        <label for="surat_keluar_tanggal_akhir" class="form-label">Tanggal Akhir</label>
                                        <input type="text" id="surat_keluar_tanggal_akhir" class="form-control" name="akhir"
                                            placeholder="Masukkan Tanggal Akhir" required autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Cetak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="undangan" role="tabpanel">
                <a href="{{ route('undangan.cetak-semua') }}" class="btn btn-primary px-5 mb-3"
                    target="_blank">Cetak Semua Laporan</a>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                    data-bs-target="#undangan_tanggal" style="margin-left: 14px !important;">
                    Cetak Berdasarkan Tanggal
                </button>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nomor Urut</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal</th>
                                <th>Perihal</th>
                                <th>Pengirim</th>
                                <th>Penerima</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($undangan as $item)
                            <tr>
                                <td>
                                    {{ $item->no_urut }}
                                </td>
                                <td>{{ $item->nomor_surat }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                <td>{{ $item->perihal }}</td>
                                <td>{{ $item->pengirim }}</td>
                                <td>{{ $item->penerima }}</td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="7"> -- Data Kosong --</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="undangan_tanggal" data-bs-backdrop="static" tabindex="-1">
                    <div class="modal-dialog">
                        <form class="modal-content" action="{{ route('undangan.cetak-tanggal') }}" method="GET" target="_blank">
                            <div class="modal-header">
                                <h5 class="modal-title" id="backDropModalTitle">Cetak Laporan Surat Keluar Berdasarkan Tanggal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="undangan_tanggal_awal" class="form-label">Tanggal Awal</label>
                                        <input type="text" id="undangan_tanggal_awal" class="form-control" name="awal"
                                            placeholder="Masukkan Tanggal Awal" required autocomplete="off" />
                                    </div>
                                    <div class="col mb-0">
                                        <label for="undangan_tanggal_akhir" class="form-label">Tanggal Akhir</label>
                                        <input type="text" id="undangan_tanggal_akhir" class="form-control" name="akhir"
                                            placeholder="Masukkan Tanggal Akhir" required autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Cetak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-style')
    <link href="{{ url('backend/assets/vendor/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" >
@endpush

@push('addon-script')
    <script src="{{ url('backend/assets/vendor/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <script>
        $('#surat_masuk_tanggal_awal, #surat_masuk_tanggal_akhir, #surat_keluar_tanggal_awal, #surat_keluar_tanggal_akhir, #undangan_tanggal_awal, #undangan_tanggal_akhir').keypress(function(e) {
            e.preventDefault();
        });
    </script>

    <script>
        $('#surat_masuk_tanggal_awal').datepicker({
            format: 'yyyy/mm/dd',
            todayBtn: 'linked',
            todayHighlight: true,
            autoclose: true,
        });
        $('#surat_masuk_tanggal_akhir').datepicker({
            format: 'yyyy/mm/dd',
            todayBtn: 'linked',
            todayHighlight: true,
            autoclose: true,
        });
        $('#surat_keluar_tanggal_awal').datepicker({
            format: 'yyyy/mm/dd',
            todayBtn: 'linked',
            todayHighlight: true,
            autoclose: true,
        });
        $('#surat_keluar_tanggal_akhir').datepicker({
            format: 'yyyy/mm/dd',
            todayBtn: 'linked',
            todayHighlight: true,
            autoclose: true,
        });
        $('#undangan_tanggal_awal').datepicker({
            format: 'yyyy/mm/dd',
            todayBtn: 'linked',
            todayHighlight: true,
            autoclose: true,
        });
        $('#undangan_tanggal_akhir').datepicker({
            format: 'yyyy/mm/dd',
            todayBtn: 'linked',
            todayHighlight: true,
            autoclose: true,
        });
    </script>
@endpush
