@extends('layouts.home')

@section('content')
<!-- Header -->
<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Scan Surat</h1>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<!-- end of header -->


<!-- Breadcrumbs -->
<div class="ex-basic-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs">
                    <a href="{{ route('home') }}">Home</a><i class="fa fa-angle-double-right"></i><span>Scan Surat</span>
                </div> <!-- end of breadcrumbs -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-1 -->
<!-- end of breadcrumbs -->


<!-- Privacy Content -->
<div class="ex-basic-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-container">
                    <div class="card-body text-center">
                        <div class="card-title text-center mt-3">
                            <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <input type="radio" name="options" value="1" autocomplete="off" checked> Kamera Depan
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" value="2" autocomplete="off"> Kamera Belakang
                                </label>
                            </div>
                        </div>
                        <video id="preview" style="width: 100%;"></video>
                    </div>
                </div>
            </div>
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-2 -->
<!-- end of privacy content -->


<!-- Breadcrumbs -->
<div class="ex-basic-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs">
                    <a href="{{ route('home') }}">Home</a><i class="fa fa-angle-double-right"></i><span>Scan Surat</span>
                </div> <!-- end of breadcrumbs -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-1 -->
<!-- end of breadcrumbs -->

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

@push('addon-script')
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script>
    $(document).ready(function () {
        var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
        if ('mediaDevices' in navigator && 'getUserMedia' in navigator.mediaDevices) {
            console.log("Let's get this party started")
            navigator.mediaDevices.getUserMedia({video: true})
        }
        scanner.addListener('scan',function(content){
            $.ajax({
                url: `{{ route('scanning') }}`,
                type: 'get',
                data: {
                    'qr_code' : content
                },
                dataType: 'json',
                success: function (response) {
                    if (response != null) {
                        if(response.hasil === 'ada'){
                            window.open(response.route, '_blank');
                        }else {
                            Swal.fire({
                                icon: "error",
                                title: "Mohon Maaf",
                                text: 'Scan Kembali Qr-Code'
                            });
                        }
                    }
                }
            });
        });
        Instascan.Camera.getCameras().then(function (cameras){
            if(cameras.length>0){
                scanner.start(cameras[0]);
                $('[name="options"]').on('change',function(){
                    if($(this).val()==1){
                        if(cameras[0]!=""){
                            scanner.start(cameras[0]);
                        }else{
                            alert('No Front camera found!');
                        }
                    }else if($(this).val()==2){
                        if(cameras[1]!=""){
                            scanner.start(cameras[1]);
                        }else{
                            alert('No Back camera found!');
                        }
                    }
                });
            }else{
                console.error('No cameras found.');
                alert('No cameras found.');
            }
        }).catch(function(e){
            console.error(e);
            alert(e);
        });
    });
</script>
@endpush

