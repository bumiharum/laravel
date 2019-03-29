@extends('layouts.main')

@section('stylesheets')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" href="/css/background.css">
@endsection

@section('title', 'Blog')

@section('content')
<br>
<div class="container container-me">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<table id="table_id" class="display">
					  <thead>
					    <tr>
                <th>Image</th>
					      <th>Title</th>
					      <th>Body</th>
					      <th>Created at</th>
					      <th>Updated at</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($posts as $post)
					    <tr>
                <td>
                  <img src="{{asset('img/'. $post->image)}}" alt="" class="img-fluid"><hr>
                  <a href="/posts/{{$post->slug}}" class="btn btn-dark btn-sm">View</a>
                  <a href="/posts/{{$post->slug}}/edit" class="btn btn-danger btn-sm">Edit</a></td>
					      <td>
                  <small>Category: {{$post->category->name}}</small><hr>
                  <b>{{$post->title}}</b>
                </td>
					      <td>{{substr(strip_tags($post->body), 0, 120)}} {{strlen(strip_tags($post->body)) > 120 ? " ..." : ""}}</td>
					      <td>{{$post->created_at->toFormattedDateString()}}</td>
					      <td>{{$post->updated_at->toFormattedDateString()}}</td>
					    </tr>
					    @endforeach
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
@endsection

@section('scripts')
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
  $(document).ready(function () {
    $('#table_id').DataTable();
  });
  </script>
@endsection
