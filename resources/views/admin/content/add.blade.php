@extends('admin.layouts.main')

@section('custom_css')
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Add New Content
					<a href="{{route('admin-content-list')}}" class="btn btn-success btn-sm pull-right">Content List</a>
				</div>
				<div class="card-body">
					
					<form action="" method="post">


						@include('admin.layouts.message')

						{{ csrf_field() }}
						
						<div class="form-group">
							<label for="exampleInputPassword1">Title</label>
							<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Title" name="title" value="{{old('title')}}">
							<small class="text-danger">{{ $errors->first('title') }}</small>
						</div>
						<div class="form-group">
							<label for="exampleInputDescription">Description</label>
							<textarea placeholder="Description" class="form-control" id="exampleInputDescription" name="description" rows="15">{{old('description')}}</textarea>
							<small class="text-danger">{{ $errors->first('description') }}</small>
						</div>
						
						
						<button type="submit" class="btn btn-primary">Add</button>
					</form>


				</div>
			</div>
		</div>

		
	</div>
@stop

@section('custom_js')
	<!-- <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script> -->
	<script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
	<script type="text/javascript">
		CKEDITOR.replace( 'description', {
			extraPlugins: 'imageuploader'
		});

	
	    // ClassicEditor
	    //     .create( document.querySelector( '#exampleInputDescription' ) )
	    //     .catch( error => {
	    //         console.error( error );
	    //     } );
	
	</script>
@stop