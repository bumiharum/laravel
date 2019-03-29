@extends('layouts.main')

@section('stylesheets')
	<link rel="stylesheet" href="/css/background.css">
@endsection

@section('title', 'Create Post')

@section('content')
<div class="container-fluid container-me">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card">
				<div class="card-header">
					New Create
				</div>
				<div class="card-body">
					<form method="POST" action="/posts" enctype="multipart/form-data">
						{{ csrf_field() }}
					 	<div class="form-group">
				      <label>Image :</label>
				      <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
				      @if ($errors->has('image'))
				        <small class="text-danger">{{$errors->first('image')}}</small>
				      @endif
				    </div>
						<div class="form-group">
							<label for="">Category :</label>
							<select name="category_id" class="form-control">
								<option value="">-</option>
								@foreach ($categories as $category)
									<option value="{{$category->id}}">{{$category->name}}</option>
								@endforeach
							</select>
							@if($errors->has('category_id'))
					    <small id="emailHelp" class="form-text text-danger">
					    		{{$errors->first('category_id')}}
					    </small>
					    @endif
						</div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Title :</label>
					    <input type="text" class="form-control" name="title" value="{{old('title')}}">
					    @if($errors->has('title'))
					    <small id="emailHelp" class="form-text text-danger">
					    		{{$errors->first('title')}}
					    </small>
					    @endif
					  </div>
					  <div class="form-group">
					    <label for="exampleFormControlTextarea1">Body :</label>
					    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body">{{old('body')}}</textarea>
					    @if($errors->has('body'))
					    <small id="emailHelp" class="form-text text-danger">
					    		{{$errors->first('body')}}
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
