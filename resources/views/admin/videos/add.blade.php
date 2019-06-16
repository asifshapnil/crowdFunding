@extends('admin.layouts.main')

@section('custom_css')
@stop

@section('content')
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Add New Video
					<a href="{{route('admin-videos-list')}}" class="btn btn-success btn-sm pull-right">Video List</a>
				</div>
				<div class="card-body">
					
					<form action="" method="post" enctype="multipart/form-data">


						@include('admin.layouts.message')

						{{ csrf_field() }}
						
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{old('title')}}">
							<small class="text-danger">{{ $errors->first('title') }}</small>
						</div>
						
						<div class="form-group">
							<label for="videofile">File</label>
							<input type="file" class="form-control" id="videofile" name="videofile">
							<small class="text-danger">{{ $errors->first('videofile') }}</small>
						</div>
						
						<div class="form-group">
							<label for="point">Point</label>
							<input type="text" class="form-control" id="point" placeholder="point" name="point" value="{{old('point')}}">
							<small class="text-danger">{{ $errors->first('point') }}</small>
						</div>

						<div class="form-group">
                                <label class="">Status: </label>
                                <div class="">
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            <input type="radio" name="status" value="1" @if(old('status') == 1) checked @endif> Enable
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="status" value="0" @if(old('status') == 0) checked @endif> Disable
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="red">{{ $errors->first('status') }}</div>
                                </div>
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