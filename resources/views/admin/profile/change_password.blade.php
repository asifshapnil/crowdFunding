@extends('admin.layouts.main')

@section('custom_css')
@stop

@section('content')
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Change Your Password
				</div>
				<div class="card-body">
					
					<form action="" method="post">


						@include('admin.layouts.message')

						{{ csrf_field() }}
						
						<div class="form-group">
							<label for="exampleInputPassword1">Current Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Current Password" name="current_password">
							<small class="text-danger">{{ $errors->first('current_password') }}</small>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">New Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="New Password" name="password">
							<small class="text-danger">{{ $errors->first('password') }}</small>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Confirm Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" name="password_confirmation">
							<small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
						</div>
						
						<button type="submit" class="btn btn-primary">Update</button>
					</form>


				</div>
			</div>
		</div>

		
	</div>
@stop

@section('custom_js')
@stop