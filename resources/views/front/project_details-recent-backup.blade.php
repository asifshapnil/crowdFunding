@extends('front.layouts.main')

@section('custom_css')
	<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 20%;
		}
		.body{

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
		.heading:after{
			display: block;
			height: 3px;
			background-color: #80b9f2;
			content: "";
			width: 100%;
			margin: 0 auto;
			margin-top: 10px;
			margin-bottom: 30px;
		}
		.bg-dark{
			background-color: #E4E4E4;
		}
		.div-radius{
			border: 3px solid #eaebed;
			border-radius: 5px;
		}
		.div-radius1{
			/* border: 3px solid #eaebed; */
			border-radius: 5px;
		}
		.horizontal:after{
			display: block;
			height: 2px;
			background-color: #999;
			content: "";
			width: 100%;
			margin: 0 auto;
			margin-top: 10px;
			margin-bottom: 45px;
		}
		.bg-danger{
			/* opacity: 0.9 !important; */
			background-color: #ffe3da !important;
		}

		/* .project_status {
	    position: absolute;
	    top: 15px;
	    left: 3px;
	    width: auto;
	    padding: 5px;
	    padding-left: 15px;
	    padding-right: 15px;
	    text-align: center;
			background-color: #ff6540;
		} */

	.project-item{
		position: relative;
	}
	.project_status{
		/* position: absolute;
	    top: 15px;
	    left: -15px;
	    width: auto;
	    padding: 5px;
	    padding-left: 15px;
	    padding-right: 15px;
	    text-align: center; */
		position: absolute;
		top: 15px;
		left: 1px !important;
		width: auto;
		padding: 5px;
		padding-left: 15px;
		padding-right: 15px;
		text-align: center;
		background-color: #ff6540;
	}
	.icon-info{
		border: 2px solid #ff3300;
		padding-right: 10px;
		padding-left: 10px;
		padding-top: 1px;
		padding-bottom: 1px;
		border-radius: 50%;
		color: #ff3300;
		background-color: #ffffff;


	}
	.bg-white{
		background-color:#fff;
	}
	.content-inner-blue:before{
		display: block;
		height: 2px;
		background-color: #81ccff;
		content: "";
		width: 100%;
		margin: 0 auto;
		margin-top: 0px;
		margin-bottom: 0px;
	}

.content-inner-arrow{
	-webkit-clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);
	clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);

}
.bg-blue{
	background-color: #0099ff;
}
.no-container {
margin-left: 0 !important;
margin-right: 0 !important;
}
/* .content-inner-arrow:after{
	-webkit-clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);
	clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);
	display: block;
	height: 2px;
	background-color: #81ccff;
	content: "";
	width: 100%;
	margin: 0 auto;
	margin-top: 80px;
	margin-bottom: 0px;

} */
/* .arrow-down {
  width: 0;
  height: 0;
  border-left: 20px solid transparent;
  border-right: 20px solid transparent;

  border-top: 20px solid #f00;
} */

	.mt40{
		margin-top: 40px !important;
	}


	</style>
@stop


@section('ecommerce')

@stop

@section('content')

<div class="container">
	<div class="row">
		<div class="col-10 offset-md-1 mt40">
			<div class="row">
				<div class="col-5">
					<div class="row">
						<div class="col-12">
							<img src="{{ asset('uploads/projects/'. $project->featured_image) }}" alt="" class="img-fluid">
							{{-- <div class="project_status status_1 text-white" >募集中</div> --}}
							<div class="project_status {{strtotime($project->end) > strtotime(date('Y-m-d H:i:s')) ? 'status_1' : 'status_2'}}"><span>{{strtotime($project->end) > strtotime(date('Y-m-d H:i:s')) ? '募集中' : '達成！'}}</span></div>

						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="row ">
						<div class="col-md-8">
							<h6 class="" style="font-size:14px; color:#bfc5cc;"> <span style="color:#bfc5cc;"> 	<i class="fa fa-tag"></i> <a href="#">{{$project->category->name}}@if(!empty($project->sub_category)) , @endif</a>
								<?php if(!empty($project->sub_category)){?>
									<a href="#">{{$project->sub_category}}</a>
								<?php }?></span></h6>						</div>
						<div class="col-md-4">
							<a href="{{ route('user-favourite-add-project', $project->id) }}" class="pull-right" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入りに追加</a>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-12">
							<h5 style="font-size:20px;margin-top:10px;" class="font-weight-bold">{{$project->title}} こに入ります</h5>
						</div>
					</div>
					<?php
							$budget = $project->budget;
							$invested = $project->investment->sum('amount');
							$done = $invested*100/$budget;
							$done = round($done);
						 ?>
					<div class="row mt-2">
						<div class="col-12">
							<span style="font-size:18px; letter-spacing:2px;">現在 </span><span style="font-size:30px; letter-spacing:1px; font-weight: 600;"> {{$invested}} 円 </span>
							<div class="progress" style="margin-top: 10px;">
								<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="{{$done}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$done}}%">{{$done}}%</div>
							</div>
						</div>
					</div>
					<div class="row mt-1" style="margin-bottom: 15px;">
						<div class="col-12">
							<h5 class="text-right" style="font-size:18px; letter-spacing:2px;">目標 {{$budget}} 円</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5 mr-0 ml-3 p-0" >
							<a href="{{route('user-invest', ['id' => $project->id])}}" class="bg-blue text-white btn btn-lg btn-block" name="button" style=" height:80px;">プロジェクトを <br> 支援する</a>
						</div>
						<div class="col-md-3 div-radius ml-2" style="height:80px; width:80px !important;">
								<p class="text-center p-2"><span  style="font-size:11px;">応援者 </span> <br>
							 <span style="font-size:20px;">{{$supports}} 人</span></p>
						</div>
						@php
							$start = strtotime("now");
							$end = strtotime($project->end);
							$days_between = ceil(abs($end - $start) / 86400);
						@endphp
						<div class="col-md-3 div-radius ml-2" style="height:80px; width:80px !important;">
							<p class="text-center p-2"><span  style="font-size:11px;">残り日数 </span> <br>
						 <span style="font-size:20px;">{{ $days_between }}日</span></p>
						</div>
					</div>
					<div class="row mt-2">
						<input type="hidden" name="" id="linkUrl" value="{{ asset('project-details/'.$project->id) }}">
						{{-- <div class="col-md-2  p-2 ml-2">
							<a href="#" class="btn btn-sm btn-block text-white" style="background:#4267b2; font-size:10px;"> <span class="fa fa-facebook" style="color:#fff;"></span> facebook</a>
						</div>
						<div class="col-md-2 p-2">
							<a href="#" class="btn btn-sm btn-block text-white" style="background:#4267b2; font-size:10px;"> <span class="fa fa-facebook" style="color:#fff;"></span> facebook</a>
						</div>
						<div class="col-md-2 p-2">
							<a href="#" class="btn btn-sm btn-block text-white" style="background:#4267b2; font-size:10px;"> <span class="fa fa-facebook" style="color:#fff;"></span> facebook</a>
						</div>
						<div class="col-md-2 p-2">
							<a href="#" class="btn btn-sm btn-block text-white" style="background:#4267b2; font-size:10px;"> <span class="fa fa-facebook" style="color:#fff;"></span> facebook</a>
						</div> --}}
						<div class="" id="shareIcons">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('front.layouts.200-1')
@if (Auth::check())
	@include('user.layouts.message_modal')
@endif


@stop

@section('custom_js')
	<script type="text/javascript">
			$(document).ready(function(){
				$('.msg_send_btn').on('click', function(e){
					var user_id = $(this).attr('data-user_id');
					var user_name = $(this).attr('data-project_username');


					$('#to_id').html(user_id);
					$('#project_user_name').html(user_name);
					$('#send-message').modal('show');
					//$('#send-message').addClass('show');
				});
			});
	</script>

	<script type="text/javascript">

			$(function() {
				var linkurl  = $('#linkUrl').val();
				$('#shareIcons').jsSocials({
					url : linkurl,
					text : 'laravel for social sharing',
					showLabel : true,
					showCount : "inside",
					shareIn : "popup",
					shares : ["facebook", "twitter", "line"]
				});
			});
	</script>




@stop
