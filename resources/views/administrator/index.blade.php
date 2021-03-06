@extends('layouts.main')

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
					      <th style="width: 100px">Image</th>
					      <th>Name</th>
                <th>Role</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($administrator as $admin)
					    <tr>
                <td><img src="{{asset('img/'. $admin->image)}}" alt="" class="img-fluid"></td>
					      <td>
                  {{$admin->name}}<hr>
                  <a href="/administrator/{{$admin->id}}/edit" class="btn btn-dark btn-sm">Edit</a>
					      	<a href="{{route('administrator.delete', $admin->id)}}" class="btn btn-danger btn-sm">Delete</a>
                </td>
					      <td>{{$admin->role->name}}</td>
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
