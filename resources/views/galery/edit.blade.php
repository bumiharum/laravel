@extends('layouts.main')

@section('title', 'New Create Image')

@section('stylesheets')
	<link rel="stylesheet" href="/css/background.css">
@endsection

@section('content')
<div class="container-fluid container-me">
	<div class="row justify-content-md-center">
		<div class="col-md-6">
			<div class="card">
	      <div class="card-header">
	        New Create
	      </div>
				<img src="{{asset('img/'. $galery->image)}}" alt="" class="img-fluid">
					<div class="card-body">
						<form method="POST" action="/galery/{{$galery->id}}" enctype="multipart/form-data">
				      {{ csrf_field() }}
							<input type="hidden" name="_method" value="PUT">
						 	<div class="form-group">
					      <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
					      @if ($errors->has('image'))
					        <small class="text-danger">{{$errors->first('image')}}</small>
					      @endif
				    	</div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Description :</label>
						    <input type="text" class="form-control" name="description" value="{{(old('description')) ? old('description') : $galery->description}}">
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
