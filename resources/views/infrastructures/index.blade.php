@extends('layouts.main')

@section('stylesheets')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" href="/css/background.css">
@endsection

@section('title', 'New Create')

@section('content')
  <div class="container container-me">
    <div class="row">
      <div class="col-md-7">
        <div class="card">
          <div class="card-body">
            <table id="table_id" class="display">
              <thead>
                <tr>
                  <th style="width: 100px">Image</th>
                  <th>Name :</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($infrastructures as $infrastructure)
                <tr>
                  <td><img src="{{asset('img/'. $infrastructure->image )}}" alt="" class="img-fluid"> </td>
                  <td>
                    <a href="/sarpras/{{$infrastructure->name}}" class="text-dark"><b>{{$infrastructure->name}}<b></a><hr>
                    <a href="/infrastructures/{{$infrastructure->id}}/edit" class="btn btn-dark btn-sm">Edit</a>
                    <a href="{{route('infrastructures.delete', $infrastructure->id)}}" class="btn btn-danger btn-sm disabled">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-4 offset-md-1">
        <div class="card">
          <div class="card-body">
            <form action="/infrastructures" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group">
  				      <label>Image :</label>
  				      <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
  				      @if ($errors->has('image'))
  				        <small class="text-danger">{{$errors->first('image')}}</small>
  				      @endif
  				    </div>
              <div class="form-group">
                <label for="name">Name :</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                @if ($errors->has('name'))
  				        <small class="text-danger">{{$errors->first('name')}}</small>
  				      @endif
              </div>
              <div class="form-group">
                <button class="btn btn-danger btn-sm" type="submit">Add Roles</button>
              </div>
            </form>
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
