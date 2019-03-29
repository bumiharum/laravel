@extends('layouts.main')

@section('title', 'Edit')

@section('stylesheets')
<link rel="stylesheet" href="/css/background.css">
@endsection

@section('title', 'Edit')

@section('content')
<div class="container-fluid container-me">
	<div class="row justify-content-md-center">
		<div class="col-md-3">
			<div class="card">
	      <div class="card-header">
	        Edit
	      </div>
				<img src="{{asset('img/'. $achievement->image)}}" alt="" class="img-fluid">
				<div class="card-body">
					{!! Form::model($achievement, ['route' => ['achievements.update', $achievement->id], 'method' => 'PUT', 'files' => true]) !!}

					 	<div class="form-group">
				      <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
				      @if ($errors->has('image'))
				        <small class="text-danger">{{$errors->first('image')}}</small>
				      @endif
				    </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Name :</label>
					    <input type="text" class="form-control" name="name" value="{{(old('name')) ? old('name') : $achievement->name}}">
					    @if($errors->has('name'))
					    <small id="emailHelp" class="form-text text-danger">
					    		{{$errors->first('name')}}
					    </small>
					    @endif
					  </div>
						<div class="form-group">
							<label for="description">Description :</label>
							<textarea name="description" rows="8" cols="80" class="form-control">{{(old('description')) ? old('description') : $achievement->description}}</textarea>
						</div>
	  				<button type="submit" class="btn btn-dark">Submit</button>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
<br>

@endsection
