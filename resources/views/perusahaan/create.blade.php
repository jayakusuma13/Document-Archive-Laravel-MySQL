@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb">
              <li><a href="{{ url('/home') }}">Dashboard</a></li>
              <li><a href="{{ url('/admin/perusahaan') }}">Perusahaan</a></li>
              <li class="active">Tambah Data Perusahaan</li>
          </ul>

          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">Tambah Data Perusahaan</h2>
            </div>
            <div class="panel-body">
              {!! Form::open(['url' => route('perusahaan.store'),
              'method' => 'post', 'class'=>'form-horizontal']) !!}
              @include('perusahaan._form')
              {!! Form::close() !!}
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
