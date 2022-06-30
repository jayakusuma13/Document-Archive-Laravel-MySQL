<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="e-SPT Widyaiswara">
  <meta name="author" content="Wawan Setiawan">
  <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.png') }}">
  <title>Cetak Surat Tugas</title>
  <link href="{{ URL::asset('assets/css/normalize.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/css/paper.css') }}" rel="stylesheet">
  <style>@page { size: F4 }</style>
</head>

<body class="F4 style2" onload="window.print()">
  <section class="sheet padding-25mm">
    <div>
      <h2>LAPORAN PERUSAHAAN </h2>
      {{--  <div class="nomor2"><strong>Nomor : 090.1/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/III/DIKLAT PROV/2016</strong></div>  --}}
    </div>
    <div>
      <div class="kepala2">Melaksanakan Kegiatan Widyaiswara</div>
    </div>
      <div style="padding-top: 20px; padding-bottom: 20px">Untuk melakukan kegiatan dengan rincian sebagai berikut :</div>
      <table width="105%" border="1" class="table2">
        <col style="width:3%">
        <col style="width:25%">
        <col style="width:8%">
        <col style="width:12%">
        <col style="width:12%">
        <col style="width:13%">
        <col style="width:9%">
        <col style="width:13%">
        <thead>
          <th>No.</th>
          <th>Uraian Kegiatan</th>
          <th>Kode Butir Kegiatan</th>
          <th>Tempat / Instansi</th>
          <th>Tanggal, Bulan, Tahun</th>
          <th>Jam</th>
          <th>Jumlah Vol. Kegiatan</th>
          <th>Ket.</th>
        </thead>
        <tbody>
          <tr>
            <td style="font-size: 7pt; text-align: center">1</td>
            <td style="font-size: 7pt; text-align: center">2</td>
            <td style="font-size: 7pt; text-align: center">3</td>
            <td style="font-size: 7pt; text-align: center">4</td>
            <td style="font-size: 7pt; text-align: center">5</td>
            <td style="font-size: 7pt; text-align: center">6</td>
            <td style="font-size: 7pt; text-align: center">7</td>
            <td style="font-size: 7pt; text-align: center">8</td>
          </tr>
          <?php
            $i = 1;
            $row = count($kegiatan);
          ?>
          @foreach ($kegiatan as $kgt)
          <tr>
            <td style="text-align: center">{{ $i }}</td>
            <td>{{ $kgt->uraian }}</td>
            <td style="text-align: center">{{ $kgt->kodebutir }}</td>
            <td style="text-align: center">{{ $kgt->tempat }}</td>
            <td style="text-align: center">{{ Carbon::createFromFormat('Y-m-d', $kgt->tanggal)->format('d-m-Y') }}</td>
            <td style="text-align: center">{{ $kgt->jam }}</td>
            <td style="text-align: center">{{ $kgt->jumlahvol }}</td>
            @if ($row > 1)
              @if ($i++ === 1)
                <td rowspan="{{ $row }}">{{ $kgt->ket }}</td>
              @endif
            @else
              <td>{{ $kgt->ket }}</td>
            @endif
          </tr>
          @endforeach
        </tbody>
      <table>
    </div>
    <div>
      <div>&nbsp;</div>
      <div>Demikian surat tugas ini dibuat, untuk dapat dipergunakan sebagaimana mestinya.</div>
    </div>
    <div>
      <div>&nbsp;</div>
      <div>&nbsp;</div>
    </div>
    <div>
      <table width="100%">
        <col style="width:53%">
        <col style="width:47%">
        <tbody>
          <tr>
            <td>&nbsp;</td>
            <td class="sign">{{ $spt->surat_kota }}, <span id="spt-tanggal"></span></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="sign">@if ($spt->level != 1) an. @endif Kepala Badan Diklat Prov. Kaltim,</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="sign">&nbsp;</td>
          <td class="sign" style="text-decoration: underline;"><strong>{{ $spt->pejabat_nama }}</strong></td>
        </tr>
        <tr>
          <td class="sign">&nbsp;</td>
          <td class="sign">{{ $spt->pejabat_pangkat }}</td>
        </tr>
        <tr>
          <td class="sign">&nbsp;</td>
          <td class="sign">NIP. {{ $spt->pejabat_nip }}</td>
        </tr>
        </tbody>
      </table>
    </div>
  </section>

  <script src="{{ URL::asset('assets/plugins/jquery/jquery-1.11.1.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/terbilang.js') }}"></script>

  <script>
    $(document).ready(function() {
      calDurasi();
      changeTanggal();
    });

    function calDurasi() {
      var date1 = new Date("{{ $spt->tgl_berangkat }}");
      var date2 = new Date("{{ $spt->tgl_kembali }}");
      var timeDiff = Math.abs(date2.getTime() - date1.getTime());
      var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1;
      var hasil = terbilang(diffDays);

      $("#spt-durasi").html(diffDays + " (" + hasil.trim() + ") hari");
    }

    function changeTanggal() {
      var nbln = ["Januari", "Febuari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
      var tgl = "{{ Carbon::createFromFormat('Y-m-d', $spt->surat_tgl)->format('d') }}";
      var bln = parseInt("{{ Carbon::createFromFormat('Y-m-d', $spt->surat_tgl)->format('m') }}");
      var thn = "{{ Carbon::createFromFormat('Y-m-d', $spt->surat_tgl)->format('Y') }}";
      var tanggal = tgl + " " + nbln[bln-1] + " " + thn;
      $("#spt-tanggal").html(tanggal);
    }
  </script>

</body>
</html>
