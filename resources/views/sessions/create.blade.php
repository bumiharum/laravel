@extends('layouts.main')

@section('title', 'Login')

@section('content')

<br>
<div class="container">
	<div class="row justify-content-md-center">
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">Login</div>
				<form method="POST" action="/login">
				{{csrf_field()}}
				<div class="card-body">
					
				
			  <div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
			  </div>
			  <button type="submit" class="btn btn-primary">Login</button>
			  </div>
</form>
			</div>
			
		</div>
	</div>
</div>

<br>

@endsection