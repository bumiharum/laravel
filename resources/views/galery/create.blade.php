@extends('layouts.main')

@section('title', 'New Create Image')

@section('stylesheets')
	<link rel="stylesheet" href="/css/background.css">
@endsection

@section('content')
<div class="container-fluid container-me">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card">
	      <div class="card-header">
	        New Create
	      </div>
				<div class="card-body">
					<form method="POST" action="/galery" enctype="multipart/form-data">
						{{ csrf_field() }}

					 	<div class="form-group">
			        <label>Image :</label>
			        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
			        @if ($errors->has('image'))
			          <small class="text-danger">{{$errors->first('image')}}</small>
			        @endif
			      </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Description :</label>
					    <input type="text" class="form-control" name="description" value="{{old('description')}}">
					    @if($errors->has('description'))
					    <small id="emailHelp" class="form-text text-danger">
					    		{{$errors->first('description')}}
					    </small>
					    @endif
					  </div>
			  		<button type="submit" class="btn btn-dark">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
@endsection
