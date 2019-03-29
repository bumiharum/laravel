@extends('layouts.main')

@section('title', 'Blog')

@section('stylesheets')
	<link rel="stylesheet" type="text/css" href="/css/background.css">
	<link rel="stylesheet" href="/css/blog.css">
@endsection

@section('content')
<div class="container container-me container-home">
	<div class="row">
		<div class="col-md-10  container-blog">
			@foreach($blogs as $blog)
			<div class="card card-blog" style="background-color: white">
				<div class="row">
					<div class="col-6 col-md-6">
						<img src="{{asset('img/'. $blog->image)}}" class="img-fluid">
					</div>
					<div class="col-6 col-md-6">
						<div class="card-body card-body-blog">
						<h3 class="card-title"><a href="/blog/{{$blog->slug}}" style="color:black"><b>{{$blog->title}}</b></a></h3>
						<p class="p-blog">{{substr(strip_tags($blog->body), 0, 120)}} {{strlen(strip_tags($blog->body)) > 120 ? " ..." : ""}}</p>
						<p class="text-muted">{{$blog->category->name}}</p>
					</div>
					</div>
				</div>
			</div>
			<br>
			@endforeach
			<div class="row">
				<div class="col-md-12">
					{{$blogs->links('vendor.pagination.bootstrap-4')}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
