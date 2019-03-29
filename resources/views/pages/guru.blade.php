@extends('layouts.main')

@section('stylesheets')
  <link rel="stylesheet" href="/css/background.css">
  <link rel="stylesheet" href="/css/gtk.css">
@endsection

@section('title', 'GTK')

@section('content')
<div class="container-fluid container-me">
  <div class="row">
    <div class="col-md-12 card-gtk">

      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a  style="color: grey;" class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Guru</a>
        </li>
        <li class="nav-item">
          <a style="color: grey;"class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tendik</a>
        </li>
      </ul>
      <br>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="row">
            @foreach ($teachers as $teacher)
              <div class="col-6 col-xl-2 col-md-3 col-sm-4">
                <div class="card" style="margin-bottom: 30px">
                  <img src="{{asset('img/'. $teacher->image)}}" alt="" class="img-fluid">
                  <div class="card-body card-body-gtk" style="color: black;">
                    <p class="name-gtk"><b>{{$teacher->name}}</b></p>
                    <p class="mapel-gtk">{{$teacher->study->name}}</p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="row">
            @foreach ($administrator as $admin)
              <div class="col-md-2">
                <div class="card" style="margin-bottom: 30px">
                  <img src="{{asset('img/'. $admin->image)}}" alt="" class="img-fluid">
                  <div class="card-body" style="color: black;">
                    <b>{{$admin->name}}</b><br>
                    <small>{{$admin->role->name}}</small>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
@endsection
