@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
          <li class="active">Perusahaan</li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Detail Perusahaan</h2>
          </div>
          <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-striped">
                            <tr>
                                <th>Nama Perusahaan</th>
                                <td>{{ $perusahaan->nama_perusahaan }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Perusahaan</th>
                                <td>{{ $perusahaan->alamat_perusahaan }}</td>
                            </tr>
                            <tr>
                                <th>Email Perusahaan</th>
                                <td>{{ $user[0]->email }}</td>
                            </tr>
                            <tr>
                                <th>No HP</th>
                                <td>{{ $perusahaan->no_tlp }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Perusahaan</th>
                                <td>{{ $perusahaan->jenis_perusahaan }}</td>
                            </tr>
                            <tr>
                                <th>Riwayat Upload</th>
                                <td>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Berkas</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @foreach ($laporan as $report)
                                        <tr>
                                            @if (isset($report->nama_file))
                                            <td>{{ $report->created_at->format('d M Y') }}</td>
                                            <td><a href="/berkas/{{ $report->nama_file }}" download="{{ $report->nama_file }}">{{ $report->nama_file }}</a></td>
                                            <td>
                                                {{ Form::open(['method' => 'DELETE', 'route' => ['laporan.destroy', $report->id_laporan]]) }}
                                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onsubmit' => 'return ConfirmDelete()']) }}
                                                {{ Form::close() }}
                                            </td>
                                            @else
                                            <td colspan="3">Data Kosong</td>
                                            @endif
                                        @endforeach
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
<script>

  function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
  }

</script>