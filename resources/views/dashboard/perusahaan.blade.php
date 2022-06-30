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
            {{-- {!! Form::model($perusahaan, ['url' => route('perusahaan.update', $perusahaan->id_perusahaan),
              'method'=>'put', 'class'=>'form-horizontal']) !!}
            <div class="form-group{{ $errors->has('nama_perusahaan') ? ' has-error' : '' }}">
              {!! Form::label('nama_perusahaan', 'Nama Perusahaan', ['class'=>'col-md-2 control-label']) !!}
              <div class="col-md-4">
                {!! Form::text('nama_perusahaan', null, ['class'=>'form-control']) !!}
                {!! $errors->first('nama_perusahaan', '<p class="help-block">:message</p>') !!}
              </div>
            </div>

            <div class="form-group{{ $errors->has('alamat_perusahaan') ? ' has-error' : '' }}">
              {!! Form::label('alamat_perusahaan', 'Alamat Perusahaan', ['class'=>'col-md-2 control-label']) !!}
              <div class="col-md-8">
                {!! Form::text('alamat_perusahaan', null, ['class'=>'form-control']) !!}
                {!! $errors->first('alamat_perusahaan', '<p class="help-block">:message</p>') !!}
              </div>
            </div>

            <div class="form-group{{ $errors->has('no_tlp') ? ' has-error' : '' }}">
              {!! Form::label('no_tlp', 'Telp Perusahaan', ['class'=>'col-md-2 control-label']) !!}
              <div class="col-md-4">
                {!! Form::text('no_tlp', null, ['class'=>'form-control']) !!}
                {!! $errors->first('no_tlp', '<p class="help-block">:message</p>') !!}
              </div>
            </div>

            <div class="form-group{{ $errors->has('email_perusahaan') ? ' has-error' : '' }}">
              {!! Form::label('email_perusahaan', 'Email Perusahaan', ['class'=>'col-md-2 control-label']) !!}
              <div class="col-md-4">
                {!! Form::text('email_perusahaan', null, ['class'=>'form-control']) !!}
                {!! $errors->first('email_perusahaan', '<p class="help-block">:message</p>') !!}
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-4 col-md-offset-2">
                {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
              </div>
            </div>
            {!! Form::close() !!}
          </div> --}}
        </div>
      </div>
    </div>
  </div>
@endsection
