@extends('layouts.main')

@section('title', 'Galery')

@section('stylesheets')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" href="/css/background.css">
@endsection

@section('content')
  <div class="container container-me">
  	<div class="row">
  	<div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <table id="table_id" class="display">
            <thead>
              <tr>
                <th>Image</th>
                <th>Description</th>
                <th>Created at</th>
                <th>Updated at</th>
              </tr>
            </thead>
            <tbody>
            	@foreach($galery as $image)
              <tr>
                <td><img src="{{asset('img/'. $image->image)}}" alt="" class="img-fluid"> </td>
                <td>
                  {{$image->description}}<hr>
                  <a href="/galery/{{$image->id}}/edit" class="btn btn-dark btn-sm">Edit</a>
                  <a href="{{ route('galery.delete', $image->id) }}" class="btn btn-danger btn-sm">Delete</a>
                </td>
                <td>{{$image->created_at->toFormattedDateString()}}</td>
                <td>{{$image->updated_at->toFormattedDateString()}}</td>
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
