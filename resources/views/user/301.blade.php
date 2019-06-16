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
	.content-inner:before{
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
.checked{
	color: #ffbc00;
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
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12 project-item">
											<img src="{{ asset('images/BMW-TA.jpg') }}" alt="" class="img-fluid">
											<div class="project_status text-white" >募集中</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
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
											<span style="font-size:18px; letter-spacing:1px;" class="font-weight-bold">商品名がここに入ります。入ります。<br> 入ります。</span>
											{{-- <h5 style="font-size:16px;" class="font-weight-bold"> こに入ります</h5> --}}
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-md-12">
											<span style="font-size:14px">現在商品内容がここに入ります商品内容がここ   に品内容がここ <br>に入ります商品内容がここに入ります
												<br> 商品内容がここに入ります商品内容がここに品内容がここ に入ります <br> 商品内容がここに入ります
											</span>
										</div>
									</div>
									<div class="row mt-1">
										<div class="col-md-6">
											<p><span class="font-weight-bold" style="font-size:23px; letter-spacing:2px;">3,000</span>
												<span class="" style="font-size:20px; letter-spacing:1px;">ポイント</span></p>
											</div>

											<div class="col-md-6 p-0">
												<p class=" mt-2"><span class="fa fa-star checked" style="font-size:20px;"></span>
													<span class="fa fa-star checked" style="font-size:20px;"></span>
													<span class="fa fa-star checked" style="font-size:20px;"></span>
													<span class="fa fa-star " style="font-size:20px;"></span>
													<span class="fa fa-star " style="font-size:20px;"></span>
													(3)</p>
												</div>
											</div>
											<div class="row">
												<div class="col-md-offset-2 mr-0 div-radius ml-3" style="height:55px; width:55px;">
													<p class="pt-2 pb-0 text-center" style="font-size:11px;">カラー  <br> 白 </p>
													{{-- <p class="p-0 m-0 text-center" style="font-size:12px;"></p> --}}
												</div>
												<div class="col-md-offset-2 mr-0 div-radius ml-2" style="height:55px; width:55px;">
													<p class="pt-2 text-center" style="font-size:11px;">サイズ <br> M </p>
													{{-- <p class="p-0 text-center" style="font-size:12px;">M</p> --}}
												</div>
												<div class="col-md-offset-6  mr-0 div-radius1 ml-2" style="height: 65px;">
													{{-- <div class=" div-radius1 m-0 p-0" style="height:50px"> --}}
													<button class="px-3 text-white btn btn-lg btn-block  font-weight-bold" style="background-color:#ffbc00 !important; height:80%;"> <span class="fa fa-shopping-cart px-1"></span> カートに入れる</button>
													{{-- </div> --}}
												</div>
											</div>
											<div class="row">
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









@include('front.layouts.301')

@stop

@section('custom_js')

@stop
