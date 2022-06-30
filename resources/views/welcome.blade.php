@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Selamat datang di Aplikasi Penyimpanan Berkas Online</div>
            <div class="panel-body">
              @if (Auth::guest())
                  Silahkan Login
              @else
                Anda login sebagai {{ Auth::user()->name }}
              @endif
            </div>
        </div>
      </div>
    </div>
    
  </div>
@endsection
