@extends('layouts.main')

@section('stylesheets')
	<link rel="stylesheet" href="/css/background.css">
@endsection

@section('title', 'Create Embed')

@section('stylesheets')

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
					<form method="POST" action="/videos">
						{{ csrf_field() }}
					  <div class="form-group">
					    <label for="exampleInputEmail1">Embed :</label>
					    <input type="text" class="form-control" name="embed" value="{{old('embed')}}">
					    @if($errors->has('embed'))
					    <small id="emailHelp" class="form-text text-danger">
					    		{{$errors->first('embed')}}
					    </small>
					    @endif
					  </div>
					  <div class="form-group">
					    <label for="exampleFormControlTextarea1">Description :</label>
					    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{old('description')}}</textarea>
					    @if($errors->has('description'))
					    <small id="emailHelp" class="form-text text-danger">
					    		{{$errors->first('description')}}
					    </small>
					    @endif
					  </div>
			  		<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
@endsection
