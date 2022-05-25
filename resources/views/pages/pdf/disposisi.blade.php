<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Disposisi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Times New Roman';
            line-height: normal;
        }

        h5 {
            margin-bottom: -3px;
        }

        p,
        span {
            margin-bottom: -3px;
            font-size: 22px;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #000 !important;
            padding: 14px !important;
        }

        .table-borderless tr td {
            padding: 3px !important;
            border: 0px solid #fff !important;
        }

        table tr td,
        table tr th {
            font-size: 20px;
        }

        table tr th {
            padding: 2px !important;
        }

        table tr td {
            padding: 7px !important;
        }
    </style>
</head>

<body>
    <div class="container" style="padding-left: 50px; padding-right: 50px;">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td style="width: 5%;">
                        <img src="{{ url('logo.png') }}" alt="" srcset="" style=" width: 90px;">
                    </td>
                    <td class="text-center">
                        <h5 class="font-weight-bold">PEMERINTAH PROVINSI BENGKULU</h5>
                        <h5 style="margin-top: 3px;" class="font-weight-bold">BADAN PERENCANAAN, PENELITIAN DAN
                            PENGEMBANGAN DAERAH</h5>
                        <p style="font-size: 16px; margin-top: 4px;">Jl. Pembangunan Nomor 15 Padang Harapan Bengkulu
                            38225</p>
                        <p style="font-size: 16px; margin-top: 4px;">Telepon/Fax: (0736) 21255 - 21502</p>
                        <p style="font-size: 16px; margin-top: 4px;">Email: bappeda@bengkuluprov.go.id</p>
                    </td>
                    <td style="width: 8%;"></td>
                </tr>
            </tbody>
        </table>
        <hr style="border: 2px solid #000; margin-top: -15px;">
        <table class="table table-bordered">
            <tbody>
                <tr class="text-center">
                    <th colspan="2">L E M B A R &nbsp;&nbsp;&nbsp; D I S P O S I S I</th>
                </tr>
                <tr>
                    <td style="width: 50%; padding: 10px !important;">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="width: 25%;">Surat dari</td>
                                    <td style="width: 3%;">:</td>
                                    <td>Dinas Perpustakaan dan Kearsipan</td>
                                </tr>
                                <tr>
                                    <td>No. Surat</td>
                                    <td>:</td>
                                    <td>{{ $item->surat_masuk->nomor_surat }}</td>
                                </tr>
                                <tr>
                                    <td>Tgl. Surat</td>
                                    <td>:</td>
                                    <td>{{ \Carbon\Carbon::parse($item->surat_masuk->tanggal_surat)->translatedFormat('d F Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="width: 50%; padding: 10px !important;">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="width: 30%;">Diterima Tgl</td>
                                    <td style="width: 3%;">:</td>
                                    <td>{{ \Carbon\Carbon::parse($item->surat_masuk->tanggal_sekretariat)->translatedFormat('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <td>No. Agenda</td>
                                    <td>:</td>
                                    <td>{{ $item->surat_masuk->no_agenda }}</td>
                                </tr>
                                <tr>
                                    <td>Sifat</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="padding-top: 16px !important;">
                                        <label>
                                            <input type="checkbox" style="transform: scale(1.5);">&nbsp;&nbsp;Sangat
                                            Segera
                                        </label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <label>
                                            <input type="checkbox" style="transform: scale(1.5);">&nbsp;&nbsp;Segera
                                        </label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <label>
                                            <input type="checkbox" style="transform: scale(1.5);">&nbsp;&nbsp;Rahasia
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 10px !important;">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="width: 12%;">Perihal</td>
                                    <td style="width: 1.5%;">:</td>
                                    <td>Undangan dan mohon karangan bunga</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%; padding: 10px !important;">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Diteruskan kepada Sdr.:</td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 10px !important;">
                                        <label>
                                            <input type="checkbox" style="transform: scale(1.8);">&nbsp;&nbsp;Sekretaris
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 30px !important;">
                                        <label>
                                            <input type="checkbox" style="transform: scale(1.8);">&nbsp;&nbsp;Kasubbag
                                            Umum dan Perlengkapan
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 30px !important;">
                                        <label>
                                            <input type="checkbox" style="transform: scale(1.8);">&nbsp;&nbsp;Kasubbag
                                            Keuangan
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 6%;"><input type="checkbox"
                                                            style="transform: scale(1.8);"></td>
                                                    <td>Kepala Bidang Perencanaan, Pengendalian, dan Evaluasi
                                                        Pembangunan Daerah </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr style="margin: 0px !important;">
                                                    <td style="width: 6%;"><input type="checkbox"
                                                            style="transform: scale(1.8);"></td>
                                                    <td>Kepala Bidang Perekonomian dan Sumber Daya Alam </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 6%;"><input type="checkbox"
                                                            style="transform: scale(1.8);"></td>
                                                    <td>Kepala Bidang Pemerintahan dan Pembangunan Manusia </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 6%;"><input type="checkbox"
                                                            style="transform: scale(1.8);"></td>
                                                    <td>Kepala Bidang Infrastruktur dan Kewilayahan </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 6%;"><input type="checkbox"
                                                            style="transform: scale(1.8);"></td>
                                                    <td>Kepala Bidang Penelitian dan Pengembangan </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 6%;"><input type="checkbox"
                                                            style="transform: scale(1.8);"></td>
                                                    <td>......................................................... </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="width: 50%; padding: 10px !important;">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Diteruskan kepada Sdr.:</td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 10px !important;">
                                        <label>
                                            <input type="checkbox" style="transform: scale(1.3);">&nbsp;&nbsp;Tanggapan
                                            dan Saran
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox" style="transform: scale(1.3);">&nbsp;&nbsp;Proses
                                            lebih lanjut
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox"
                                                style="transform: scale(1.3);">&nbsp;&nbsp;Koordinasi/konfirmasikan
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox" style="transform: scale(1.3);">&nbsp;&nbsp;Pelajari
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox" style="transform: scale(1.3);">&nbsp;&nbsp;Untuk
                                            ditindak lanjuti
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox" style="transform: scale(1.3);">&nbsp;&nbsp;Untuk
                                            diketahui/perhatian
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox"
                                                style="transform: scale(1.3);">&nbsp;&nbsp;Hadiri/wakili
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox" style="transform: scale(1.3);">&nbsp;&nbsp;File/Arsip
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox"
                                                style="transform: scale(1.3);">&nbsp;&nbsp;..............................................................
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 10px !important;">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="width: 6%;">Catatan</td>
                                    <td style="width: 1%;">:</td>
                                    <td>Undangan dan mohon karangan bunga</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%; padding: 10px !important; border-right: #fff solid 1px !important;">

                    </td>
                    <td style="width: 50%; padding: 10px !important; border-left: #fff solid 1px !important;"
                        class="text-center">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Kepala BAPPEDA Provinsi Bengkulu</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold"
                                        style="text-decoration: underline; padding-top: 100px !important;">ISNAN FAJRI.
                                        S.Sos. M.Kes.</td>
                                </tr>
                                <tr>
                                    <td>Pembina Utama Muda</td>
                                </tr>
                                <tr>
                                    <td>NIP . 196606201987031009</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
<script>
    window.print()
</script>
</html>
