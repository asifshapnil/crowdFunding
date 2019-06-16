@extends('user.layouts.main')

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
			background-color: #f8f8f8;
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

	.project_status {
    position: absolute;
    top: 15px;
    left: 3px;
    width: auto;
    padding: 5px;
    padding-left: 15px;
    padding-right: 15px;
    text-align: center;
		background-color: #ff6540;
	}
	.project-item{
		position: relative;
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
	.content-inner-yellow:before{
		display: block;
		height: 2px;
		background-color: #ffbc00;
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




	</style>
@stop


@section('ecommerce')

@stop

@section('content')

@include('user.layouts.tab')

<div class="row bg-white ">
	<div class="container">
		<div class="row justify-content-center">
			<div class=" col-9">
		<div class="mt-5">
			<div class="row">
				<div class="col-md-12">
									<div class="row inner_inner">
										<div class="col-md-5">
											<div class="row">
												<div class="col-md-12 project-item">
													<img src="{{ asset('images/BMW-TA.jpg') }}" alt="" class="img-fluid">
													<div class="project_status text-white" >募集中</div>
												</div>
											</div>
										</div>
										<div class="col-md-7">
											<div class="row ">
												<div class="col-md-8">
													<h6 class="" style="font-size:14px; color:#bfc5cc;"> <span style="color:#bfc5cc;"> <i class="fa fa-tag"></i> </span> ものつくり</h6>
												</div>
												<div class="col-md-4">
													<h6 class="pull-right" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入りに追加</h6>
												</div>
											</div>
											<div class="row mt-1">
												<div class="col-md-12">
													<h5 style="font-size:16px;" class="font-weight-bold">プロジェクト名がここに入りますこ</h5>
													<h5 style="font-size:16px;" class="font-weight-bold"> こに入ります</h5>
												</div>
											</div>
											<div class="row mt-2">
												<div class="col-md-12">
													<span style="font-size:15px; letter-spacing:2px;">現在 </span><span class="font-weight-bold" style="font-size:25px; letter-spacing:1px;"> 1,000,020 円 </span>
													<div class="progress">
														<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
															70%
														</div>
												</div>
											</div>
										</div>
										<div class="row mt-1">
											<div class="col-md-12">
												<h5 class="text-right" style="font-size:14px; letter-spacing:2px;">目標 1,010,000 円</h5>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5 mr-0 ml-3 p-0" >
												<button type="button" class="text-white btn btn-lg btn-block" name="button" style="background:#0099ff; height:80px;">プロジェクトを <br> 支援する</button>
											</div>
											<div class="col-md-3 div-radius ml-2" style="height:80px; width:80px !important;">
													<p class="text-center p-2"><span  style="font-size:11px;">残り日数 </span> <br>
												 <span style="font-size:20px;">9日</span></p>
											</div>
											<div class="col-md-3 div-radius ml-2" style="height:80px; width:80px !important;">
												<p class="text-center p-2"><span  style="font-size:11px;">残り日数 </span> <br>
											 <span style="font-size:20px;">9日</span></p>
											</div>
										</div>
										<div class="row mt-2">
											<div class="col-md-2  p-2 ml-2">
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
											</div>
										</div>

									</div>

						</div>
					</div>

			</div>
		</div>
	</div>

		</div>

	</div>
</div>



@include('front.layouts.200-3')

@stop

@section('custom_js')

@stop
