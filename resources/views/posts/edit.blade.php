@extends('layouts.main')

@section('stylesheets')
	<link rel="stylesheet" href="/css/background.css">
@endsection

@section('title', 'Edit')

@section('content')
<br>
<div class="container-fluid container-me">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card">
				<div class="card-header">
					Edit
				</div>
				<img src="{{asset('img/'. $post->image)}}" class="img-fluid">
				<div class="card-body">
					{!! Form::model($post, ['route' => ['posts.update', $post->slug], 'method' => 'PUT', 'files' => true]) !!}
						<input type="hidden" name="_method" value="PUT">
						{{ csrf_field() }}
						<div class="form-group">
			        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
			        @if ($errors->has('image'))
			          <small class="text-danger">{{$errors->first('image')}}</small>
			        @endif
		      	</div>
						<div class="form-group">
							<label for="category">Category :</label>
							{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
						</div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Title :</label>
					    <input type="text" class="form-control" name="title" value="{{(old('title')) ? old('title') : $post->title}}">
					    @if($errors->has('title'))
					    <small id="emailHelp" class="form-text text-danger">
					    		{{$errors->first('title')}}
					    </small>
					    @endif
						</div>
					  <div class="form-group">
					    <label for="exampleFormControlTextarea1">Body :</label>
					    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body">{{(old('body')) ? old('body') : $post->body}}</textarea>
					    @if($errors->has('body'))
					    <small id="emailHelp" class="form-text text-danger">
					    		{{$errors->first('body')}}
					    </small>
					    @endif
					  </div>
				  	<button type="submit" class="btn btn-primary">Submit</button>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
<br>
@endsection
