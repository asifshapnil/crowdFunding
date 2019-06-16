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
			margin-top: 30px;
			margin-bottom: 15px;
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
								<h4 class="heading">購入済み商品</h4>
							</div>
						</div>

						     @if($products)
									@foreach ($products as $product)
									@php
										// dd($product);
									@endphp
									<div class="row inner horizontal mb-5">
										<div class="col-md-12 col-12">
											<div class="row inner_inner">
												<div class="col-md-6">
													<div class="row">
														<div class="col-md-12 project-item">
															<img src="{{$product->image ?  asset('uploads/products/'.$product->image) : asset('uploads/projects/1615154785167836.jpeg')}}" alt="" class="img-fluid">
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="row ">
														<div class="col-md-7 category_favourite">
															<h6 class="" style="font-size:14px; color:#bfc5cc;"> <span style="color:#bfc5cc;"> 	<i class="fa fa-tag"></i> <a href="#"> {{ $product->company_name }}</a>
															</span></h6>
														</div>
														<div class="col-md-5 category_favourite">
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
																<a  href="{{ route('user-favourite-add-product', $product->id) }}" class="pull-right" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入りに追加 </a>
															@else
																<span class="pull-right" style="font-size:14px;"><span style="color:#555"> <i class="fa fa-heart-o"></i> </span>お気に入り</span>
															@endif
														</div>

													</div>
													<div class="row mt-1">
														<div class="col-md-12">
															<h5 style="font-size:16px;" class="font-weight-bold">{{$product->title}}</h5>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-9">
															<h5 style="font-size:21px; letter-spacing:2px;">1,900 ポイント</h5>
														</div>
													</div>
													<div class="row  mt-2">
														<div class="col-md-9">
															<h5 style="font-size:15px; letter-spacing:2px;">1個 ／ 白 ／ L ／</h5>
														</div>
													</div>
													<div class="row  mt-2">
														<div class="col-md-9">
															<h5 style="font-size:15px; letter-spacing:2px;">購入日：2018年10月1日</h5>
														</div>
													</div>
													<div class="row  mt-2">
														<div class="col-md-9">
															<h5 style="font-size:13px; letter-spacing:2px;">商品提供者：丸井丸子</h5>
														</div>
													</div>
													<div class="row mt-3">
														@php $my_rating = 0; @endphp
														@foreach ($product->ratings as $rating)
															
															@if ($rating->user_id == Auth::user()->id)

														@php
																	$my_rating = $rating->user_rating
																@endphp
															@endif
														@endforeach
														<div class="col-md-6 pr-md-1">
															<button class="p-2 text-white btn btn-md btn-block font-weight-bold msg_send_btn"  data-user_id="{{ $product->user->id }}" data-project_username="{{ $product->user->first_name.' '.$product->user->last_name }}" style="cursor:pointer; color:#fff;"> <span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span>メッセージを送る</button>
														</div>
														<div class="col-md-6 pl-md-1">
																<button type="button" class="p-2 editbtn text-white btn btn-md btn-block font-weight-bold btn-warning rating_btn" data-my-rate="{{ $my_rating }}" data-product-id = {{ $product->id }} data-toggle="modal" data-target="#star">★★★  レビューを書く</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endforeach
							@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- @include('user.layouts.message_modal') --}}
@include('user.layouts.message_modal')
@include('user.layouts.star-rating')

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
		$(document).ready(function(){
			$('.rating_btn').on('click', function(){
				var product_id = $(this).attr('data-product-id');
					var my_rate = parseInt($(this).attr('data-my-rate'));
				// console.log(product_id);
				$('#get_product_id').val(product_id);
				$('#get_my_rate').val(my_rate);

				if (my_rate == 1) {
					$('#one').addClass('active');
					$('#two').removeClass('active');
					$('#three').removeClass('active');
					$('#four').removeClass('active');
					$('#five').removeClass('active');
				}else if (my_rate == 2) {
					$('#one').removeClass('active');
					$('#two').addClass('active');
					$('#three').removeClass('active');
					$('#four').removeClass('active');
					$('#five').removeClass('active');
				}else if (my_rate == 3) {
					$('#one').removeClass('active');
					$('#two').removeClass('active');
					$('#three').addClass('active');
					$('#four').removeClass('active');
					$('#five').removeClass('active');
				}else if (my_rate == 4) {
					$('#one').removeClass('active');
					$('#two').removeClass('active');
					$('#three').removeClass('active');
					$('#four').addClass('active');
					$('#five').removeClass('active');

				}else if (my_rate == 5) {
					$('#one').removeClass('active');
					$('#two').removeClass('active');
					$('#three').removeClass('active');
					$('#four').removeClass('active');
					$('#five').addClass('active');
				}

			});

			$('.rating').on('click', function(){
				var rate = $(this).attr('data-rating');
				$('#get_rating').val(rate);
				// console.log($('#get_rating').val());
				// $(this).addClass('active');
				var getId = $(this).attr('id');
				console.log(getId);
				if (getId == 'one') {
					$('#one').addClass('active');
					$('#two').removeClass('active');
					$('#three').removeClass('active');
					$('#four').removeClass('active');
					$('#five').removeClass('active');
				}else if (getId == 'two') {
					$('#one').removeClass('active');
					$('#two').addClass('active');
					$('#three').removeClass('active');
					$('#four').removeClass('active');
					$('#five').removeClass('active');
				}else if (getId == 'three') {
					$('#one').removeClass('active');
					$('#two').removeClass('active');
					$('#three').addClass('active');
					$('#four').removeClass('active');
					$('#five').removeClass('active');
				}else if (getId == 'four') {
					$('#one').removeClass('active');
					$('#two').removeClass('active');
					$('#three').removeClass('active');
					$('#four').addClass('active');
					$('#five').removeClass('active');
				}else if (getId == 'five') {
					$('#one').removeClass('active');
					$('#two').removeClass('active');
					$('#three').removeClass('active');
					$('#four').removeClass('active');
					$('#five').addClass('active');
				}

			});
		});
	</script>

@stop







