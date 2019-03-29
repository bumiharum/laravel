@extends('layouts.main')

@section('title', 'New Create')

@section('stylesheets')
	<link rel="stylesheet" href="/css/background.css">
@endsection

@section('title', 'New Create')

@section('content')
<div class="container-fluid container-me">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card">
	      <div class="card-header">
	        New Create
	      </div>
				<div class="card-body">
					<form method="POST" action="/extras" enctype="multipart/form-data">
						{{ csrf_field() }}
					 	<div class="form-group">
				      <label>Image :</label>
				      <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
				      @if ($errors->has('image'))
				        <small class="text-danger">{{$errors->first('image')}}</small>
				      @endif
				    </div>
						<div class="form-group">
							<label for="">Description :</label>
							<textarea name="description" class="form-control" rows="8" cols="80">{{old('description')}}</textarea>
							@if($errors->has('description'))
					    <small id="emailHelp" class="form-text text-danger">
					    		{{$errors->first('description')}}
					    </small>
					    @endif
						</div>
						<div class="form-group">
					    <label for="exampleFormControlSelect1">Extracurricular :</label>
					    <select class="form-control" id="exampleFormControlSelect1" name="extracurricular_id">
								<option value="">-</option>
								@foreach ($extracurriculars as $extra)
									<option value="{{$extra->id}}">{{$extra->name}}</option>
								@endforeach
					    </select>
							@if($errors->has('extracurricular_id'))
					    <small id="emailHelp" class="form-text text-danger">
					    		{{$errors->first('extracurricular_id')}}
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
