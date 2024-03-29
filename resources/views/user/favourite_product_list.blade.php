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
			background-color: #80b9f2;
			content: "";
			width: 100%;
			margin: 0 auto;
			margin-top: 10px;
			margin-bottom: 30px;
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
	.checked {
		color: #fff658;
	}
	.bg-blue{
		background-color:#0099ff !important;
	}
.bg-yellow{
	background-color:#ffbc00 !important;;
}



	</style>
@stop


@section('ecommerce')

@stop

@section('content')

@include('user.layouts.tab')


<div class="container">
	<div class="row">
		<div class="offset-md-1 col-md-10 col-12">
			<div class="mt20">
				<div class="row">
					<div class="col-md-3">
						@include('user.layouts.profile')
					</div>
					<div class="col-md-9">


							<div class="row">
								<div class="col-md-12 col-12">

											<ul class="nav nav-tabs" role="tablist">
													<li class="nav-item">
														<a class="nav-link {{Route::currentRouteName()=='user-favourite-project-list'?'active':''}}" href="{{route('user-favourite-project-list')}}">プロジェクト</a>
													</li>
													<li class="nav-item">
														<a class="nav-link {{Route::currentRouteName()=='user-favourite-product-list'?'active':''}}" href="{{route('user-favourite-product-list')}}">カタログ商品</a>
													</li>
											</ul>


											<div class="tab-content">
												<div id="home" class="tab-pane active row  mt-5">
													@foreach ($products as $p)

												<div class="col-md-12 col-12 p-0 m-0 horizontal ">
													<div class="row inner_inner ml-md-3">
														<div class="col-md-6">
															<div class="row">
																<div class="col-md-12 project-item">
																	<img src="{{$p->product->image ?  asset('uploads/products/'.$p->product->image) : asset('uploads/projects/1615154785167836.jpeg')}}" alt="" class="img-fluid">
																	{{-- <div class="project_status text-white" >		{{$p->product->subCategory->category->name}}</div> --}}
																</div>
															</div>
														</div>
														<div class="col-md-6 p-md-0">
															<div class="row ">
																<div class="col-md-8">
																	<h6 class="" style="font-size:14px; color:#bfc5cc;"> <span style="color:#bfc5cc;"> {{ $p->product->company_name }}</h6>
																</div>
																<div class="col-md-4">
																	<a href="{{route('user-favourite-remove-product', ['id' => $p->product->id])}}" class="pull-right" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入り</a>
																</div>
															</div>
															<div class="row mt-1">
																<div class="col-md-12">
																	<p style="font-size:20px;" class="font-weight-bold">	{{$p->product->title}}</p>
																</div>
															</div>
															<div class="row mt-1">
																<div class="col-md-12 p-0 ml-md-3">
																	<p style="font-size:12px;">	{{$p->product->description}}</p>
																</div>
															</div>
															<div class="row mt-1">
																<div class="col-md-6">
																<p><span class="font-weight-bold" style="font-size:23px; letter-spacing:2px;">{{ $p->product->price }}</span>
																	<span class="" style="font-size:20px; letter-spacing:1px;">ポイント</span></p>
																</div>

																<div class="col-md-6 p-md-0 star">
																	<p class=" mt-2"><span class="fa fa-star checked" style="font-size:20px;"></span>
																	<span class="fa fa-star checked" style="font-size:20px;"></span>
																	<span class="fa fa-star checked" style="font-size:20px;"></span>
																	<span class="fa fa-star " style="font-size:20px;"></span>
																	<span class="fa fa-star " style="font-size:20px;"></span>
																	(3)</p>
																</div>
															</div>
															<div class="row">
																<div class="col-md-offset-2 mr-md-0 div-radius ml-md-3" style="height:55px; width:55px;">
																		<p class="pt-2 pb-0 text-center" style="font-size:11px;">
																			カラー：<br>
																			@foreach ($p->product->color as $p_color)
																			{{ $p_color->color.',' }}
																			@endforeach  <br> </p>
																			{{-- {{ $p->product->id }} --}}
																		{{-- <p class="p-0 m-0 text-center" style="font-size:12px;"></p> --}}
																</div>
																<div class="col-md-offset-2 mr-0 div-radius ml-md-2" style="height:55px; width:55px;">
																		<p class="pt-2 text-center" style="font-size:11px;">サイズ: <br>
																			@foreach ($p->product->color as $p_size)
																			{{ $p_size->size.',' }}
																			@endforeach
																		 </p>
																		{{-- <p class="p-0 text-center" style="font-size:12px;">M</p> --}}
																</div>
																<div class="col-md-offset-6  mr-md-0 div-radius1 ml-md-2" style="height: 65px;">
																	{{-- <div class=" div-radius1 m-0 p-0" style="height:50px"> --}}
																	<button class="bg-yellow editbtn px-3 text-white btn btn-lg btn-block   font-weight-bold" style=" height:80%;"> <span class="fa fa-shopping-cart px-1"></span> カートに入れる</button>
																	{{-- </div> --}}
																</div>
															</div>
														</div>
													</div>
												</div>
											@endforeach

												</div>
										</div>



								</div>

							</div>

						{{-- repeat --}}



						{{-- repeat ends --}}

				</div>

			</div>

			</div>
	  </div>
	</div>
</div>


@stop

@section('custom_js')

@stop
