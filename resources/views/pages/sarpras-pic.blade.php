@extends('layouts.main')

@section('stylesheets')
  <link rel="stylesheet" href="/css/background.css">
  <link rel="stylesheet" href="/css/sarpras.css">
@endsection

@section('title', 'SARPRAS')

@section('content')
  <div class="container container-me ">
      <div class="row">
        @foreach ($infrastructures as $infrastructure)
        <div class="col-6 col-xl-3 col-lg-4 col-md-4 col-sm-4 container-sarpras">
          <div class="card card-sarpras">
            <img src="{{asset('img/'. $infrastructure->image)}}" alt="" class="img-fluid">
            <div class="card-body card-body-sarpras">
              <h4 class="text-center d text-uppercase"><a href="/sarpras/{{$infrastructure->name}}" style="color: black;">{{$infrastructure->name}}</a></h4>
            </div>
          </div><br>
        </div>
        @endforeach
      </div>
  </div>
@endsection
