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
								<div class="row inner">
									<div class="col-md-12 col-12 ">
										<div class="{{ !$messages->isEmpty() || !$OrderDetails->isEmpty() ? 'bg-danger' : '' }} px-2 pt-3">
											@if (!$messages->isEmpty())
												<div class="d-flex flex-row">
													<div class="align-self-start pr-2">
														<span class="icon-info"> <i class="	fa fa-exclamation"></i> </span>
													</div>
														<div class="align-self-end">
															<p class="font-weight-bold" style="color:red; font-size:15px;">メッセージが届いています。</p>
														</div>
													</div>
											 @endif

											 @if (!$OrderDetails->isEmpty())
												 <div class="d-flex flex-row">
													 <div class="align-self-start pr-2">
														 <span class="icon-info"> <i class="	fa fa-exclamation"></i> </span>
													 </div>
													 <div class="align-self-end">
														 <p class="font-weight-bold" style="color:red; font-size:15px;">商品の注文が入りました</p>
													 </div>
												 </div>
											 @endif
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-12 pt-3">
								<h4 class="heading">掲載商品</h4>
							</div>
						</div>
						@if($products)
						@foreach ($products as $product)
							{{-- {{ $product->id }} --}}
							<div class="row mb-5">
								<div class="col-md-12 col-12">


									<div class="row inner">
										<div class="col-md-12 col-12">
											<div class="row inner_inner">
												<div class="col-md-6">
													<div class="row">
														<div class="col-md-12 project-item">
															<img src="{{$product->image ?  asset('uploads/products/'.$product->image) : asset('uploads/projects/1615154785167836.jpeg')}}" alt="" class="img-fluid">
															{{-- <div class="project_status {{strtotime($product->end) > strtotime(date('Y-m-d H:i:s')) ? 'status_1' : 'status_2'}}"><span>{{strtotime($product->end) > strtotime(date('Y-m-d H:i:s')) ? '募集中' : '達成！'}}</span></div> --}}
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="row ">
														<div class="col-md-7">
															<h6 class="" style="font-size:14px; color:#bfc5cc;"> <span style="color:#bfc5cc;">{{ $product->company_name }}</h6>
														</div>
														<div class="col-md-5">
															@php
																$fav = 0;
															@endphp
															@foreach ($product->favourite as $f)
																@if ($f->user_id == Auth::user()->id)
																	@php
																		$fav = 1;
																	@endphp
																@endif
															@endforeach
															@if ($fav == 0)
																<a  href="{{ route('user-favourite-add-product', $product->id) }}" class="pull-right" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入りに追加</a>
															@else
																<span class="pull-right" style="font-size:14px;"><span style="color:#555"> <i class="fa fa-heart-o"></i> </span>お気に入り </span>
															@endif
														</div>
													</div>
													<div class="row mt-1">
														<div class="col-md-9">
															<h5 style="font-size:16px;" class="font-weight-bold">{{$product->title}}</h5>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-9">
															<h5 style="font-size:21px; letter-spacing:2px;">{{ $product->price }} ポイント</h5>
														</div>
													</div>
													<div class="row  mt-3">
														<div class="col-md-9">
															<h5 style="font-size:15px; letter-spacing:2px;">カラー：
																@foreach ($product->color as $p_color)
																	{{ $p_color->color.',' }}
																@endforeach
															</h5>
														</div>
													</div>
													<div class="row  mt-3">
														<div class="col-md-9">
															<h5 style="font-size:15px; letter-spacing:2px;">サイズ：
																@foreach ($product->color as $p_color)
																	{{ $p_color->type.',' }}
																@endforeach
															</h5>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-12">
															<div class="div-radius1">
																<a href="{{ route('user-product-edit', $product->id) }}" class="p-2 bg-dark text-white btn btn-secondary font-weight-bold" style="padding-left: 30px !important;padding-right: 30px !important;">編集する</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>

						@endforeach
					@endif
						<div class="row" style="margin-top: 30px;margin-bottom: 30px;">
						<div class="col-12 text-center">
							<a href="{{ route('user-product-add') }}" class="btn btn-warning">商品を登録をする</a>
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
