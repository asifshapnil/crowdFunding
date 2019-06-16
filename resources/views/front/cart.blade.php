@extends('user.layouts.main')

@section('custom_css')
	<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 19.5%;
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
		.hide{
			display: none;
		}
		.actions{
			text-align: center !important;
		}
		.page_title_product_register{
			padding-top: 10px;
			padding-bottom: 10px;
			font-size: 25px;
		}
		/*steps start*/
		.wizard>.steps .number{
			display: none !important;
		}
		.wizard>.steps .steptext{
			font-size: 18px;
			text-transform: uppercase;
		}
		.wizard>.steps .stepcount{
			font-size: 22px;
			font-weight: bold;
		}
		.wizard>.steps .stepinfo{
			font-size: 18px;
			display: block;
		}
		.wizard>.steps a, .wizard>.steps a:hover, .wizard>.steps a:active{
			padding: 15px;
		    padding-top: 5px;
		    padding-bottom: 5px;
		    border-radius: 0px;
		    position: relative;
		}
		.wizard>.steps .current a, .wizard>.steps .current a:hover, .wizard>.steps .current a:active{
			background-color: #ffbc00;
			padding-left: 42px;
			margin-left: -8px;
		}
		.wizard>.steps .current a:after{
			content: '';
		    background: #ffbc00;
		    height: 50px;
		    width: 50px;
		    position: absolute;
		    top: 10px;
		    right: -24px;
		    transform: rotate(45deg);
		    z-index: 9;
		}
		.wizard>.steps .disabled a, .wizard>.steps .disabled a:hover, .wizard>.steps .disabled a:active, .wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active{
			margin-left: -8px;
			padding-left: 42px;
			border: 2px solid #ffbc00;
			background-color: #ffffff;
			padding-top: 3px;
    		padding-bottom: 3px;
    		position: relative;
    		border-right: none;
    		border-left: none;
		}
		.wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active{
			margin-left: -8px;
			border-left: 2px solid #ffbc00;
			color: #aaaaaa;
		}
		.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
			content: '';
		    border-top: 2px solid #ffbc00;
		    border-right: 2px solid #ffbc00;
		    height: 50px;
		    width: 50px;
		    position: absolute;
		    top: 8.9px;
		    right: -24px;
		    transform: rotate(45deg);
		    z-index: 9;
		    background-color: #ffffff;
		}
		.wizard>.steps ul li:first-child a{
			margin-left: 0px !important;
		}
		.wizard>.steps ul{
			margin-left: 0% !important;
			margin-top: 0px !important;
		}
		.wizard > .steps > ul > li{
			/* width: 16.4%; */
		}

		.breadcrump {
			background-color: #F1F1F1;
		}

		@media (max-width: 575.98px) {
			.wizard > .steps > ul > li{
		        width: 93% !important;
		    }
		    .wizard>.steps a, .wizard>.steps a:hover, .wizard>.steps a:active{
		        border-left: 2px solid #FFBC00 !important;
		        margin-left: 0px !important;
		    }
		    .wizard>.steps ul{
		    	margin-left: 0px !important;
		    }
		}
		/*steps end*/
	</style>
@stop


@section('ecommerce')

@stop

@section('content')
{{-- @include('user.layouts.tab') --}}

<div class="row breadcrump p-0 m-0 project_sorting">
	<div class="col-md-6 col-sm-12">
		<div class="offset-1">

				<div class="row">
					<div class="container">
						<div class="col-md-10 col-12 offset-md-1">
							<ul class="list-inline project_category_data pt-4">
								{{-- <li class="list-inline-item">>Top ></a></li> --}}
								<li class="list-inline-item">TOP ＞ カタログ一覧 ＞ カテゴリ名＞商品名</li>


							</ul>


						</div>
					</div>
				</div>

		</div>
	</div>
	<div class="col-md-2 offset-md-3 col-sm-12 search_area">
		<div class="py-3 ">
			{{-- @include('front.layouts.search') --}}
		</div>
	</div>
</div>






<div class="container" id="new-project">
		<div class="card commonError hide offset-md-1 mt-3">
				<h4 class='p-3' style="color:red;">正しく入力されてない項目があります。メッセージをご確認の上、もう一度入力ください。</h4>
		</div>
	@if (session('error_message'))
		<div class="mt-5">
			<div class="row justify-content-center">
				<div class="col-md-11">
					 <h4 class="bg-info text-white p-4">{{ session('error_message') }}</h4>
				</div>
			</div>
		</div>

	@endif
	<div class="mt20">
		<div class="row justify-content-center">
			<div class="col-md-10">
				{{-- <h1 class="text-center page_title_product_register">商品を登録する</h1> --}}
				<form id="example-form" action="{{route('user-product-purchase')}}" class="mt20" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
				    <div class="mt20">
						<h3 class="step_title_area">
				        	<span class="steptext">Step</span><span class="stepcount">1</span>
				        	<span class="stepinfo">商品情報確認</span>
				    	</h3>

				        <section class="mt-3">

							{{-- <h3>配送先情報</h3> --}}

							<div class="col-md-12 p-0 mb-4">
								<div class="row ">
									<h5 class="col-md-12  font-weight-bold ">商品情報確認</h5>
								</div>
								<div class="row justify-content-center mt-5">
									<div class="col-md-12">
										<table class="table">
											<tr class="bg-dark">
												<th class="text-center">商品名</th> <th class="text-center" colspan="2">数量</th>  <th class="text-center">必要ポイント</th>
											</tr>
											<input type="hidden" id="checkCart" value="{{ !Cart::content()->isEmpty() ? 1:0 }}">
											{{--  @if (!Cart::content()->isEmpty())
												{{ 'found' }}

											@else
												{{ 'not found' }}
											@endif  --}}

											@foreach(Cart::content() as $p)
												@php
												// dd($p);
												$product = App\Models\Product::find($p->id)
												@endphp
												<tr class="">
													<td style="" class="">
														<div class="d-flex flex-row">
															<img src="{{$product->image ?  asset('uploads/products/'.$product->image) : asset('uploads/projects/1615154785167836.jpeg')}}" alt="" class="img-fluid" >
															<span class="px-2">
																{{ $product->title }} <br>

																@if(!empty($p->options['size']) && !empty($p->options['color']))
																{{$p->options['size']}}/{{$p->options['color']}}
																@endif
																<br> {{ $p->price }} ポイント

															</span>
														</div>
													</td>
													<td class="text-center" colspan="2">
														<div class="d-flex flex-row pt-5 justify-content-center">
															<button class="px-3 py-1 align-self-end border text-center bg-light decrease_btn" data-rowid="{{ $p->rowId }} " data-price="{{ $p->price }}">-</button>
															{{-- <form class="cart-item" action="{{route('front-cart-update')}}" method="get"> --}}
																<input type="hidden" name="row_id" value="{{$p->rowId}}">
																<input type="text" class="px-3 py-1 qty border align-self-start text-center cart_qty_{{ $p->rowId }}" name="quantity" value="{{ $p->qty }}" style="width:50px;">
															{{-- </form> --}}
															<button class="px-3 py-1 align-self-end border text-center bg-light increase_btn" data-rowid="{{ $p->rowId }}" data-price="{{ $p->price }}">+</button>
														</div>
													</td>
													<td text-align="center" class="text-center">
														<div class="pt-5">
															<h4>
																<span class="setPrice_{{ $p->rowId }} price" style="letter-spacing:1px;">
																	{{ $p->qty*$p->price }}
																</span>
																<a href="{{route('front-cart-remove', ['id' => $p->rowId])}}" class="pull-right text-danger">
																	<i class="fa fa-trash"></i>
																</a>
															</h4>

														</div>


													</td>
												</tr>
											@endforeach
											<tr class="">
												<td class=" text-center">合計数 </td>
												<td colspan="" class="text-center"><h5 class="totalQty">{{Cart::count()}}</h5></td>
												<td class="text-center">合計ポイント</td>

												<td class="text-center"> <h5 class="text-danger totalPrice"></h5></td>


											</tr>
										</table>
									</div>
								</div>
								<div class="row justify-content-center">
									<div class="col-md-5 ">
										{{-- <a href="{{route('front-checkout')}}" class=" offset-md-2 text-center btn btn-md btn-primary">プロジェクトの起案者へメッセージを送る</a> --}}
									</div>
								</div>
							</div>
						</section>

						<h3 class="step_title_area">
				        	<span class="steptext">Step</span><span class="stepcount">2</span>
				        	<span class="stepinfo">配送先情報入力</span>
				    	</h3>

				        <section class="mt-3">
							<div class="col-md-12 p-0 mb-4">
								<div class="row ">
									<h5 class="col-md-12  font-weight-bold ">配送先情報入力</h5>
								</div>
								<div class="row">
									 <div class="col-md-10 ml-md-3">
										 <div class="form-check">
											  <label class="form-check-label check-first  pt-3">
												<input type="radio" class="form-check-input checkDefault" name="optradio" value="1" checked>
														登録されている住所
														<br> {{ $user->first_name }} {{ $user->last_name }}<br>
														{{ $user->shipping_postal_code }} <br>
														{{ $user->shipping_address }}, {{ $user->shipping_city }}    <br>
														{{ $user->profile->phone_no }}
											  </label>
											</div>

										 </div>
									 </div>
							</div>
							<div class="col-md-12 ">
								<div class="row bg-light-yellow">
									 <div class="col-12">
										 <div class="form-check pt-3 pb-3">
											<label class="form-check-label check-first  pt-3">
												<input type="radio" class="form-check-input checkDefault" name="optradio" value="2">
											新しい送付先
											</label>
										</div>
									 </div>
									 <div class="col-12 customAddress">
										 <div class="row inner_inner  pl-5 ml-2 pb-4">
											 <div class="col-md-9">
												 <div class="row border">
													 <div class="col-md-3 col-3 bg-dark">
														 <p class="pt-3 ">氏名</p>
													 </div>
													 <div class="col-md-9 col-9 bg-white">
														 <div class="row pt-2">
															 <div class="col-md-3 col-3 p-0 ml-5">
																 <input type="text" class="form-control fname" id="" placeholder=" 姓" value="" name="first_name" required>
															 </div>
															 <div class="col-md-3 col-3 p-0 m-0">
																 <input type="text" class="form-control mx-1 lname" id="" placeholder="名" value="" name="last_name" required>
															 </div>
														 </div>
													 </div>
												 </div>

												 <div class="row border">
													 <div class="col-md-3 col-3 bg-dark">
														 <p class="pt-3 ">フリガナ</p>
													 </div>
													 <div class="col-md-9 col-9 bg-white">
														 <div class="row pt-2">
															 <div class="col-md-3 col-3 p-0 ml-5">
																 <input type="text" class="form-control p1" id="" placeholder="セイ" value="" name="first_name_1">
															 </div>
															 <div class="col-md-3 col-3 p-0 m-0">
																 <input type="text" class="form-control mx-1 p2" id="" placeholder="メイ" value="" name="last_name_1">
															 </div>
														 </div>
													 </div>
												 </div>
												 <div class="row border">
													 <div class="col-md-3 col-3 bg-dark">
														 <p class="pt-3 ">住所</p>
													 </div>
													 <div class="col-md-9 col-9 bg-white">
														 <div class="row pt-2">
															 <div class="col-md-6 col-6 p-0 ml-5">
																 <input type="number" class="form-control postal"  id="" placeholder="郵便番号" name="postal_code" value="">
																 @if ($errors->has('postal_code'))
																	 <span class="help-block text-danger">
																		 <strong>{{ $errors->first('postal_code') }}</strong>
																	 </span>
																 @endif
															 </div>
														 </div>
														 <div class="row pt-2">
															 <div class="col-md-4 col-4 p-0 ml-5">
																	@include('user.layouts.prefectures')
																	@if ($errors->has('division'))
																		<span class="help-block text-danger">
																			<strong>{{ $errors->first('division') }}</strong>
																		</span>
																	@endif
															 </div>
														 </div>
														 <div class="row pt-2">
															 <div class="col-md-6 col-6 p-0 ml-5">
																 <input type="text" class="form-control municipility" id="" placeholder="市区町村" name="municipility" value="">
																 @if ($errors->has('address'))
																	 <span class="help-block text-danger">
																		 <strong>{{ $errors->first('address') }}</strong>
																	 </span>
																 @endif
															 </div>
														 </div>
														 <div class="row pt-2">
															 <div class="col-md-6 col-6 p-0 ml-5">
																 <input type="text" class="form-control address" id="" placeholder="それ以降の住所" name="address" value="">
																 @if ($errors->has('room_no'))
																	 <span class="help-block text-danger">
																		 <strong>{{ $errors->first('room_no') }}</strong>
																	 </span>
																 @endif
															 </div>
														 </div>
														 <div class="row pt-2 pb-2">
															 <div class="col-md-6 col-6 p-0 ml-5">
																 <input type="text" class="form-control room" id="" placeholder="マンション名・部屋番号" name="room_no" value="">
																 @if ($errors->has('room_no'))
																	 <span class="help-block text-danger">
																		 <strong>{{ $errors->first('room_no') }}</strong>
																	 </span>
																 @endif
															 </div>
														 </div>
													 </div>
												 </div>
												 <div class="row border">
													 <div class="col-md-3 col-3 bg-dark">
														 <p class="pt-3 ">電話番号</p>
													 </div>
													 <div class="col-md-9 col-9 bg-white">
														 <div class="row pt-2">
															 <div class="col-md-6 col-6 p-0 ml-5">
																 <input type="text" class="form-control phone" id="" placeholder="(例)09012341234" value="" name="phone_num">
															 </div>
														 </div>
													 </div>
												 </div>
											 </div>
										 </div>
									 </div>
								</div>
							</div>
							<div class="col-md-12 mt-4 p-0">
								<h6 style="color:red;">
									※こちらの商品はお届け指定日ができません
								</h6>
								<h6 style="color:red;">
									※送料はいただいておりません
								</h6>
							</div>
				        </section>


						{{-- <h3 class="step_title_area">
				        	<span class="steptext">Step</span><span class="stepcount">3</span>
				        	<span class="stepinfo">草案入力</span>
				    	</h3>

				        <section class="mt-3">
							<div class="col-md-12 p-0 mb-4">
								 <div class="row justify-content-center">
									 <div class="col-md-12 ">
										 <h5 class=" font-weight-bold ">プロジェクトの支援が完了しました。</h5>
									 </div>
								 </div>
								 <div class="row justify-content-center">
									 <div class="col-md-12 offset-md-1">
										 <div class="form-check pt-3 pb-3">
											 <input type="radio" class="form-check-input " id="" name="optradio1" checked>
											 <label class="form-check-label font-weight-bold">新しい送付先</label>
										 </div>
									 </div>
								 </div>
								 <div class="row justify-content-center">
									 <div class="col-md-12 offset-md-2">
										 <table>
											 <tr>
												 <th class="px-3 pb-2">ポイント残高</th> <th class="userPoint"  data-point = "{{ Auth::user()->point }}"> {{ Auth::user()->point }} ポイント</th>
											 </tr>
											 <tr>
												 <th class="px-3 py-2">支払ポイント</th> <th class="paymentPoint"> {{Cart::subtotal()}} ポイント</th>
											 </tr>
											 @php

											 @endphp
											 <tr>
												 <th class="px-3 py-2">購入後ポイント</th> <th class="restPoint">  ポイント</th>
											 </tr>
										 </table>
									 </div>
								 </div>
							</div>
				        </section> --}}

						<h3 class="step_title_area">
	 				        <span class="steptext">Step</span><span class="stepcount">3</span>
	 				        <span class="stepinfo">支払い情報入力</span>
	 				    </h3>

				 		<section class="mt-3">
							<div class="col-md-12 p-0 mb-4">
								 <div class="row justify-content-center">
									 <div class="col-md-12 ">
										 <h5 class=" font-weight-bold ">支払い情報入力</h5>
									 </div>
								 </div>
								 <div class="row justify-content-center">
									 <div class="col-md-12 offset-md-1">
										 <div class="form-check pt-3 pb-3">
											  <label class="form-check-label">
											    <input type="radio" class="form-check-input" name="optradio2" checked> ポイント払い
											  </label>
											</div>

									 </div>
								 </div>
								 <div class="row justify-content-center">
									 <div class="col-md-12 offset-md-2">
										 <table>
				 								<tr>
													 <th class="px-3 pb-2">ポイント残高</th>
													  <th class="userPoint"  data-point = "{{ Auth::user()->point }}"> {{ Auth::user()->point }} ポイント</th>
				 								</tr>
				 								<tr>
				 									<th class="px-3 py-2">支払ポイント</th> <th class="paymentPoint"> {{Cart::subtotal()}} ポイント</th>
				 								</tr>
				 								@php

				 								@endphp
				 								<tr>
													 <th class="px-3 py-2 hide" id="positive">購入後ポイント</th>
													 <th class="px-3 py-2 hide" id="negative">不足ポイント</th>
													 <th class="restPoint"> </th>

				 								</tr>
			 							</table>
									 </div>
								 </div>
								 <div class="row justify-content-center mt-4">
									 <div class="col-md-12 ">
										 <h5 class=" font-weight-bold ">不足ポイント分支払い</h5>
									 </div>
								 </div>
								 <div class="row justify-content-center mt-1">
									 <div class="col-md-12 offset-md-1">
										 <h6 class="">不足ポイント分をクレジットカードで支払いできます。</h6>
									 </div>
								 </div>
								 <div class="row justify-content-center mt-4">
									 <div class="col-md-12 offset-md-2">
										 <h6 class="font-weight-bold">カード情報入力</h6>
									 </div>
								 </div>
								 <div class="row  mt-1 ml-md-3">
									 <div class="col-md-7 offset-md-1" id="card-div">
										 <label for="">カードの名義 (例 TARO SUZUKI)</label>
										 <input type="text" name="name" class="form-control required card_name" value="">
										 <label for="">カード番号 ハイフンなし、半角英数字でご記入ください</label>
										 <input type="number" id="card_number" name="number" class="form-control card_number required" value="">
										 <span id="card-error" style="color:red;"></span>
										 <div class="row mt-2 pt-md-2">
											 <div class="col-3">
												 <label for="">有効期間</label>
												 <select name="exp_month" class="form-control exp_month required">
													 <?php for($i=1;$i<13;$i++){?>
														 <option value="{{$i}}">{{$i}}</option>
													 <?php }?>
												 </select>
											 </div>
											 <div class="col-1">
												 <label for="" class="text-white">hidden</label>
												 <p>/</p>
											 </div>

											 <div class="col-3 ">
												 <label for="" class="text-white">hidden</label>
												 <select name="exp_year" class="form-control exp_year required">
									 				<?php for($i=date('Y');$i<date('Y')+10;$i++){?>
									 					<option value="{{$i}}">{{$i}}</option>
									 				<?php }?>
									 			</select>
											 </div>
											 <div class="col-1"></div>
											 <div class="col-4">
												 <label for="">セキュリティコード</label>
												 <input type="number" min="0" class="form-control required cvv" name="cvv" value="">
											 </div>
										 </div>
									 </div>
								 </div>
							</div>
	 			        </section>

						<h3 class="step_title_area">
				        	<span class="steptext">Step</span><span class="stepcount">4</span>
				        	<span class="stepinfo">入力情報確認</span>
				    	</h3>

				        <section class="mt-3">

							<div class="col-md-12 p-0 mb-4">
								<div class="row ">
									<h5 class="col-md-12  font-weight-bold ">入力情報確認</h5>
								</div>

								<div class="row mt-5">
									<h4 class="ml-md-3">商品情報</h4>

									<div class="col-md-12">
										<table class="table">
											<tr class="bg-dark">
												<th class="text-center">商品名</th>
												<th class="text-center ml-1" >数量</th>
												<th class="text-center ml-1"colspan="2">必要ポイント</th>
											</tr>

											@foreach(Cart::content() as $p)
												@php
												$product = App\Models\Product::find($p->id)
												@endphp
												<tr>
													<td style="" class="">
														<div class="d-flex flex-row">
															<img src="{{ $product->image ?  asset('uploads/products/'.$product->image) : asset('uploads/projects/1615154785167836.jpeg')}}" alt=""  width="200px" height="150px;">
															<span class="px-2">
																{{ $product->title }} <br>
																M／ネイビー <br> {{ $p->point }} ポイント
															</span>
														</div>
													</td>
													<td class="text-center ml-1" >
														<div class="d-flex flex-row pt-5 justify-content-center">
															{{--  <button class="px-3 py-1 align-self-end border text-center bg-light decrease_btn" data-rowid="{{ $p->rowId }} " data-price="{{ $p->price }}">-</button>  --}}
															{{-- <form class="cart-item" action="{{route('front-cart-update')}}" method="get"> --}}
																<input type="hidden" name="row_id" value="{{$p->rowId}}">
																<input type="text" class="px-3 py-1 border align-self-start text-center cart_qty_{{ $p->rowId }}" name="quantity" value="{{ $p->qty }}" style="width:50px;">
															{{-- </form> --}}
															{{--  <button class="px-3 py-1 align-self-end border text-center bg-light increase_btn" data-rowid="{{ $p->rowId }}" data-price="{{ $p->price }}">+</button>  --}}
														</div>
													</td>
													<td colspan="2" text-align="center" class="text-center ml-1">
														<div class="pt-5">
															<h4 class="setPrice_{{ $p->rowId }}" style="letter-spacing:1px;"> {{ $p->qty*$p->price }} </h4>
														</div>
													</td>
												</tr>
											@endforeach
											<tr class="">
												<td class=" text-center">合計数 </td>
												<td colspan="2"  class="text-center"><h5 class="totalQty">{{Cart::count()}}</h5></td>
												<td class="text-center"> <h5 class="text-danger totalPrice">{{Cart::subtotal()}} P</h5></td>


											</tr>
										</table>
									</div>
								</div>

							</div>

							<div class="col-md-12 pt-1">
								<div class="row">
									<span>配送先</span>
									<div class="col-12  border p-2">
										<div class="row inner_inner  pl-0 ml-2 pb-4">
											<div class="col-md-12">
												<div class="row ">

													<div class="col-md-12 defaultAddress">
														<span> {{ $user->first_name }} {{ $user->last_name }}  ({{ $user->first_name }} {{ $user->last_name }}) <br>
															〒{{ $user->shipping_postal_code }} <br>
															{{ $user->shipping_prefecture }} {{ $user->shipping_municipility }} {{ $user->shipping_address }} {{ $user->shipping_city }} {{ $user->shipping_state }}
															{{ $user->shipping_room_num }}<br>
															電話番号: {{ $user->profile->phone_no }}
														</span>
													</div>
												</div>
											</div>
											<div class="col-md-12 setAddress hide">
												<div class="row ">
													<div class="col-md-12">
														<span> <span class="set_first_name"></span> <span class="set_last_name"></span>   ( <span class="set_phonetic1"></span> <span class="set_phonetic2"></span> ) <br>
															〒<span class="set_postal_code"></span>  <br>
															<span class="set_address"></span> <br>
															電話番号: <span class="set_phone_no"></span>
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 pt-3">
									<div class="row">
										<span class="p-0 col-12">支払情報</span> <br>
										<span class="p-0 col-12">ポイント払い</span>

										<div class="col-12  border p-2">
											<div class="row inner_inner">
												<div class="col-md-12 ">
													<table>
															<tr>
																	<th class="px-3 pb-2">ポイント残高</th>
																	<th class="userPoint"  data-point = "{{ Auth::user()->point }}"> {{ Auth::user()->point }} ポイント</th>
																</tr>
																<tr>
																	<th class="px-3 py-2">支払ポイント</th> <th class="paymentPoint"> {{Cart::subtotal()}} ポイント</th>
																</tr>
																@php

																@endphp
																<tr>
																	<th class="px-3 py-2 hide" id="pre-positive">購入後ポイント</th>
																	<th class="px-3 py-2 hide" id="pre-negative">不足ポイント</th>
																	<th class="restPoint"> </th>

																</tr>
												</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							<div class="col-md-12  pt-3">
								<div class="row">
									<span class="col-12 p-0">不足ポイント分支払い</span>
									<span class="col-12 p-0">支払カード情報</span>
									<div class="col-12  border">
										<div class="row">
										<div class="row inner_inner  pl-0 ml-2 pb-4">
											<div class="col-md-12 ">
												<div class="row ">
													<div class="col-md-12 p-2">
														<span>カード名義</span> <br>
														{{--  <h6 class="defaultAddress">{{ $user->first_name }} {{ $user->last_name }}</h6>  --}}
														<span class="card_name"></span> <br>
														<span>カード番号</span> <br>
														<h6 class="set_card_number">XXXX-XXXX-XXXX-1212</h6> <br>
														<span class="col-2">有効期限 <br>
															<h6> <span class="set_exp_month"></span> / <span class="set_exp_year"></span> </h6></span>
															<span class="col-3">セキュリティコード <br>
																<h6 class="security"></h6></span>
															</div>
														</div>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12 mt-5">
									<div class="row justify-content-center">
										<div class="col-8">
											<div class="text-center form-check">
												<span><input type="checkbox" class="form-check-input" id="exampleCheck1" value="1">
												<label class="form-check-label" for="exampleCheck1"><a href="{{route('front-terms')}}">利用規約</a>に同意

												</label>
												</span>
												<br>
													このプロジェクトはチャレンジ形式です。<br>
													目標金額に達していなくても、プロジェクトは期間が来れば成立となります。<br>
													支援後のキャンセルはできません。
											</div>
										</div>
									</div>
								</div>
						</section>

						<h3 class="step_title_area">
							<span class="steptext">Step</span><span class="stepcount">5</span>
							<span class="stepinfo">完了</span>
						</h3>

						<section>
							<div class="row justify-content-center">
								<div class="mt-5 col-md-12">
									<div class="">
										<h5 class="text-yellow font-weight-bold text-center">商品の購入が完了しました。</h5>
									</div>
								</div>
								<div class="mt-5 col-md-12">
									<div class="">
										<h6 class="font-weight-bold text-center">
											商品のご購入ありがとうございました。<br>
											お手元に届くまでもうしばらくお待ちください。

										</h6>
									</div>
								</div>

								<div class="col-md-12 text-center ">
									<a href="{{route('user-purchase-list')}}" class="text-center btn" style="background-color: #C6C6C6;color:#ffffff; margin-top: 30px;">< 戻 る</a>
								</div>
							</div>
						</section>

				    </div>
				</form>
			</div>
		</div>
	</div>
</div>

{{-- @include('user.layouts.add-project') --}}
@stop

@section('custom_js')

	<!-- <script src="//cdn.ckeditor.com/4.8.0/basic/ckeditor.js"></script> -->
	<script src="{{Request::root()}}/ckeditor/ckeditor.js"></script>

	<script type="text/javascript" src="{{Request::root()}}/js/jquery.validate.min.js"></script>
	
	<script type="text/javascript">
	// document.getElementById('#uncheck').checked = false;

	</script>


	<script type="text/javascript">
		$(window).on('load',function(){
			console.log('dfgdfg');

			var price = $(".price");

			var	totalPrice = 0;

			for(var i = 0; i < price.length; i++){
					// alert($(inputs[i]).val());
					totalPrice += parseFloat($(price[i]).html());
			}
			//console.log(totalPrice);
			$('.totalPrice').html(totalPrice + ' ' + 'P');
			// $('.paymentPoint').html(totalPrice);

		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){

			// console.log(n);
			$(document).on('click', '.decrease_btn', function(){
				var row_id = $(this).attr("data-rowid");
				var price = $(this).attr("data-price");

				var qty = parseInt($('.cart_qty_'+row_id).val());

				  var newQty = qty - 1;
				  if(newQty == 0){
					  $('.decrease_btn').attr('disabled', 'disabled');
				  }else{

					$('.decrease_btn').removeAttr('disabled');

				  }
				$('.cart_qty_'+row_id).val(newQty);
				var newPrice = newQty * price;
				// console.log(newQty * price);
				$('.setPrice_'+row_id).html(newPrice);
				var inputs = $(".qty");
				var	totalQty = 0;


				for(var i = 0; i < inputs.length; i++){
						// alert($(inputs[i]).val());
						totalQty += parseInt($(inputs[i]).val());
				}
				//console.log(totalQty);
				$('.totalQty').html(totalQty);

				var price = $(".price");

				var	totalPrice = 0;

				for(var i = 0; i < price.length; i++){
						// alert($(inputs[i]).val());
						totalPrice += parseFloat($(price[i]).html());
				}
				//console.log(totalPrice);
				$('.totalPrice').html(totalPrice + ' ' + 'P');
				// $('.paymentPoint').html(totalPrice);



			});

			$(document).on('click', '.increase_btn', function(){
				var row_id = $(this).attr("data-rowid");
				var price = $(this).attr("data-price");

				var qty = parseInt($('.cart_qty_'+row_id).val());
				var newQty = qty + 1;

				if(newQty > 0){
					$('.decrease_btn').removeAttr('disabled', 'disabled');
				}

				$('.cart_qty_'+row_id).val(newQty);
				var newPrice = newQty * price;
				$('.setPrice_'+row_id).html(newPrice);

				var inputs = $(".qty");
				var	totalQty = 0;


				for(var i = 0; i < inputs.length; i++){
						// alert($(inputs[i]).val());
						totalQty += parseInt($(inputs[i]).val());
				}
				//console.log(totalQty);
				$('.totalQty').html(totalQty);

				var price = $(".price");

				var	totalPrice = 0;

				for(var i = 0; i < price.length; i++){
						// alert($(inputs[i]).val());
						totalPrice += parseFloat($(price[i]).html());
				}
				//console.log(totalPrice);
				$('.totalPrice').html(totalPrice + ' ' + 'P');
				// $('.paymentPoint').html(totalPrice);




			});

			$('.error').addClass('text-danger');



		});

	</script>

	<script type="text/javascript">
		var form = $("#example-form");

		form.validate({
		    errorPlacement: function errorPlacement(error, element) { element.before(error); },
		});

		form.children("div").steps({
		    headerTag: "h3",
		    bodyTag: "section",
		    transitionEffect: "slideLeft",
		    // startIndex: 1,
		    startIndex: {{$finish?4:0}},
		    showFinishButtonAlways: false,

		    /* Labels */
		    labels: {
		        cancel: "Cancel?",
		        current: "current step:",
		        pagination: "Pagination",
		        finish: "完了!!",
		        next: "次へ >",
		        previous: "< 戻る",
		        loading: "Loading ..."
		    },

		  	onInit: function(event, currentIndex, newIndex){
		  		if(currentIndex == 4){
		        	$('.actions > ul > li:nth-child(1)').attr('style', 'display:none;');
					$('.actions > ul > li:nth-child(2)').attr('style', 'display:none;');
					$('.actions > ul > li:nth-child(3)').attr('style', 'display:none;');
		        }
		        $('.steps .current').prevAll().removeClass('done').addClass('disabled');
		  	},
		    onStepChanging: function (event, currentIndex, newIndex)
		    {
				if (currentIndex == 2 && newIndex == 3) {					
					var card = $('#card_number').val();
					if(card.length > 16 || card.length < 14){
						$('#card-error').html('正しい番号を入力してください。');
						$('.commonError').removeClass('hide');
						return false;
					}else{
						$('#card-error').html('');
						$('.commonError').addClass('hide');
						return true;
					}
				}

				if(currentIndex == 3){
					//
				}

				var checkCart = $('#checkCart').val();
				var checkQty = $('.qty').val();

				if(checkCart == 0 || checkQty == 0){
					return false;
				}
				
				if(newIndex > currentIndex){
					form.validate().settings.ignore = ":disabled,:hidden";
        			return form.valid();
				}	
					        
        		return true;
		    },
		    onStepChanged: function (event, currentIndex, newIndex)
		    {
				if(currentIndex == 3){
					var card_number = $('.card_number').val();
					var lastChar = card_number.slice(-4);

					$('.set_first_name').html($('.fname').val());
					$('.set_last_name').html($('.lname').val());
					$('.set_phonetic1').html($('.p1').val());
					$('.set_phonetic2').html($('.p2').val());

					$('.set_address').html($('.address').val());
					$('.set_postal_code').html($('input[name="postal_code"]').val());
					$('.set_phone_no').html($('.phone').val());

					$('.set_card_number').html('XXXX-XXXX-XXXX-'+lastChar);
					$('.set_exp_month').html($('.exp_month').val());
					$('.set_exp_year').html($('.exp_year').val());
					$('.security').html($('.cvv').val());
					$('.card_name').html($('.card_name').val());
				}

				if (currentIndex == 2 ) {
					var userPoint = parseInt($('.userPoint').html());
					var totalPrice = parseInt($('.totalPrice').html());
					$('.paymentPoint').html(totalPrice + ' ' + 'ポイント');
					var rest_number = userPoint - totalPrice ;
					var rest = Math.abs(rest_number);
					if(rest_number < 0){
						$('.restPoint').html(rest + ' ' + 'ポイント').addClass('text-danger');
						$('#negative').removeClass('hide');
					}else{
						$('.restPoint').html(rest + ' ' + 'ポイント').removeClass('text-danger');
						$('#positive').removeClass('hide');
					}
					// alert(totalPrice);
					if(userPoint > totalPrice){
						$("#card-div :input").attr("disabled", "disabled");
					}
				}
				if (currentIndex == 3 ) {
					var userPoint = parseInt($('.userPoint').html());
					var totalPrice = parseInt($('.totalPrice').html());
					$('.paymentPoint').html(totalPrice + ' ' + 'ポイント');
					var rest_number = userPoint - totalPrice ;
					var rest = Math.abs(rest_number);
					if(rest_number < 0){
						$('.restPoint').html(rest + ' ' + 'ポイント').addClass('text-danger');
						$('#pre-negative').removeClass('hide');
					}else{
						$('.restPoint').html(rest + ' ' + 'ポイント').removeClass('text-danger');
						$('#pre-positive').removeClass('hide');
					}
					// alert(totalPrice);
				}

		        if(currentIndex == 3){
		        	$('.actions > ul > li:last-child').attr('style', '');
		        	$('.actions > ul > li:nth-child(2)').attr('style', 'display:none;');
		        }
		    },
		    onFinishing: function (event, currentIndex)
		    {
				if(!$('#exampleCheck1').is(':checked')){
					//$('#exampleCheck1').addClass('required');
					alert('利用規約に同意  is need to be checked.');
					return false;
				}else{
					$('#exampleCheck1').removeClass('required');
				}
				form.validate().settings.ignore = ":disabled,:hidden";
	        	return form.valid();
		    },
		    onFinished: function (event, currentIndex)
		    {
		        form.submit();
		    }
		});

		var calculateDay = function(){
			var date1 = new Date($('#fromM').val()+"/"+$('#fromD').val()+"/"+$('#fromY').val());
			var date2 = new Date($('#toM').val()+"/"+$('#toD').val()+"/"+$('#toY').val());
			timeDiff = date2.getTime() - date1.getTime();
			if(timeDiff < 0){
				alert('invalid date');
				return false;
			}
			var timeDiff = Math.abs(timeDiff);
			var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
			if(diffDays > 70){
				alert('maximum day is 70.You have selected '+diffDays+' days');
				this.selectedIndex = $(this).data('lastSelectedIndex');
				e.preventDefault();
				return false;
			}
			$('#totalDay').val(diffDays);
		}


		calculateDay();


		$('select').each(function() {
		  $(this).data('lastSelectedIndex', this.selectedIndex);
		});

		$(".calculateDay").on("click", function() {
	       $(this).data('lastSelectedIndex', this.selectedIndex);
	    });

		$('.calculateDay').on('change', calculateDay);

		var basic = [
		  ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-', 'About']
		];

		$('.add_details').on('click', function(){
			var content = $('.details').html();
			$('.details_container').before(content);
			// CKEDITOR.replace( 'ckeditor' );
			// CKEDITOR.replaceClass = 'ckeditor';
		})
		$('.add_reward').on('click', function(){
			var content = $('.reward').html();
			$('.reward_container').before(content);
		});

		// console.log('new project');
		// $(function(){
			// CKEDITOR.replace( 'editor', {
			//     toolbar: basic
			// } );
			// CKEDITOR.replaceClass = 'ckeditor';
			// CKEDITOR.replace( 'description' ,{
				// filebrowserBrowseUrl : 'ckeditor1/plugins/imageuploader/imgbrowser.php',
				// filebrowserUploadUrl : '/browser1/upload/type/all',
			    // filebrowserImageBrowseUrl : '{{Request::root()}}/ckeditor/plugins/imageuploader/imgbrowser.php',
				// filebrowserImageUploadUrl : '/browser3/upload/type/image',
			    // filebrowserWindowWidth  : 800,
			    // filebrowserWindowHeight : 500,
				// extraPlugins: 'imageuploader'
				// extraPlugins: 'dropler'
			// });
		// });
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			var checkVal = $('.checkDefault').val();
			if (checkVal == 1) {
				$(".customAddress :input").attr("disabled", true);
			}

			$('.checkDefault').on('change', function(e){
				var value = $(this).val();
				if(value == 1){
					$(".customAddress :input").attr("disabled", true);
					$('.setAddress').addClass('hide');
					$('.defaultAddress').removeClass('hide')

				}else{
					$(".customAddress :input").attr("disabled", false);
					$(".customAddress :input").addClass("required");

					$('.setAddress').removeClass('hide');
					$('.defaultAddress').addClass('hide');
				}
			});
		})
	</script>

@stop
