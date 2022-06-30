@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                
                <div class="panel-body">
                  {!! Form::open(['url'=>'/register', 'class'=>'form-horizontal']) !!}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  {!! Form::label('name', 'Nama Perusahaan', ['class'=>'col-md-4 control-label']) !!}
                  <div class="col-md-6">
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group{{ $errors->has('jenis_perusahaan') ? ' has-error' : '' }}">
                  {!! Form::label('jenis_perusahaan', 'Jenis Perusahaan', ['class'=>'col-md-4 control-label']) !!}
                  <div class="col-md-4">
                    {{ Form::select('jenis_perusahaan', [
                      'Perkayuan' => 'Perkayuan',
                      'Perkebunan' => 'Perkebunan',
                      'Pertambangan' => 'Pertambangan'], null,['class' => 'form-control']
                    ) }}
                    {!! $errors->first('jenis_perusahaan', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group{{ $errors->has('alamat_perusahaan') ? ' has-error' : '' }}">
                  {!! Form::label('alamat_perusahaan', 'Alamat Perusahaan', ['class'=>'col-md-4 control-label']) !!}
                  <div class="col-md-6">
                    {!! Form::textarea('alamat_perusahaan', null, ['class'=>'form-control','rows'=>'3']) !!}
                    {!! $errors->first('alamat_perusahaan', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  {!! Form::label('no_tlp', 'No Tlp Perusahaan', ['class'=>'col-md-4 control-label']) !!}
                  <div class="col-md-6">
                    {!! Form::text('no_tlp', null, ['class'=>'form-control']) !!}
                    {!! $errors->first('no_tlp', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  {!! Form::label('email', 'Alamat Email', ['class'=>'col-md-4 control-label']) !!}
                  <div class="col-md-6">
                    {!! Form::email('email', null, ['class'=>'form-control']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  {!! Form::label('password', 'Password', ['class'=>'col-md-4 control-label']) !!}
                  <div class="col-md-6">
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                  {!! Form::label('password_confirmation', 'Konfirmasi Password', ['class'=>'col-md-4 control-label']) !!}
                  <div class="col-md-6">
                    {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                    {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> Daftar
                    </button>
                  </div>
                </div>

                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
