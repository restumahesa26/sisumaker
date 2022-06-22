@extends('layouts.home')

@section('content')
<!-- Header -->
<header id="header" class="header">
    <div class="header-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-5">
                    <div class="text-container">
                        <h1>SISUMAKER</h1>
                        <p class="p-large">Sistem Informasi Surat Masuk & Surat Keluar</p>
                        <a class="btn-solid-lg page-scroll" href="{{ route('scan') }}">Pindai Surat</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6 col-xl-7">
                    <div class="image-container">
                        <div class="img-wrapper">
                            <img class="img-fluid" src="{{ url('frontend/images/header.png') }}" alt="alternative">
                        </div> <!-- end of img-wrapper -->
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of header-content -->
</header> <!-- end of header -->
<svg class="header-frame" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 310"><defs><style>.cls-1{fill:#5f4def;}</style></defs><title>header-frame</title><path class="cls-1" d="M0,283.054c22.75,12.98,53.1,15.2,70.635,14.808,92.115-2.077,238.3-79.9,354.895-79.938,59.97-.019,106.17,18.059,141.58,34,47.778,21.511,47.778,21.511,90,38.938,28.418,11.731,85.344,26.169,152.992,17.971,68.127-8.255,115.933-34.963,166.492-67.393,37.467-24.032,148.6-112.008,171.753-127.963,27.951-19.26,87.771-81.155,180.71-89.341,72.016-6.343,105.479,12.388,157.434,35.467,69.73,30.976,168.93,92.28,256.514,89.405,100.992-3.315,140.276-41.7,177-64.9V0.24H0V283.054Z"/></svg>
<!-- end of header -->

<div class="cards-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="h2-heading text-center">Visi & Misi</h2>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-lg-12">
                @if ($visiMisi)
                {!! $visiMisi->visi_misi !!}
                @endif
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div>

<div class="cards-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="h2-heading text-center">Struktur</h2>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-lg-12">
                {{-- <div id="diagram_container"></div> --}}
                <table class="table table-borderless">
                    <tbody>
                        <tr class="text-center">
                            <th style="width: 20%"></th>
                            <th style="width: 20%"></th>
                            <th style="width: 20%; border: 1px solid #000;">Kepala Badan</th>
                            <th style="width: 20%"></th>
                            <th style="width: 20%"></th>
                        </tr>
                        <tr class="text-center">
                            <th style="width: 20%"></th>
                            <th style="width: 20%"></th>
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Badan')->nama }}</th>
                            <th style="width: 20%"></th>
                            <th style="width: 20%"></th>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-borderless mt-2">
                    <tbody>
                        <tr class="text-center">
                            <th style="width: 50%"></th>
                            <th style="width: 15%"></th>
                            <th style="width: 15%; border: 1px solid #000;">Sekretaris</th>
                            <th style="width: 15%"></th>
                        </tr>
                        <tr class="text-center">
                            <th style="width: 50%"></th>
                            <th style="width: 15%"></th>
                            <th style="width: 15%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Sekretaris')->nama }}</th>
                            <th style="width: 15%"></th>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-borderless mt-3">
                    <tbody>
                        <tr class="text-center">
                            <th style="width: 50%"></th>
                            <th style="width: 15%; border: 1px solid #000;">Sub Bag 1</th>
                            <th style="width: 15%; border: 1px solid #000;">Sub Bag 2</th>
                            <th style="width: 15%; border: 1px solid #000;">Sub Bag 3</th>
                        </tr>
                        <tr class="text-center">
                            <th style="width: 50%"></th>
                            <th style="width: 15%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Sub Bagian Umum dan Perlengkapan')->nama }}</th>
                            <th style="width: 15%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Sub Bagian Perencanaan, Evaluasi dan Pelaporan')->nama }}</th>
                            <th style="width: 15%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Sub Bagian Keuangan')->nama }}</th>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-borderless mt-5">
                    <tbody>
                        <tr class="text-center">
                            <th style="width: 20%; border: 1px solid #000;">BIDANG 1</th>
                            <th style="width: 20%; border: 1px solid #000;">BIDANG 2</th>
                            <th style="width: 20%; border: 1px solid #000;">BIDANG 3</th>
                            <th style="width: 20%; border: 1px solid #000;">BIDANG 4</th>
                            <th style="width: 20%; border: 1px solid #000;">BIDANG 5</th>
                        </tr>
                        <tr class="text-center">
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Bidang Perencanaan, Pengendalian dan Evaluasi Pembangunan Daerah')->nama }}</th>
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Bidang Perekonomian dan Sumber Daya Alam (SDA)')->nama }}</th>
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Bidang Pemerintahan dan Pembangunan Manusia')->nama }}</th>
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Bidang Infrastruktur dan Kewilayahan')->nama }}</th>
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Bidang Penelitian dan Pengembangan')->nama }}</th>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-borderless mt-5">
                    <tbody>
                        <tr class="text-center">
                            <th style="width: 20%; border: 1px solid #000;">SUB BIDANG 1.A</th>
                            <th style="width: 20%; border: 1px solid #000;">SUB BIDANG 2.A</th>
                            <th style="width: 20%; border: 1px solid #000;">SUB BIDANG 3.A</th>
                            <th style="width: 20%; border: 1px solid #000;">SUB BIDANG 4.A</th>
                            <th style="width: 20%; border: 1px solid #000;">SUB BIDANG 5.A</th>
                        </tr>
                        <tr class="text-center">
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Sub Bidang Perencanaan dan Pendanaan')->nama }}</th>
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Sub Bidang Pertanian dan Kemaritiman')->nama }}</th>
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Sub Bidang Pemerintahan dan Politik')->nama }}</th>
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Sub Bidang Pembangunan Infrastruktur')->nama }}</th>
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Sub Bidang Sosial dan Pemerintahan')->nama }}</th>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-borderless mt-5">
                    <tbody>
                        <tr class="text-center">
                            <th style="width: 20%; border: 1px solid #000;">SUB BIDANG 1.B</th>
                            <th style="width: 20%; border: 1px solid #000;">SUB BIDANG 2.B</th>
                            <th style="width: 20%; border: 1px solid #000;">SUB BIDANG 3.B</th>
                            <th style="width: 20%; border: 1px solid #000;">SUB BIDANG 4.B</th>
                            <th style="width: 20%; border: 1px solid #000;">SUB BIDANG 5.B</th>
                        </tr>
                        <tr class="text-center">
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Sub Bidang Data dan Informasi')->nama }}</th>
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Sub Bidang Pariwisata, Industri dan Perdagangan')->nama }}</th>
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Sub Bidang Pendidikan, Mental dan Budaya')->nama }}</th>
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Sub Bidang Pengembangan Wilayah dan Tata Ruang')->nama }}</th>
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Sub Bidang Ekonomi dan Pembangunan')->nama }}</th>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-borderless mt-5">
                    <tbody>
                        <tr class="text-center">
                            <th style="width: 20%; border: 1px solid #000;">SUB BIDANG 1.C</th>
                            <th style="width: 20%; border: 1px solid #000;">SUB BIDANG 2.C</th>
                            <th style="width: 20%; border: 1px solid #000;">SUB BIDANG 3.C</th>
                            <th style="width: 20%; border: 1px solid #000;">SUB BIDANG 4.C</th>
                            <th style="width: 20%; border: 1px solid #000;">SUB BIDANG 5.C</th>
                        </tr>
                        <tr class="text-center">
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Sub Bidang Pengendalian, Evaluasi dan Pelaporan')->nama }}</th>
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Sub Bidang Ekonomi, Keuangan dan Pendanaan')->nama }}</th>
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Sub Bidang Kesehatan dan Kesejahteraan Rakyat')->nama }}</th>
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Sub Bidang Prasarana Wilayah dan Permukiman')->nama }}</th>
                            <th style="width: 20%; border: 1px solid #000;">{{ App\Helpers\MyHelper::getNamaPejabat('Kepala Sub Bidang Inovasi dan Teknologi')->nama }}</th>
                        </tr>
                    </tbody>
                </table>
                <h5>Keterangan</h5>
                <table class="table table-borderless table-struktur">
                    <tbody>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Sub Bag 1</td>
                            <td>: Sub Bag Umum dan Perlengkapan</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Sub Bag 2</td>
                            <td>: Sub Bag Perencanaan, Evaluasi dan Pelaporan</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Sub Bag 3</td>
                            <td>: Sub Bag Keuangan</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Bidang 1</td>
                            <td>: Bidang Perencanaan, Pengendalian dan Evaluasi Pembangunan Daerah</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Sub Bidang 1.A</td>
                            <td>: Sub Bidang Perencanaan dan Pendanaan</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Sub Bidang 1.B</td>
                            <td>: Sub Bidang Pengendalian, Evaluasi dan Pelaporan</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Sub Bidang 1.C</td>
                            <td>: Sub Bidang Data dan Informasi</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Bidang 2</td>
                            <td>: Bidang Perekonomian dan Sumber Daya Alam (SDA)</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Sub Bidang 2.A</td>
                            <td>: Sub Bidang Pertanian dan Kemaritiman</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Sub Bidang 2.B</td>
                            <td>: Sub Bidang Pariwisata Industri dan Perdagangan</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Sub Bidang 2.C</td>
                            <td>: Sub Bidang Ekonomi, Keuangan dan Pendanaan</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Bidang 3</td>
                            <td>: Bidang Pemerintahan dan Pembangunan Manusia</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Sub Bidang 3.A</td>
                            <td>: Sub Bidang Pemerintahan dan Politik</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Sub Bidang 3.B</td>
                            <td>: Sub Bidang Pendidikan Mental dan Budaya</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Sub Bidang 3.C</td>
                            <td>: Sub Bidang Kesehatan dan Kesejahteraan Rakyat</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Bidang 4</td>
                            <td>: Bidang Infrastruktur dan Kewilayahan</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Sub Bidang 4.A</td>
                            <td>: Sub Bidang Pembangunan dan Infrastruktur</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Sub Bidang 4.B</td>
                            <td>: Sub Bidang Pengembangan Wilayah dan Tata Ruang</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Sub Bidang 4.C</td>
                            <td>: Sub Bidang Prasarana Wilayah dan Permukiman</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Bidang 5</td>
                            <td>: Bidang Penelitian dan Pengembangan</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Sub Bidang 5.A</td>
                            <td>: Sub Bidang Sosial dan Pemerintahan</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Sub Bidang 5.B</td>
                            <td>: Sub Bidang Ekonomi dan Pembangunan</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="font-weight-bold">Sub Bidang 5.C</td>
                            <td>: Sub Bidang Inovasi dan Teknologi</td>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div>

<svg class="footer-frame" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 79"><defs><style>.cls-2{fill:#5f4def;}</style></defs><title>footer-frame</title><path class="cls-2" d="M0,72.427C143,12.138,255.5,4.577,328.644,7.943c147.721,6.8,183.881,60.242,320.83,53.737,143-6.793,167.826-68.128,293-60.9,109.095,6.3,115.68,54.364,225.251,57.319,113.58,3.064,138.8-47.711,251.189-41.8,104.012,5.474,109.713,50.4,197.369,46.572,89.549-3.91,124.375-52.563,227.622-50.155A338.646,338.646,0,0,1,1920,23.467V79.75H0V72.427Z" transform="translate(0 -0.188)"/></svg>
<div class="footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <div class="footer-col first">
                    <h4>ABOUT BAPPEDA PROV. BENGKULU</h4>
                    <p class="p-small">Sebuah lembaga teknis daerah dibidang penelitian dan perencanaan pembangunan daerah yang dipimpin oleh seorang kepala badan yang berada dibawah dan bertanggung jawab kepada Gubernur melalui Sekretaris Daerah.</p>
                </div>
            </div> <!-- end of col -->
            <div class="col-md-4">
                <div class="footer-col last">
                    <h4>Address</h4>
                    <ul class="list-unstyled li-space-lg p-small">
                        <li class="media">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="media-body">Jl. Basuki Rachmat No.3, Padang Jati, Ratu Samban, Kota Bengkulu, Bengkulu 38222, Indonesia</div>
                        </li>
                    </ul>
                </div>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of footer -->
<!-- end of footer -->


<!-- Copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="p-small">Copyright © 2022 <a href="https://inovatik.com">Developed by Balqis Nabila Aulia Putri</a><br>
                    Template From <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div> <!-- end of col -->
        </div> <!-- enf of row -->
    </div> <!-- end of container -->
</div> <!-- end of copyright -->
<!-- end of copyright -->

@endsection

@push('addon-style')
    <style>
        .table tr th {
            padding: 1px !important;
        }
        .table-struktur tr td {
            padding: 5px !important;
        }
    </style>
@endpush

{{--
@push('addon-style')
    <link rel="stylesheet" href="{{ url('css/diagram.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('js/diagram.js') }}"></script>
    <script>
        let diagram = new dhx.Diagram("diagram_container", {
            type: "org",
            defaultShapeType: "img-card",
            scale: 0.9
        });
    </script>
    <script>
        diagram.data.load('{{ url('da.json') }}');
    </script>
@endpush --}}
