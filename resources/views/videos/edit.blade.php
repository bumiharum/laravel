@extends('layouts.main')

@section('title', 'New Create Image')

@section('stylesheets')
	<link rel="stylesheet" href="/css/background.css">
@endsection

@section('content')
<div class="container container-me">
	<div class="row justify-content-md-center">
		<div class="col-md-6">
			<div class="card">
        <div class="card-header">
          New Create
        </div>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe src="{{$video->embed}}" class="embed-responsive-item"></iframe>
        </div>
				<div class="card-body">
					<form method="POST" action="/videos/{{$video->id}}">
		        {{ csrf_field() }}
						<input type="hidden" name="_method" value="PUT">

		        <div class="form-group">
		    	    <label for="exampleInputEmail1">Embed</label>
		    	    <input type="text" class="form-control" name="embed" value="{{(old('embed')) ? old('embed') : $video->embed}}">
		    	    @if($errors->has('embed'))
		    	    <small id="emailHelp" class="form-text text-danger">
		    	    		{{$errors->first('embed')}}
		    	    </small>
		    	    @endif
		    	  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Description</label>
					    <input type="text" class="form-control" name="description" value="{{(old('description')) ? old('description') : $video->description}}">
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
