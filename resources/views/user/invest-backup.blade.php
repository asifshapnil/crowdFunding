@extends('user.layouts.main')

@section('custom_css')
	<style type="text/css">

		.amount{
			border: 1px solid gray !important;
			padding: 5px;
		}
		.no-border{
			border: none;
		}
		.box{
			border: 1px solid gray !important;
		}
		.padding{
			padding: 10px;
		}
		.actions{
			text-align: center !important;
		}
		.table td, .table th{
			border: none;
			vertical-align: middle;
		}
		.box-invest{
			border: 1px solid #eeeeee;
		}
		.seperator{
			border-bottom: 1px solid gray;
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
			background-color: #0099FF;
			padding-left: 42px;
			margin-left: -8px;
		}
		.wizard>.steps .current a:after{
			content: '';
		    background: #0099FF;
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
			border: 2px solid #0099FF;
			background-color: #ffffff;
			padding-top: 3px;
    		padding-bottom: 3px;
    		position: relative;
    		border-right: none;
    		border-left: none;
		}
		.wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active{
			margin-left: -8px;
			border-left: 2px solid #0099FF;
			color: #aaaaaa;
		}
		.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
			content: '';
		    border-top: 2px solid #0099FF;
		    border-right: 2px solid #0099FF;
		    height: 50px;
		    width: 50px;
		    position: absolute;
		    top: 7.9px;
		    right: -24px;
		    transform: rotate(45deg);
		    z-index: 9;
		    background-color: #ffffff;
		}
		.wizard>.steps ul li:first-child a{
			margin-left: 0px !important;
		}
		.wizard>.steps ul{
			margin-top: 0px !important;
		}
		.wizard>.steps>ul>li {
			width: 19.5%;
		}
		/*steps end*/
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
					<div class="col-md-12">

						@include('layouts.message')

						<form id="example-form" action="" class="mt20" method="post" enctype="multipart/form-data">

							{{ csrf_field() }}
							<div class="mt20" id="invest">

								<h3 class="step_title_area">
									<span class="steptext">Step</span><span class="stepcount">1</span>
									<span class="stepinfo">支払金額選択</span>
								</h3>
								<section>
									<div class="row">
										<div class="col-md-8">
											<table class="table no-border">
												<?php foreach($p->reward as $r){?>
													<tr>



														<td class="box">
															<?php if($r->is_crofun_point){?>
																￥{{$r->amount}}（クロファンポイント{{$r->crofun_amount}}Ｐ）
															<?php }if($r->is_other){
																$rewardText = $r->other_description;
																?>
																{{$r->other_description}}
															<?php }?>
														</td>
														<td>X</td>
														<td class="text-center" style="width:100px;">
															<input class="form-control invest-amount required" type="number" name="quantity[]" style="display: inline;" value="{{$r->id == Request::get('reward')?1:0}}">
															<input type="hidden" name="reward_id[]" style="width: 50px" value="{{$r->id}}">
														</td>
													</tr>
												<?php }?>
											</table>


											<div class="row">
												<div class="col-md-8">
													<a class="btn btn-secondary btn-block" data-toggle="modal" data-target="#send-message">起案者へのメッセージ</a>
												</div>
												<div class="col-md-4">
													<a href="" class="btn btn-secondary btn-block">支払い方法/注意点等</a>
												</div>

											</div>

											<div class="form-check text-center mt20">
												<label class="form-check-label">
												<input type="checkbox" class="form-check-input required">
												規約同意等のチェック
												</label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="">
												<?php $col = 12;?>

												@include('front.layouts.project')
											</div>


										</div>
									</div>
								</section>
								<h3 class="step_title_area">
									<span class="steptext">Step</span><span class="stepcount">2</span>
									<span class="stepinfo">発送先住所入力</span>
								</h3>
								<section>

									<div class="form-check text-center mt20">
										<label class="form-check-label row">

												<div class="col-md-1">
													<input type="radio" value="1" name="shipping_address_radio" class="form-check-input shipping_address_radio">
												</div>
												<div class="col-md-10">
													<div class="amount">
														既に登録されている住所
													</div>
													<div class="hide existing_shipping_address text-left box-invest mt20">
														<table class="table">
															<tr>
																<td>郵便番号</td>
																<td>{{Auth::user()->shipping_postal_code}}</td>
															</tr>
															<tr>
																<td>都道府県</td>
																<td>{{Auth::user()->shipping_municipility}}</td>
															</tr>
															<tr>
																<td>市区町村</td>
																<td>{{Auth::user()->shipping_city}}</td>
															</tr>
															<tr>
																<td>それ以降の住所</td>
																<td>{{Auth::user()->shipping_address}}</td>
															</tr>
															<tr>
																<td>マンション名・部屋番号</td>
																<td>{{Auth::user()->shipping_room_num}}</td>
															</tr>

														</table>
													</div>

												</div>

										</label>

									</div>
									<div class="form-check text-center mt20">
										<label class="form-check-label row">

												<div class="col-md-1">
													<input type="radio" value="2" name="shipping_address_radio" class="form-check-input shipping_address_radio">
												</div>
												<div class="col-md-10">
													<div class="amount">
														新規住所入力
													</div>
													<div class="hide new_shipping_address box-invest mt20 text-left">
														<div class="row">
															<div class="form-group col-md-6">
																<label for="exampleInputPassword1">郵便番号</label>
																<input type="text" name="shipping_postal_code" class="form-control postal_code">
															</div>
															<div class="form-group col-md-6">
																<label for="exampleInputPassword1">都道府県</label>
																<input type="text" name="shipping_state" class="form-control state">
															</div>

															<div class="form-group col-md-6">
																<label for="exampleInputPassword1">市区町村</label>
																<input type="text" name="shipping_city" class="form-control city">
															</div>

															<div class="form-group col-md-6">
																<label for="exampleInputPassword1">それ以降の住所</label>
																<input type="text" name="shipping_street_address" class="form-control">
															</div>

															<div class="form-group col-md-12">
																<label for="exampleInputPassword1">マンション名・部屋番号</label>
																<input type="text" class="form-control address" name="shipping_address">
															</div>
														</div>

													</div>
												</div>



										</label>
									</div>

								</section>
								<h3 class="step_title_area">
									<span class="steptext">Step</span><span class="stepcount">3</span>
									<span class="stepinfo">支払情報入力</span>
								</h3>
								<section>
									<div class="form-check text-center mt20">
										<label class="form-check-label row">

												<div class="col-md-1">
													<input type="radio" name="card_info" value="1" class="form-check-input card_info">
												</div>
												<div class="col-md-11">
													<div class="amount">
														既に登録されているカード情報
													</div>

													<div class="hide existing_card_info text-left box-invest mt20">
														<?php foreach(Auth::user()->cards as $c){?>
															<div class="amount">
																<div class="row">
																	<div class="col-md-1">
																		<input type="radio" name="card" value="{{$c->id}}" class="card" data-value="{{$c->id}}">
																	</div>
																	<div class="col-md-4">
																		カード名義
																		<br>
																		<span class="n_c_name">{{$c->name}}</span>
																	</div>
																	<div class="col-md-4">
																		カード番号
																		<br>
																		<span class="n_c_number">{{substr_replace($c->number, str_repeat("X", 8), 4, 8)}}</span>
																	</div>
																	<div class="col-md-3">
																		有効期限
																		<br>
																		<span class="n_c_e_date">{{$c->exp_month.'/'.$c->exp_year}}</span>
																	</div>
																	<!-- <div class="col-md-2">
																		CVV
																		<br>
																		<span class="n_c_cvv">{{$c->cvv}}</span>
																	</div> -->
																</div>
															</div>
														<?php }?>
													</div>
												</div>

										</label>
									</div>
									<div class="form-check text-center mt20">
										<label class="form-check-label row">

												<div class="col-md-1">
													<input type="radio" name="card_info" value="2" class="form-check-input card_info">
												</div>
												<div class="col-md-11">
													<div class="amount">
														新規カード情報入力
													</div>

													<div class="hide new_card_info box-invest mt20 text-left">
														<div class="row">
															<div class="form-group col-md-12">
																<label for="exampleInputPassword1">カード名義</label>
																<input type="text" name="name" class="form-control n_c_name">
															</div>
														</div>
														<div class="row">
															<div class="form-group col-md-12">
																<label for="exampleInputPassword1">カード番号</label>
																<input type="text" name="number" class="form-control n_c_number">
															</div>
														</div>
														<div class="row">
															<div class="form-group col-md-6">
																<label for="exampleInputPassword1">有効期限</label>
																<div class="row">
																	<div class="col-md-5">
																		<select name="exp_month" class="form-control n_c_e_month">
																			<?php for($i=1;$i<13;$i++){?>
																				<option value="{{$i}}">{{$i}}</option>
																			<?php }?>
																		</select>
																	</div>
																	<div class="col-md-1">/</div>
																	<div class="col-md-6">
																		<select name="exp_year" class="form-control n_c_e_year">
																			<?php for($i=date('Y');$i<date('Y')+10;$i++){?>
																				<option value="{{$i}}">{{$i}}</option>
																			<?php }?>
																		</select>
																	</div>
																</div>
															</div>
															<div class="form-group col-md-6">
																<label for="exampleInputPassword1">CVV</label>
																<input type="number" name="cvv" class="form-control n_c_cvv">
															</div>

														</div>
													</div>
												</div>

										</label>
									</div>
								</section>
								<h3 class="step_title_area">
									<span class="steptext">Step</span><span class="stepcount">4</span>
									<span class="stepinfo">情報確認</span>
								</h3>
								<section>
									<div class="seperator padding mt20">

										<h4>プロジェクト名</h4>

										{{$p->title}}
									</div>
									<div class="seperator padding mt20">
										<h4>支援金額</h4>
										{{$p->budget}}
									</div>
									<!-- <div class="box">起案者へのコメント</div> -->
									<div class="seperator padding mt20">
										<h4>住所</h4>





										<div class="hide existing_shipping_address text-left box-invest mt20">
											<table class="table">
												<tr>
													<td>郵便番号</td>
													<td>{{Auth::user()->shipping_postal_code}}</td>
												</tr>
												<tr>
													<td>都道府県</td>
													<td>{{Auth::user()->shipping_municipility}}</td>
												</tr>
												<tr>
													<td>市区町村</td>
													<td>{{Auth::user()->shipping_city}}</td>
												</tr>
												<tr>
													<td>それ以降の住所</td>
													<td>{{Auth::user()->shipping_address}}</td>
												</tr>

												<tr>
													<td>マンション名・部屋番号</td>
													<td>{{Auth::user()->shipping_room_num}}</td>
												</tr>


											</table>
										</div>





										<div class="hide new_shipping_address text-left seperator mt20">
											<table class="table">
												<tr>
													<td>郵便番号</td>
													<td class="n_postal_code"></td>
												</tr>
												<tr>
													<td>都道府県</td>
													<td class="n_state"></td>
												</tr>
												<tr>
													<td>市区町村</td>
													<td class="n_city"></td>
												</tr>
												<tr>
													<td>それ以降の住所</td>
													<td class="n_s_address"></td>
												</tr>

												<tr>
													<td>マンション名・部屋番号</td>
													<td class="n_address"></td>
												</tr>

											</table>
										</div>

									</div>



									<div class="padding mt20" style="margin-bottom: 20px;">
										<h4>カード情報</h4>
										<div class="box-invest hide existing_card_info">
											<?php foreach(Auth::user()->cards as $c){?>
												<div class="row {{'card'.$c->id}} all_card_info">
													<div class="col-md-4">
														カード名義
														<br>
														<span class="n_c_name">{{$c->name}}</span>
													</div>
													<div class="col-md-4">
														カード番号
														<br>
														<span class="n_c_number">{{$c->number}}</span>
													</div>
													<div class="col-md-4">
														有効期限
														<br>
														<span class="n_c_e_date">{{$c->exp_month.'/'.$c->exp_year}}</span>
													</div>
													<!-- <div class="col-md-3">
														CVV
														<br>
														<span class="n_c_cvv">{{$c->cvv}}</span>
													</div> -->

												</div>
											<?php }?>
										</div>
										<div class="hide new_card_info">
											<div class="seperator padding mt20 row">
												<div class="col-md-3">
													カード名義
													<br>
													<span class="c_name"></span>
												</div>
												<div class="col-md-3">
													カード番号
													<br>
													<span class="c_number"></span>
												</div>
												<div class="col-md-3">
													有効期限
													<br>
													<span class="c_e_date"></span>
												</div>
												<!-- <div class="col-md-3">
													CVV
													<br>
													<span class="c_cvv"></span>
												</div> -->

											</div>


										</div>
									</div>
								</section>
								<h3 class="step_title_area">
									<span class="steptext">Step</span><span class="stepcount">5</span>
									<span class="stepinfo">完了</span>
								</h3>
								<section>
									<div class="divider"></div>
									<div class="text-center">
										支援が完了しました。
										<br>
										<a href="{{route('user-invest-list')}}">→マイページへ</a>
									</div>

								</section>
							</div>
						</form>
					</div>
				</div>

			</div>

		</div>
	</div>
</div>

<?php
	$owner = $p->user;
?>

@include('user.layouts.message_modal')


@stop

@section('custom_js')


{{-- <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script> --}}

	<script type="text/javascript">
		// var form = $("#steps");


		var form = $("#example-form");

		// form.validate({
		// 	errorPlacement: function errorPlacement(error, element) { element.before(error); },
		// });


		form.children("div").steps({
		    headerTag: "h3",
		    bodyTag: "section",
		    transitionEffect: "slideLeft",
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
		        	$('.actions > ul > li:nth-child(4)').attr('style', 'display:none;');
		        }
		        $('.steps .current').prevAll().removeClass('done').addClass('disabled');
			},
		  	onStepChanged: function (event, currentIndex, newIndex)
		    {
		        if(currentIndex == 3){
		        	$('.actions > ul > li:last-child').attr('style', '');
		        	$('.actions > ul > li:nth-child(2)').attr('style', 'display:none;');
		        }
		    },
		    onStepChanging: function (event, currentIndex, newIndex)
		    {
				var valid = false;
				// form.validate().settings.ignore = ":disabled,:hidden";
        		// return valid = form.valid();
				// if (valid == false) return false;
				// if(currentIndex == 0){
				// 	var inputs = $('.invest-amount');
				// 	for(var i =0; i < inputs.length; i++){
				// 		if($(inputs).val() > 0) return true;
				// 	}
				// }

				return true;
		    },
		    onFinishing: function (event, currentIndex)
		    {
		        // var valid = false;
				// form.validate().settings.ignore = ":disabled,:hidden";
        		// valid = form.valid();
				// if (valid == false) return false;
				// if(currentIndex == 0){
				// 	var inputs = $('.invest-amount');
				// 	for(var i =0; i < inputs.length; i++){
				// 		if($(inputs).val() > 0) return true;
				// 	}
				// }

				return true;
		    },
		    onFinished: function (event, currentIndex)
		    {
		        form.submit();
		    }
		});

		$(function(){
			$('.shipping_address_radio').on('click', function(){
				var value = $(this).val();
				if(value == 1){
					$('.existing_shipping_address').show();
					$('.new_shipping_address').hide();
				}else{
					$('.existing_shipping_address').hide();
					$('.new_shipping_address').show();
				}
			});
			$('.card_info').on('click', function(){
				var value = $(this).val();
				if(value == 1){
					$('.existing_card_info').show();
					$('.new_card_info').hide();
					$('.card').on('click', function(){
						$('.all_card_info').hide();
						$('.card'+$(this).attr('data-value')).show();
						console.log($(this).attr('data-value'));

					})
				}else{
					$('.existing_card_info').hide();
					$('.new_card_info').show();
				}
			});
		});


		$('.n_c_name').change(function(){
			console.log('this is ok');
			var card_info = $("input[name='card_info']:checked").val();
            if(card_info == 1){

            }else{
            	console.log('this is working');
            	$('.c_name').html($(this).val());
            }
		});
		$('.n_c_number').change(function(){
			console.log('this is ok');
			var card_info = $("input[name='card_info']:checked").val();
            if(card_info == 1){

            }else{
            	console.log('this is working');
            	$('.c_number').html($(this).val());
            }
		});
		$('.n_c_cvv').change(function(){
			console.log('this is ok');
			var card_info = $("input[name='card_info']:checked").val();
            if(card_info == 1){

            }else{
            	console.log('this is working');
            	$('.c_cvv').html($(this).val());
            }
		});
		$('.n_c_e_month').change(function(){
			console.log('this is ok');
			var card_info = $("input[name='card_info']:checked").val();
            if(card_info == 1){

            }else{
            	console.log('this is working');
            	$('.c_e_date').html($(this).val()+'/'+$('.n_c_e_year').val());
            }
		});
		$('.n_c_e_year').change(function(){
			console.log('this is ok');
			var card_info = $("input[name='card_info']:checked").val();
            if(card_info == 1){

            }else{
            	console.log('this is working');
            	$('.c_e_date').html($('.n_c_e_month').val()+'/'+$(this).val());
            }
		});







		$('.address').change(function(){
			console.log('this is ok');
			var shipping_address_radio = $("input[name='shipping_address_radio']:checked").val();
            if(shipping_address_radio == 2){
            	console.log('this is working');
            	$('.n_address').html($(this).val());
            }
		});
		$('.s_address').change(function(){
			console.log('this is ok');
			var shipping_address_radio = $("input[name='shipping_address_radio']:checked").val();
            if(shipping_address_radio == 2){
            	console.log('this is working');
            	$('.n_s_address').html($(this).val());
            }
		});
		$('.city').change(function(){
			console.log('this is ok');
			var shipping_address_radio = $("input[name='shipping_address_radio']:checked").val();
            if(shipping_address_radio == 2){
            	console.log('this is working');
            	$('.n_city').html($(this).val());
            }
		});
		$('.state').change(function(){
			console.log('this is ok');
			var shipping_address_radio = $("input[name='shipping_address_radio']:checked").val();
            if(shipping_address_radio == 2){
            	console.log('this is working');
            	$('.n_state').html($(this).val());
            }
		});
		$('.postal_code').change(function(){
			console.log('this is ok');
			var shipping_address_radio = $("input[name='shipping_address_radio']:checked").val();
            if(shipping_address_radio == 2){
            	console.log('this is working');
            	$('.n_postal_code').html($(this).val());
            }
		});
		$('.country').change(function(){
			console.log('this is ok');
			var shipping_address_radio = $("input[name='shipping_address_radio']:checked").val();
            if(shipping_address_radio == 2){
            	console.log('this is working');
            	$('.n_country').html($(this).val());
            }
		});



	</script>
@stop
