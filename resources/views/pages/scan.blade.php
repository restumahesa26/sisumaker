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

