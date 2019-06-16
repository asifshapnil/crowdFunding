@extends('admin.layouts.main')

@section('custom_css')
@stop

@section('content')
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Add New Product Category
					<a href="{{route('admin-product-category-list')}}" class="btn btn-success btn-sm pull-right">Product Category List</a>
				</div>
				<div class="card-body">
					
					<form action="" method="post">


						@include('admin.layouts.message')

						{{ csrf_field() }}
						
						<div class="form-group">
							<label for="exampleInputPassword1">Category Name</label>
							<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Category Name" name="name" value="{{old('name')}}">
							<small class="text-danger">{{ $errors->first('name') }}</small>
						</div>
						
						
						<button type="submit" class="btn btn-primary">Add</button>
					</form>


				</div>
			</div>
		</div>

		
	</div>
@stop

@section('custom_js')
@stop