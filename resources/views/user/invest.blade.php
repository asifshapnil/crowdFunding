@extends('user.layouts.main')

@section('custom_css')
	<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 25%;
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
			background-color: #039aff;
			padding-left: 42px;
			margin-left: -8px;
		}
		.wizard>.steps .current a:after{
			content: '';
		    background: #039aff;
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
			border: 2px solid #039aff;
			border-left: 2px solid #039aff !important;
			background-color: #ffffff;
			padding-top: 3px;
    		padding-bottom: 3px;
    		position: relative;
    		border-right: none;
    		border-left: none;
		}
		.wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active{
			margin-left: -8px;
			border-left: 2px solid #039aff;
			color: #aaaaaa;
		}
		.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
			content: '';
		    border-top: 2px solid #039aff;
		    border-right: 2px solid #039aff;
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
			width: 19.5%;
		}
		/*steps end*/
		.rewardtitlearea{
			width: 100%;
		    font-size: 25px;
		    border-bottom: 2px solid #039aff;
		    padding-bottom: 5px;
		    padding-left: 0px;
		    margin-left: 0px;
		    margin-bottom: 30px;
		}
		.oneCheck{
			margin-top: 15px;
		}
		.rewardimgarea{
			/* width: 100%; */
		}
		.product_hunt{
			font-size: 20px;
		}
		.product_hunt i{
			display: inline-block;
			margin-right: 7px;
		}
		.setdata{
			margin-bottom: 20px;
		}
		.pl-1{
			padding-left: 1rem!important;
		}
		.breadcrump{
			background-color:#F1F1F1;
		}
	</style>
@stop


@section('ecommerce')

@stop

@section('content')
@include('user.layouts.invest-breadcrump')





<div class="container" id="new-project">

	<div class="card commonError hide offset-md-1 mt-3">
		<h4 class='p-3' style="color:red;">正しく入力されてない項目があります。メッセージをご確認の上、もう一度入力ください。</h4>
	</div>

	<div class="mt20">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<h1 class="text-center page_title_product_register">プロジェクトを支援する</h1>
				<form id="example-form" action="{{ route('user-invest-action', $p_id) }}" class="mt20" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
				    <div class="mt20">
						<h3 class="step_title_area">
				        	<span class="steptext">Step</span><span class="stepcount">1</span>
				        	<span class="stepinfo">リターン選択</span>
				    	</h3>

				      <section class="mt-3">
										<div class="row justify-content-center">
											<div class=" col-12">
												<div class="mt-3">
													<div class="row">

														<div class="col-md-12 mb-4">
															<h4>リターンをお選びください</h4>
														</div>
														<div class="col-md-12 ">
															@if ($p->reward)

															@foreach ($p->reward as $r)
																<div class="row setdata set-{{ $r->id }}">
																<div class="col-12">
																	<div class="form-check">
																		<input type="radio" class="form-check-input oneCheck" data-id="{{ $r->id }}" name="reward_id" value="{{$r->id}}" required checked>
																		<label class="form-check-label rewardtitlearea">￥{{ $r->amount }}コース </label>
																	</div>
																</div>
																<div class="col-md-10 offset-md-1">
																	<div class="row inner_inner horizontal ">
																		<div class="col-md-5">

																					<img src="{{$p->featured_image ?  asset('uploads/projects/'.$p->featured_image) : asset('uploads/projects/1615154785167836.jpeg')}}" alt="" class="img-fluid rewardimgarea">

																		</div>
																		<div class="col-md-7">
																			<div class="row ">
																				<div class="col-md-12">
																					<span class="text-primary product_hunt">
																						{{-- <input class="form-control invest-amount required" type="hidden" name="quantity" style="display: inline;" value="{{$r->id == Request::get('reward')?1:0}}"> --}}
																						{{-- {{ $r->id == Request::get('reward')?1:0 }} --}}
																						{{-- <input type="hidden" name="reward_id[]" style="width: 50px" value="{{$r->id}}"> --}}
																						<i class="fa fa-product-hunt"></i>{{ $r->is_crofun_point }}	ポイント
																					</span>
																				</div>
																			</div>
																			<div class="row mt-1">
																				<div class="col-md-12">
																					<span class="font-weight-bold " style="font-size:20px">{{ $r->is_other }}</span>
																					<br>
																				</div>
																			</div>
																			<div class="row mt-1">
																				<div class="col-md-12">
																					<span>
																						{{ $r->other_description }}
																					</span>
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
									</section>
									<h3 class="step_title_area">
										<span class="steptext">Step</span><span class="stepcount">2</span>
										<span class="stepinfo">配送先情報入力</span>
									</h3>


									<section>
										<div class="row" style="margin-top: 20px;">
											<div class="col-md-12 mb-4">
												<h4>配送先</h4>
											</div>
										</div>
										<div class="col-md-12 p-0 mb-4">
											<div class="row">
												 <div class="col-md-10">
													 <div class="">
															<label class="form-check-label check-first  pt-3">
																<input type="radio" class="form-check-input checkDefault" name="shipping_address_radio" value="1" checked>
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
										<div class="col-md-12 p-0 mb-4">
											<div class="row">
												 <div class="col-12">
													 <div class="pt-3 pb-3">
														<label class="form-check-label check-first  pt-3">
															<input type="radio" id="check_to_set" class="form-check-input checkDefault" name="shipping_address_radio" value="2">
														新しい送付先
														</label>
													</div>
												 </div>
												 <div class="col-12 customAddress hide">
													 <div class="row inner_inner  pl-1 ml-2 pb-4">
														 <div class="col-md-9">
															 <div class="row border">
																 <div class="col-md-3 col-3 bg-dark">
																	 <p class="pt-3 ">氏名</p>
																 </div>
																 <div class="col-md-9 col-9 bg-white">
																	 <div class="row pt-2">
																		 <div class="col-md-3 col-3 p-0 ml-5">
																			 <input type="text" class="form-control required fname" id="" placeholder="姓" value="" name="first_name" >
																		 </div>
																		 <div class="col-md-3 col-3 p-0 m-0">
																			 <input type="text" class="form-control mx-1 required lname" id="" placeholder="名" value="" name="last_name" >
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
																			 <input type="number" class="form-control required postal" onkeyup="limit(this)" id="" placeholder="郵便番号" name="postal_code" value="">
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
																			 <input type="text" class="form-control " id="" placeholder="マンション名・部屋番号" name="room_no" value="">
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

										</section>

										<h3 class="step_title_area">
											<span class="steptext">Step</span><span class="stepcount">3</span>
											<span class="stepinfo">支払情報入力</span>
										</h3>

										<section>
											<div class="col-md-12 p-0 mb-4">
												<input type="hidden" name="card_info" value="2" class="form-check-input card_info">


												 <div class="row mt-4" style="margin-bottom: 20px;">
													 <div class="col-md-8 offset-md-2">
														 <h6 class="font-weight-bold">支払い情報入力</h6>
													 </div>
												 </div>
												 <div class="row">
													 <div class="col-md-8 offset-md-2">
														 <label for="">カードの名義 (例 TARO SUZUKI)</label>
														 <input type="text" name="card_name" id="card-field" class="form-control required card_name" value="">
														 <span id="card-name-error" style="color: red;"></span> <br>
														 <label for="">カード番号 ハイフンなし、半角英数字でご記入ください</label>
														 <input type="number" name="number" id="card_number" class="form-control required card_number" value="">
														 <span id="card-error" style="color:red;"></span>

														 <div class="row mt-2 pt-md-2">
															 <div class="col-3">
																 <label for="">有効期間</label>
																 <select name="exp_month" class="exp_month form-control required">
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
																 <select name="exp_year" class=" exp_year form-control required">
													 				<?php for($i=date('Y');$i<date('Y')+10;$i++){?>
													 					<option value="{{$i}}">{{$i}}</option>
													 				<?php }?>
													 			</select>
															 </div>

															 <div class="col-3 ml-5">
																 <label for="">セキュリティコード</label>
																 <input type="number" class="form-control required cvv" id="card-security" name="cvv" value="">
																 <span id="card-security-error" style="color: red;"></span> <br>
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
										<section>
											<div class="row justify-content-center">
												<div class="col-md-12" style="margin-top: 20px;">
													<h4>支払情報入力</h4>
												</div>
												<div class="col-md-12 ">
													<div class="row">
														<div class="col-12">
															<div class="form-check pl-5 pt-3">
																<input type="radio" class="form-check-input" name="optradio1" checked>
																<label class="form-check-label">選択したリターン</label>
															</div>
														</div>
														<div class="col-10  border offset-md-1 p-2">
															<div class="row inner_inner  pl-0 ml-2 pb-4">
																<div class="col-md-5">
																	<div class="row">
																		<div class="col-md-12 project-item">
																			<span class="pt-2">￥{{ $r->amount }} コース</span>
																			<img src="{{$p->featured_image ?  asset('uploads/projects/'.$p->featured_image) : asset('uploads/projects/1615154785167836.jpeg')}}" alt="" class="img-fluid">
																		</div>
																	</div>
																</div>
																<div class="col-md-7">
																	<div class="row ">
																		<div class="col-md-12">
																			<span class="text-primary"><i class="fa fa-product-hunt"></i> {{ $r->is_crofun_point }}ポイント</span>
																		</div>
																	</div>
																	<div class="row mt-1">
																		<div class="col-md-12">
																			<span class="font-weight-bold " style="font-size:20px">{{ $p->title }}</span>
																			<br>
																		</div>
																	</div>
																	<div class="row mt-1">
																		<div class="col-md-12">
																			<span>{!! $p->description !!}</span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="row">
															<div class="col-12">
																<div class="form-check pl-5 pt-3">
																	<input type="radio" class="form-check-input" name="optradio2" checked>
																	<label class="form-check-label">配送先 </label>
																</div>
															</div>
															<div class="col-10  border offset-md-1 p-2">
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
																			<div class="col-md-12 setAddress">
																				<div class="row ">
																					<div class="col-md-12">
																						<span> <span class="set_first_name"></span> <span class="set_last_name"></span>  ( <span class="set_phonetic1"></span>  <span class="set_phonetic2"></span> ) <br>
																						〒<span class="set_postal_code"></span>  <br>
																							<span class="set_address"></span>  <br>
																							電話番号: <span class="set_phone_no"></span>
																						</span>
																					</div>
																				</div>
																			</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-12 ">
															<div class="row">
																<div class="col-12">
																	<div class="form-check pl-5 pt-3">
																		<input type="radio" class="form-check-input" name="optradio3" checked>
																		<label class="form-check-label">支払情報 </label>
																	</div>
																</div>
																<div class="col-10  border offset-md-1">
																	<div class="row inner_inner  pl-0 ml-2 pb-4">
																		<div class="col-md-12 ">
																			<div class="row ">
																				<div class="col-md-12 p-2">
																					<span>カード名義</span> <br>
																					{{--  <h6 class="">{{ $user->first_name }} {{ $user->last_name }}</h6>  --}}
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
																<div class="col-md-12 mt-5">
																	<div class="row justify-content-center">
																		<div class="col-8">
																			<p class="text-center">
																				<span>	<input type="checkbox" name="" id="exampleCheck1" value="">
																				<a target="_blank" href="{{route('front-terms')}}">利用規約</a>に同意 </span> <br>
																					このプロジェクトはチャレンジ形式です。<br>
																					目標金額に達していなくても、プロジェクトは期間が来れば成立となります。<br>
																					支援後のキャンセルはできません。</p>
																				</div>
																			</div>
																		</div>
																	</div>
																</section>
																<h3 class="step_title_area">
																	<span class="steptext">Step</span><span class="stepcount">5</span>
																	<span class="stepinfo">支援完了</span>
																</h3>

																<section>
																	<div class="row justify-content-center">
																		<div class="col-md-12">
																			<div class="row justify-content-center" style="margin-top: 20px;">
																				<div class="col-md-12 text-center">
																					<h5 class="text-info font-weight-bold text-center">プロジェクトの支援が完了しました。</h5>
																				</div>
																			</div>
																			<div class="row justify-content-center mt-5">
																				<div class="col-md-12">
																					<h6 class=" font-weight-bold text-center">プロジェクトのご支援ありがとうございました。
																						<br> <br> 引き続き応援よろしくお願いいたします。
																					</h6>
																				</div>
																			</div>
																			<div class="row justify-content-center mt-5">
																				<div class="col-md-12 text-center ">
																					<button class="text-center btn btn-md btn-primary  msg_send_btn" data-user_id="{{ $p->user->id }}" data-project_username="{{ $p->user->first_name .' '.$p->user->last_name }}" style="cursor:pointer; color:#fff;">
																						<span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span>プロジェクトの起案者へメッセージを送る
																					</button>
																				</div>
																				<div class="col-md-12 text-center ">
																				<a href="{{route('user-invest-list')}}" class="text-center btn" style="background-color: #C6C6C6;color:#ffffff; margin-top: 30px;">< 戻 る</a>
																				</div>
																			</div>
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
@include('user.layouts.message_modal')


@section('custom_js')


	<!-- <script src="//cdn.ckeditor.com/4.8.0/basic/ckeditor.js"></script> -->
	<script src="{{Request::root()}}/ckeditor/ckeditor.js"></script>

	<script type="text/javascript" src="{{Request::root()}}/js/jquery.validate.min.js"></script>
	<script type="text/javascript">
		function limit(element)
		{
			var max_chars = 7;

			if(element.value.length > max_chars) {
				element.value = element.value.substr(0, max_chars);
			}
		}
	</script>

	<script type="text/javascript">
			$(document).ready(function(){
				$('.msg_send_btn').on('click', function(e){
					var user_id = $(this).attr('data-user_id');
					var user_name = $(this).attr('data-project_username');


					$('#to_id').val(user_id);
					$('#project_user_name').html(user_name);
					$('#send-message').modal('show');
					//$('#send-message').addClass('show');
				});
			});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.oneCheck').on('change', function(e){
				// console.log('1');
				var rowid = $(this).attr('data-id');
				// console.log(rowid);

				// $('.set-'+rowid).addClass('bg-sky');

			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			var checkVal = $('.checkDefault').val();
			if (checkVal == 1) {
				$(".customAddress :input").attr("disabled", true);
				$('.setAddress').addClass('hide');

			}


			$('.checkDefault').on('change', function(e){
				var value = $(this).val();
				if(value == 1){
					$(".customAddress :input").attr("disabled", true);
					$('.setAddress').addClass('hide');
					$('.customAddress').addClass('hide');
					$('.defaultAddress').removeClass('hide')


				}else{
					$('.customAddress').removeClass('hide');

					$(".customAddress :input").attr("disabled", false);
					$(".customAddress :input").addClass("required");

					$('.setAddress').removeClass('hide');
					$('.defaultAddress').addClass('hide')


				}
			});
		})
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
				previous: "< 前へ",
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
					var error = 0;

					var card = $('#card_number').val();
					if(card.length > 16 || card.length < 14){
						$('#card-error').html('正しい番号を入力してください。');
						$('.commonError').removeClass('hide');
						 error = 1; 
					}else{
						$('#card-error').html('');
						$('.commonError').addClass('hide');
						 error = 0; 
					}
					if($('#card-field').val().length == 0){
						$('#card-name-error').html(' この項目は必須です');
						$('.commonError').removeClass('hide');
						error = 1;
					}else{
						$('#card-name-error').html('');
						$('.commonError').addClass('hide');
						error = 0;
					}
					if($('#card-security').val().length == 0){
						$('#card-security-error').html(' この項目は必須です');
						$('.commonError').removeClass('hide');
						error = 1;
					}else{
						$('#card-security-error').html('');
						$('.commonError').addClass('hide');
						error = 0;
					}

					if(error == 1){
						return false;
					}else{
						return true;
					}
				}


				if(currentIndex == 1 && form.valid() === false){
					$('.commonError').removeClass('hide');
				}else if(!$(".commonError").hasClass("hide")){
					$('.commonError').addClass('hide');
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
				// return true;
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
		});

		$('.add_reward').on('click', function(){
			var content = $('.reward').html();
			$('.reward_container').before(content);
		});

		// console.log('new project');
		$(function(){
			CKEDITOR.replace( 'editor', {
					toolbar: basic
			} );
			// CKEDITOR.replaceClass = 'ckeditor';
			CKEDITOR.replace( 'description' ,{
				// filebrowserBrowseUrl : 'ckeditor1/plugins/imageuploader/imgbrowser.php',
				// filebrowserUploadUrl : '/browser1/upload/type/all',
					filebrowserImageBrowseUrl : '{{Request::root()}}/ckeditor/plugins/imageuploader/imgbrowser.php',
				// filebrowserImageUploadUrl : '/browser3/upload/type/image',
					// filebrowserWindowWidth  : 800,
					// filebrowserWindowHeight : 500,
				extraPlugins: 'imageuploader'
				// extraPlugins: 'dropler'
			});
		});
	</script>
@stop
