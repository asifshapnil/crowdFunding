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
		.heading:after{
			display: block;
			height: 3px;
			background-color: #ffbc00;
			content: "";
			width: 100%;
			margin: 0 auto;
			margin-top: 20px;
			margin-bottom: 25px;
		}
		.bg-dark{
			background-color: #c6c6c6;
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
		.bg-yellow{
			background-color: #ffbc00;
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
  .btn-row{
		margin-left: -3px;
	}
	button{
		padding-top: 10px !important;
		padding-bottom: 10px !important;
	}




	</style>
@stop


@section('ecommerce')

@stop

@section('content')

@include('user.layouts.tab')


<div class="container">
	<div class="row">
	  <div class="offset-md-1 col-10">
			<div class="mt20">
				<div class="row">
					<div class="col-md-3 mt-5">
						@include('user.layouts.profile')
					</div>
					<div class="col-md-9">
							<div class="row ">
								<div class="col-md-12 col-12">
									<div class="row inner">
										<div class="col-md-12 col-12 ">
											<div class="bg-danger px-2 pt-3">
												<div class="d-flex flex-row">
													<div class="align-self-start pr-2">
														<span class="icon-info"> <i class="	fa fa-exclamation"></i> </span>
													</div>
													<div class="align-self-end">
														<p class="font-weight-bold" style="color:red; font-size:15px;">メッセージが届いています。</p>
													</div>
												</div>
												<div class="d-flex flex-row">
													<div class="align-self-start pr-2">
														<span class="icon-info"> <i class="	fa fa-exclamation"></i> </span>
													</div>
													<div class="align-self-end">
														<p class="font-weight-bold" style="color:red; font-size:15px;">メッセージが届いています。</p>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12 col-12 pt-3">
											<h4 class="heading">購入済み商品</h4>
										</div>
									</div>

									<div class="row inner">
										<div class="col-md-12 col-12">
											<div class="row inner_inner">
												<div class="col-md-6">
													<div class="row">
														<div class="col-md-12">
															<img src="{{ asset('images/BMW-TA.jpg') }}" alt="" class="img-fluid">
															{{-- <div class="project_status text-white" >募集中</div> --}}
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="row ">
														<div class="col-md-8">
															<h6 class="" style="font-size:14px; color:#bfc5cc;"> 会社名がここに入ります</h6>
														</div>
														<div class="col-md-4">
															<h6 class="pull-right" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入り</h6>
														</div>
													</div>
													<div class="row mt-1">
														<div class="col-md-12">
															<p style="font-size:18px;" class="font-weight-bold">商品名がここに入りますあすますますます <br> ますます </p>
														</div>
													</div>
													<div class="row">
														<div class="col-md-9">
															<h5 style="font-size:21px;">1,900 ポイント </h5>

													</div>
												</div>
												<div class="row mt-2">
													<div class="col-md-9">
														<span style="font-size:19px;">1個 ／ 白 ／ L ／</span>
													</div>
												</div>
												<div class="row">
													<div class="col-md-9">
														<span style="font-size:19px;">購入日:2018年10月1日</span>
													</div>
												</div>
												<div class="row">
													<div class="col-md-9">
														<span style="font-size:19px;">商品提供者：丸井丸子</span>
													</div>
												</div>
												<div class="row mt-2 btn-row">
													<div class="col-md-6 p-1">
														<button class=" text-white btn btn-md btn-block  font-weight-bold"  style="background-color:#c6c6c6 !important; "> <span class="fa fa-envelope"></span> メッセージを送る</button>
													</div>
													<div class="col-md-6 p-1">
														<button class=" text-white btn btn-md btn-block  font-weight-bold"  style="background-color:#ffbc00 !important; ">★★★  レビューを書く</button>
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
	  </div>
	</div>
</div>


@stop

@section('custom_js')

@stop
