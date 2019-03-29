@extends('layouts.main')

@section('title', $post->slug)

@section('stylesheets')
	<link rel="stylesheet" type="text/css" href="/css/background.css">
@endsection



@section('content')
<div class="container container-me">
	<div class="row">
		<div class="col-md-10">
			<h1 style="text-transform: uppercase;">{{$post->title}}<br>
				<span style="font-size: 12px">
					<a href="/posts/{{$post->slug}}/edit">Edit</a>
					<a href="{{route('posts.delete', $post->id)}}" class="text-danger">Delete</a>
				</span>
			</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
			<img src="{{asset('img/'. $post->image)}}" class="img-fluid"><br>
			<small class="text-muted">{{$post->created_at->toFormattedDateString()}}</small>
			<p style="line-height: 30px">{{$post->body}}</p>
		</div>
	</div>
</div>
<br>
@endsection
