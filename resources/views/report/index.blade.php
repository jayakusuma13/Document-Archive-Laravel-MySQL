@extends('layouts.app')
@section('content')
<div class="container">
  <ul class="breadcrumb">
      <li><a href="{{ url('/home') }}">Dashboard</a></li>
      <li class="active">Laporan</li>
  </ul>
  <div class="row">
    <div class="col-md-12">  
      <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Print Out Perusahaan</h2>
        </div>
          <div class="panel-body">
            <div class="form-group">
              <div class="col-md-6">
                <form method="POST" class="form-horizontal form-validation" action="{{ action('LaporanController@laporan_terpilih')  }}">
                  {!! csrf_field() !!}
                  <div class="form-group">
                    {!! Form::label('nama_perusahaan', 'Nama Perusahaan:', array('class' => 'col-md-4 control-label t-right')) !!}
                    <select name="id_perusahaan" class="col-md-6 control-label">
                        @foreach ($perusahaan as $data)
                        <option name="id_perusahaan" class="form-control" value="{{ $data->id_perusahaan }}" required>{{ $data->nama_perusahaan }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="col-md-4 control-label">&nbsp;
                    </label>
                    <div class="pull-left">
                        <button type="submit" formtarget="_blank" class="btn btn-embossed btn-primary">Lihat Data</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-6">
                <form method="POST" class="form-horizontal form-validation" action="{{ action('LaporanController@laporan_all')  }}">
                {!! csrf_field() !!}
                <label class="col-md-6 control-label">Tampilkan semua data:</label>
                    <div class="pull-left">
                      <button type="submit" formtarget="_blank" class="btn btn-embossed btn-primary">Lihat Data</button>
                    </div>
                </form>
            </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection