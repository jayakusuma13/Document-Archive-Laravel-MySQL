@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Data Perusahaan</h2>
          </div>
          <div class="panel-body">
               <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-striped">
                            <tr>
                                <th>Nama Perusahaan</th>
                                <td>{{ $perusahaan[0]->nama_perusahaan }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Perusahaan</th>
                                <td>{{ $perusahaan[0]->alamat_perusahaan }}</td>
                            </tr>
                            <tr>
                                <th>Email Perusahaan</th>
                                <td>{{ $perusahaan[0]->email }}</td>
                            </tr>
                            <tr>
                                <th>No HP</th>
                                <td>{{ $perusahaan[0]->no_tlp }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Perusahaan</th>
                                <td>{{ $perusahaan[0]->jenis_perusahaan }}</td>
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
                                        @foreach ($perusahaan as $report)
                                        <tr>
                                            @if (isset($report->nama_file))
                                            <td>{{ date('d M Y',strtotime($report->created_at)) }}</td>
                                            <td><a href="/berkas/{{ $report->nama_file }}" download="{{ $report->nama_file }}">{{ $report->nama_file }}</a></td>
                                            <td>
                                                {{ Form::open(['method' => 'DELETE', 'route' => ['data.hapus', $report->id_laporan]]) }}
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
