@extends('admin.layouts.auth')

@section('custom_css')
@stop

@section('content')
<div class="row justify-content-md-center align-middle auth-content">


	<div class="col-md-4">


		<h4 class="text-center">Crowd Funding</h4>

		<div class="card">
			
			<h6 class="card-header mb-2 text-muted text-center">Login To Your Account</h6>
			<div class="card-body">
				
				

				@include('admin.layouts.message')
				
				<form action="" method="post">

					{{ csrf_field() }}

					<div class="form-group">
						<label for="exampleInputEmail1">Email</label>
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{old('email')}}">
						<small class="text-danger">{{ $errors->first('email') }}</small>
						<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="{{old('password')}}">
						<small class="text-danger">{{ $errors->first('password') }}</small>
					</div>
					
					<div class="form-check">
					    <label class="form-check-label">
					      <input type="checkbox" class="form-check-input" name="remember">
					      Remember me
					    </label>
					  </div>
					
					<button type="submit" class="btn btn-primary pull-right">Login</button>
				</form>


			</div>
		</div>
	</div>
</div>	
@stop

@section('custom_js')
@stop