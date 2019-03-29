@extends('layouts.main')

@section('stylesheets')
  <link rel="stylesheet" href="/css/background.css">
@endsection

@section('title', 'Edit')

@section('content')
  <div class="container container-me">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="{{asset('img/'. $infrastructure->image)}}" class="img-fluid">
          <div class="card-body">
            {!! Form::model($infrastructure, ['route' => ['infrastructures.update', $infrastructure->id], 'method' => 'PUT', 'files' => true]) !!}
              <div class="form-group">
  			        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
  			        @if ($errors->has('image'))
  			          <small class="text-danger">{{$errors->first('image')}}</small>
  			        @endif
  		      	</div>
              <div class="form-group">
                <label for="name">Name :</label>
                <input type="text" name="name" value="{{(old('name')) ? old('name') : $infrastructure->name}}" class="form-control">
                @if ($errors->has('name'))
  				        <small class="text-danger">{{$errors->first('name')}}</small>
  				      @endif
              </div>
              <div class="form-group">
                <button class="btn btn-danger btn-sm" type="submit">Submit</button>
              </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
@endsection
