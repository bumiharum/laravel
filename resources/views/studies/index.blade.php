@extends('layouts.main')

@section('stylesheets')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" href="/css/background.css">
@endsection

@section('title', 'New Create')

@section('content')
  <div class="container container-me">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <table id="table_id" class="display">
              <thead>
                <tr>
                  <th>Studies :</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($studies as $study)
                <tr>
                  <td>{{$study->name}}</td>
                  <td>
                    <a href="/studies/{{$study->id}}/edit" class="text-primary">Edit</a>
                    <a href="{{route('studies.delete', $study->id)}}" class="text-danger">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-4 offset-md-2">
        <div class="card">
          <div class="card-body">
            <form action="/studies" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label for="name">Name :</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                @if ($errors->has('name'))
  				        <small class="text-danger">{{$errors->first('name')}}</small>
  				      @endif
              </div>
              <div class="form-group">
                <button class="btn btn-danger btn-sm" type="submit">Add Studies</button>
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
