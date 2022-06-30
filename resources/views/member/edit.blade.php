@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <ul class="breadcrumb">
        <li><a href="{{ url('/home') }}">Dashboard</a></li>
        <li><a href="{{ url('/admin/perusahaan') }}">Perusahaan</a></li>
        <li class="active">Edit Data Perusahaan</li>
    </ul>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">Edit Data Perusahaan</h2>
        </div>
        <div class="panel-body">
          {{--  {!! Form::model($perusahaan, ['url' => route('laporan.update', $perusahaan->id_perusahaan),
            'method'=>'put', 'class'=>'form-horizontal']) !!}  --}}
          {{--  {{ Form::open(array('url' => 'user/data/update', 'class' => 'form-horizontal', 'method' => 'put')) }}  --}}
          {!! Form::model($perusahaan, ['action' => 'HomeController@update','class' => 'form-horizontal']) !!}
          @include('member._form')
          {!! Form::close() !!}
        </div>
    </div>
  </div>

    <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">Upload Dokumen</h2>
            </div>
            <div class="panel-body">
             <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <form name="form_upload" id="form-upload" action="{{ action('HomeController@simpan') }}" role="form" class="form-validation" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <input name="_method" id="form-upload-method" type="hidden" value="POST">
            <input name="id_perusahaan" id="upload-berkas-perusahaan" type="hidden" value="{{ $perusahaan->id_perusahaan }}">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Upload Dokumen</label>
                  <input type="file" name="nama_file" required />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="pull-right">
                  <button type="submit" class="btn btn-embossed btn-primary m-r-0"><i class="fa fa-floppy-o"></i> Simpan &amp; Proses</button>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection
