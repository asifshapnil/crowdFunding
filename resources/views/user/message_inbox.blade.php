@extends('user.layouts.main')

@section('custom_css')
	<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 20%;
		}
		.amount{
			border: 1px solid black !important;
			padding: 5px;
		}
		.no-border{
			border: none;
		}
		.box{
			border: 1px solid black !important;
		}
		.padding{
			padding: 10px;
		}
		.btn-bottom{
			color: #fff;
			background-color: #868e96;
			border-color: #868e96;
			width: 120px;
		}
		.btn-bottom:hover{
			color: #fff;
			background-color: #727b84;
			border-color: #6c757d;
		}
		.step{
			border: 2px solid #868e96;
		}
		.bg-dark{
			background-color: #CCCCCC;
		}
	    tr{
	      width: 750px;
	    }
	    .border-dark {
		  border-color: #343a40 !important;
		}
	  	.form-control{
	    	border-radius: none !important;
	  	}
	  	.text-center {
	  		text-align: center !important;
	 	}
	 	a{
			color: #000000;
	 	}
		a:hover{
			text-decoration: none;
			color: #000000;
		}
	</style>
@stop


@section('ecommerce')

@stop

@section('content')

@include('user.layouts.tab')

<div class="container">
	<div class="row">
		<div class="col-md-10 offset-md-1 col-sm-12">
			<div class="mt20">
				<div class="row">
					<div class="col-md-3">
						@include('user.layouts.profile')
					</div>
					<div class="col-md-9">
          	 <div class="">
            		<div class="col-md-12 col-12">
              		<div class="row border bg-light">
										<div class="col-md-1 col-1">
											<input type="checkbox" name=""  value="1" id="markAll"  class="mt-4">
										</div>
										<div class="col-md-7 col-7">
											<p class="pt-3">件名</p>
										</div>
										<div class="col-md-2 col-2">
											<p class="pt-3">差出人</p>
										</div>
										<div class="col-md-2 col-2">
											<p class="pt-3">受信日</p>
										</div>
              	 </div>
								 {!! Form::open(['route' => 'user-delete-multiple-message', 'method' => 'post']) !!}
								 @if($messages)
									 @foreach ($messages as $m)
										 <a href="{{ route('show-message', $m->id) }}">
											 <div class="row border">
												 <div class="col-md-1 col-1">
													 <input type="checkbox" name="delete[]" value="{{$m->id}}"  class="mt-4 msg">
												 </div>
												 <div class="col-md-7 col-7">
													 <p class="pt-3">{{$m->subject}}</p>
												 </div>
												 <div class="col-md-2 col-2">
													 <p class="pt-3">{{$m->from->first_name.' '.$m->from->last_name}}</p>
												 </div>
												 <div class="col-md-2 col-2">
													 <p class="pt-3">{{ $m->created_at->toFormattedDateString() }}</p>
												 </div>
											 </div>
										 </a>
									 @endforeach
								 @endif
								 <div class="msg_delete">
									 @if (!$messages->isEmpty())
										 <button type="submit" class="msg_delete_btn"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
									 @else
										 <button type="button" class="msg_delete_btn"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
									 @endif
								 </div>
							 </form>
						 </div>
					 </div>
				 </div>
			 </div>
		 </div>
	 </div>
 </div>
</div>









@stop

@section('custom_js')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#markAll').on('change', function(e){
				if ($(this).is(':checked')) {
					$('.msg').prop('checked', true);

			   } else {
					 $('.msg').prop('checked', false);

			   }
			});
		});
	</script>

@stop
