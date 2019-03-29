@extends('layouts.main')

@section('stylesheets')
  <link rel="stylesheet" href="/css/pgwslider.min.css">
  <link rel="stylesheet" href="/css/background.css">
  <link rel="stylesheet" href="/css/sarpras.css">
@endsection

@section('title', 'SARPRAS PIC')

@section('content')
  <div class="container container-me">
    <div class="row">
      <div class="col-md-12 container-sarpras">
        <ul class="pgwSlider">
          @foreach ($extracurricular->extras as $extra)
          <li>
            <img src="{{asset('img/'. $extra->image)}}" class="img-fluid">
            <span class="text-uppercase">{{$extra->description}}</span>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
      <br>
    <div class="row">
      @foreach ($extracurriculars as $extra)
      <div class="col-6 col-xl-3 col-lg-4 col-md-4 col-sm-4">
        <div class="card">
          <img src="{{asset('img/'. $extra->image)}}" alt="" class="img-fluid">
          <div class="card-body">
            <h4 class="text-center text-uppercase"><a href="/eskul/{{$extra->name}}" style="color: black;">{{$extra->name}}</a></h4>
          </div>
        </div><br>
      </div>
      @endforeach
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript" src="/js/pgwslider.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    // $('.pgwSlider').pgwSlider();
    var pgwSlider = $('.pgwSlider').pgwSlider();

    pgwSlider.reload({
      // displayList : false,
      maxHeight : 500,
      displayControls: true,
      intervalDuration : 4000
    });
  });
  </script>
@endsection
