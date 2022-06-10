@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-bold">Selamat Datang {{ Auth::user()->nama }}!!</h5>
                            <p class="mb-4">
                                Pada Sistem Informasi Manajemen Surat Masuk, Surat Keluar, dan Undangan pada Kantor BAPPEDA PROV. Bengkulu
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ url('backend/assets/img/illustrations/man-with-laptop-light.png') }}" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 order-1">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="fw-semibold">Monitoring Surat Masuk</h5>
                            <div class="demo-inline-spacing mt-3">
                                <ul class="list-group">
                                    @forelse ($suratMasuk as $item)
                                    <a href="{{ Auth::user()->role == 'Sekretariat' ? route('surat-masuk.edit', $item->id) : route('surat-masuk.show', $item->id) }}">
                                        <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                                            Surat dari {{ $item->pengirim }} dengan Nomor Surat : {{ $item->nomor_surat }}
                                            @if ($item->tanggal_sekretaris == NULL)
                                                <span class="badge bg-primary">Sedang Diverifikasi oleh Sekretaris</span>
                                            @elseif ($item->tanggal_pimpinan == NULL && $item->sekretaris != NULL)
                                                <span class="badge bg-warning">Sedang Diverifikasi oleh Pimpinan</span>
                                            @endif
                                        </li>
                                    </a>
                                    @empty

                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 order-1">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="fw-semibold">Monitoring Undangan</h5>
                            <div class="demo-inline-spacing mt-3">
                                <ul class="list-group">
                                    @forelse ($undangan as $item)
                                    <a href="{{ Auth::user()->role == 'Sekretariat' ? route('undangan.edit', $item->id) : route('undangan.show', $item->id) }}">
                                        <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                                            Surat dari {{ $item->pengirim }} dengan Nomor Surat : {{ $item->nomor_surat }}
                                            @if ($item->tanggal_sekretaris == NULL)
                                                <span class="badge bg-primary">Sedang Diverifikasi oleh Sekretaris</span>
                                            @elseif ($item->tanggal_sekretaris != NULL && $item->tanggal_pimpinan == NULL)
                                                <span class="badge bg-warning">Sedang Diverifikasi oleh Pimpinan</span>
                                            @endif

                                        </li>
                                    </a>
                                    @empty

                                    @endforelse

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 order-1">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-primary">
                                <div class="panel-heading"><b>Grafik Surat Masuk, Surat Keluar dan Undangan Hari Ini</b></div>
                                <div class="panel-body">
                                    <canvas id="canvas" height="280" width="600"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
    <script>
        var Years = ['Surat Masuk','Surat Keluar','Undangan'];
        var Labels = ['Surat Masuk','Surat Keluar','Undangan'];
        var Prices = [{{ $surat_masuk }},{{ $surat_keluar }}, {{ $undangan_count }}];
        $(document).ready(function(){
            var ctx = document.getElementById("canvas").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:Years,
                        datasets: [{
                            label: "Jumlah",
                            data: Prices,
                            borderWidth: 1,
                            backgroundColor : [
                            "#1363DF", "#EC9B3B", "#00FFAB"
                        ],
                    }]
                },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true,
                                    stepSize: 1
                                }
                            }]
                        }
                    }
                });
        });
        </script>
@endpush
