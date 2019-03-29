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
          <div class="card-body">
            {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT']) !!}
              <div class="form-group">
                <label for="name">Name :</label>
                <input type="text" name="name" value="{{(old('name')) ? old('name') : $role->name}}" class="form-control">
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
  <br><br><br>
@endsection
