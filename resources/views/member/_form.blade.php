<div class="form-group{{ $errors->has('nama_perusahaan') ? ' has-error' : '' }}">
  {!! Form::label('nama_perusahaan', 'Nama Perusahaan', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-8">
    {!! Form::text('nama_perusahaan', $perusahaan->nama_perusahaan, ['class'=>'form-control']) !!}
    {!! $errors->first('nama_perusahaan', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('alamat_perusahaan') ? ' has-error' : '' }}">
  {!! Form::label('alamat_perusahaan', 'Alamat Perusahaan', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-8">
    {!! Form::textarea('alamat_perusahaan', $perusahaan->alamat_perusahaan, ['class'=>'form-control','rows'=>'3']) !!}
    {!! $errors->first('alamat_perusahaan', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('no_tlp') ? ' has-error' : '' }}">
  {!! Form::label('no_tlp', 'Telp Perusahaan', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-8">
    {!! Form::text('no_tlp', $perusahaan->no_tlp, ['class'=>'form-control']) !!}
    {!! $errors->first('no_tlp', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
  {!! Form::label('email', 'Email Perusahaan', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-8">
    {!! Form::text('email', $perusahaan->email, ['class'=>'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
  {!! Form::label('password', 'Password', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-8">
    {{--  {!! Form::password('password', null, ['class'=>'form-control']) !!}  --}}
    {{ Form::password('password', array('class' => 'form-control','required','value' => null)) }}
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('jenis_perusahaan') ? ' has-error' : '' }}">
  {!! Form::label('jenis_perusahaan', 'Jenis Perusahaan', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-8">
    {{ Form::select('jenis_perusahaan', [
       'Perkayuan' => 'Perkayuan',
       'Perkebunan' => 'Perkebunan',
       'Pertambangan' => 'Pertambangan'], null,['class' => 'form-control']
    ) }}
    {!! $errors->first('jenis_perusahaan', '<p class="help-block">:message</p>') !!}
  </div>
</div>
 {{ Form::hidden('id', $perusahaan->id_perusahaan) }}
<div class="form-group">
  <div class="col-md-6 col-md-offset-4">
    {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
  </div>
</div>
