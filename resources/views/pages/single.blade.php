@extends('layouts.main')

@section('title', $post->title)

@section('stylesheets')
	<link rel="stylesheet" type="text/css" href="/css/background.css">
	<link rel="stylesheet" href="/css/single.css">
@endsection

@section('content')
<div class="container container-me container-home">
	<div class="row">
		<div class="col-md-9 container-single ">
			<h1 class="h1-single" style="text-transform: uppercase;"><b>{{$post->title}}</b></h1>
			<p class="text-muted">{{$post->category->name}}</p>
			<div class="row">
				<div class="col-md-10">
					<img src="{{asset('img/'. $post->image)}}" class="img-fluid"><br>
					<small class="text-muted">{{$post->created_at->toFormattedDateString()}}</small>
					<p style="line-height: 30px">{{$post->body}}</p>
					{{--  --}}

					<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="7"></div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			{{--  --}}
		</div>
	</div>
</div>
<br>
@endsection

@section('scripts')
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.2"></script>
@endsection
