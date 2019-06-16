@extends('user.layouts.main')

@section('custom_css')
@stop

@section('ecommerce')
	
@stop

@section('content')



<div class="container" id="new-project">


<div class="mt20">
	<div class="row">
		<div class="col-md-3">
			@include('user.layouts.profile')
		</div>
		<div class="col-md-9">


			<div class="card padding">
			
			@include('layouts.message')
			
			<div class="card-header">
					Add New Card
					<a href="{{route('user-cards-list')}}" class="btn btn-success btn-sm pull-right">Card List</a>
				</div>
				<div class="card-block">
					
					<form action="" method="post">

						{{ csrf_field() }}
						
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{old('name')}}">
							<small class="text-danger">{{ $errors->first('name') }}</small>
						</div>
						
						<div class="form-group">
							<label for="number">Number</label>
							<input type="text" class="form-control" id="number" placeholder="Number" name="number" value="{{old('number')}}">
							<small class="text-danger">{{ $errors->first('number') }}</small>
						</div>
						
						<div class="form-group">
							<label for="cvv">CVV</label>
							<input type="text" class="form-control" id="cvv" placeholder="CVV" name="cvv" value="{{old('cvv')}}">
							<small class="text-danger">{{ $errors->first('cvv') }}</small>
						</div>

						<div class="form-group">
							<label for="exp_month">Expire Month</label>
							<select name="exp_month" class="form-control">
								@for($i=1; $i<=12; $i++)
							  		<option value="{{$i}}">{{$i}}</option>
								@endfor
							</select>
							<small class="text-danger">{{ $errors->first('exp_month') }}</small>
						</div>

						<div class="form-group">
							<label for="exp_year">Expire Year</label>
							<select name="exp_year" class="form-control">
								@for($i=date('Y'); $i<=date('Y')+10; $i++)
							  		<option value="{{$i}}">{{$i}}</option>
								@endfor
							</select>
							<small class="text-danger">{{ $errors->first('exp_year') }}</small>
						</div>

							
						
						
						<button type="submit" class="btn btn-primary">Add</button>
					</form>


				</div>


		</div>
	</div>
	
</div>

</div>

@stop

@section('custom_js')
@stop