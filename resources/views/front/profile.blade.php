@extends('front.layouts.main')

@section('custom_css')
	<style type="text/css">
		.category3{
			background-color: #76C0D4 !important;
    		color: white !important;
		}
	</style>
@stop

@section('content')


<div class="container">

@include('front.layouts.search')

<div class="mt20">
	<div class="row">
		<div class="col-md-12">
			<h3>起案社プロフィール</h3>
			<div class="divider"></div>
		</div>
	</div>
	<div class="row mt20">
		<div class="col-md-4">
			
					<img src="{{Request::root()}}/uploads/{{$profile->pic}}" class="img-responsive">
				
		</div>
		<div class="col-md-8">
			<table class="table">
				<tr>
					<td><b>Name :</b></td>
					<td>{{$profile->first_name.' '.$profile->last_name}}</td>
				</tr>
				<tr>
					<td><b>Email :</b></td>
					<td>{{$profile->email}}</td>
				</tr>
			</table>
		</div>




		<!-- Button trigger modal -->



		
	</div>
	
</div>

</div>







@stop

@section('custom_js')
@stop