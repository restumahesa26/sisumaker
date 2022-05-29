@extends('layouts.home')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Detail Surat</li>
        </ol>
        <h2>Detail Surat</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>Nomor Surat</th>
                    <th>Dimasukkan oleh Sekretariat</th>
                    <th>Diverifikasi oleh Sekretaris</th>
                    <th>Diverifikasi oleh Pimpinan</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>{{ $item->nomor_surat }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_sekretariat)->translatedFormat('d F Y H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_sekretaris)->translatedFormat('d F Y H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pimpinan)->translatedFormat('d F Y H:i') }}</td>
                </tr>
            </tbody>
        </table>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
