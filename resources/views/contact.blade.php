@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
          <li class="active">Contact Dev</li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Contact Form</h2>
          </div>
            <div class="panel-body">
                <div class="container">
                    <div class="col-md-5">
                        <div class="form-area">
                        @if(Session::has('message'))
                            <div class="alert alert-{{ Session::get('status') }} status-box">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                {{ Session::get('message') }}
                            </div>
                        @endif
                            <form action="contact/send" class="form-signin" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Message" rows="7"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Submit Form</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection