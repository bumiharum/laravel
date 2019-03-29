@extends('layouts.main')

@section('stylesheets')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" href="/css/background.css">
@endsection

@section('title', 'Videos')

@section('content')
<div class="container container-me">
	<div class="row">
  	<div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <table id="table_id" class="display">
            <thead>
              <tr>
                <th style="width: 400px">Video</th>
                <th>Description</th>
                <th>Created at</th>
                <th>Updated at</th>
              </tr>
            </thead>
            <tbody>
            	@foreach($videos as $video)
              <tr>
                <td>
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="{{$video->embed}}" class="embed-responsive-item"></iframe>
                  </div>
                </td>
                <td>
                  {{$video->description}}<hr>
                  <a href="/videos/{{$video->id}}/edit" class="btn btn-dark btn-sm">Edit</a>
                  <a href="{{route('videos.delete', $video->id)}}" class="btn btn-danger btn-sm">Delete</a>
                </td>
                <td>{{$video->created_at->toFormattedDateString()}}</td>
                <td>{{$video->updated_at->toFormattedDateString()}}</td>
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
