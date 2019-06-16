@extends('front.layouts.main')

@section('custom_css')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.standalone.min.css">
	<style type="text/css">

		.cart th{
			border: 1px solid black;
			padding: 5px;
			text-align: center;
		}
		.cart tbody tr{
			border-bottom: 1px solid black;
		}
	</style>
@stop


@section('ecommerce')
	@include('front.layouts.ecommerce')
@stop

@section('content')


<div class="container">


<div class="mt20">
	<div class="row">

		<div class="col-md-3">
			@include('front.layouts.product_menu')
		</div>



		<div class="col-md-9">

			<form action="{{route('user-product-purchase')}}" method="post">

				{{ csrf_field() }}

			<div class="box-invest text-center">お届け指定日</div>
			<div class="form-group mt20">
				<input type="radio" name="delivery_option" value="1" required> 指定なし
			</div>
			<div class="form-group">
				<input type="radio" name="delivery_option" value="2" checked> 日時指定
				<div class="row">
					<div class="col-md-1">
						日付:
					</div>
					<div class="col-md-3">
						<input type="text" name="delivery_date" class="datepicker form-control" value="{{date("Y-m-d", strtotime("+3 days"))}}">
					</div>
					<div class="col-md-2 text-right">
						時間帯:
					</div>

					<div class="col-md-6">
						<input type="radio" name="delivery_time" value="1" checked> 午前中
						<input type="radio" name="delivery_time" value="2"> 12-14 時
						<input type="radio" name="delivery_time" value="3"> 14-16 時
						<input type="radio" name="delivery_time" value="4"> 16-18 時
						<input type="radio" name="delivery_time" value="5"> 18-20 時
					</div>
					 
				</div>
			</div>
			<div class="form-group">
				<input type="radio" name="delivery_option" value="3"> 即日配送
			</div>

			<div class="box-invest text-center">お支払いポイント</div>
			<div class="mt20">

				<?php
				$remaining = 0;
				$cartSubtotal = (float)Cart::subtotal(false, false, false);
				if($cartSubtotal > Auth::user()->point){
					$remaining = $cartSubtotal-Auth::user()->point;
				}
				?>


				<table class="table">
					<tr>
						<td colspan="3" class="text-right">あなたの持っているポイント</td>
						<td>{{Auth::user()->point}} P</td>
						
					</tr>
					<tr>
						<td colspan="3" class="text-right"><input type="checkbox" name="payment" class="card_payment"> 不足分ポイント</td>
						<td>{{$remaining.' P -> '.$remaining.' 円'}}</td>
					</tr>
					<tr class="hide new_card_info">
						<td colspan="4" class="box-invest mt20 text-left">


							<?php
							foreach(Auth::user()->cards as $c){?>
								<div class="box row">
					    			<div class="col-md-1">
					    				<input type="radio" name="card" value="{{$c->id}}">
					    			</div>
					    			<div class="col-md-4">
					    				Card Holder Name
					    				<br>
					    				{{$c->name}}
					    			</div>
					    			<div class="col-md-4">
					    				Card Number
					    				<br>
					    				{{substr_replace($c->number, str_repeat("X", 8), 4, 8)}}
					    			</div>
					    			<div class="col-md-3">
					    				Expiry Date
					    				<br>
					    				{{$c->exp_month.'/'.$c->exp_year}}
					    			</div>
					    			
					    		</div>
							<?php }?>

							<input type="radio" name="card" value="0" checked>

				    		<div class="row">
								<div class="form-group col-md-12">
									<label for="exampleInputPassword1">Card Holder Name</label>
									<input type="text" name="name" class="form-control">
								</div>
				    		</div>
				    		<div class="row">
								<div class="form-group col-md-12">
									<label for="exampleInputPassword1">Card Number</label>
									<input type="text" name="number" class="form-control">
								</div>
							</div>
				    		<div class="row">
								<div class="form-group col-md-6">
									<label for="exampleInputPassword1">Expiry Date</label>
									<div class="row">
										<div class="col-md-5">
											<select name="exp_month" class="form-control">
												<?php for($i=1;$i<13;$i++){?>
													<option value="{{$i}}">{{$i}}</option>
												<?php }?>
											</select>
										</div>
										<div class="col-md-1">/</div>
										<div class="col-md-6">
											<select name="exp_year" class="form-control">
												<?php for($i=date('Y');$i<date('Y')+10;$i++){?>
													<option value="{{$i}}">{{$i}}</option>
												<?php }?>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group col-md-6">
									<label for="exampleInputPassword1">CVV</label>
									<input type="number" name="cvv" class="form-control">
								</div>
								
				    		</div>
			    		</td>
					</tr>
					<tr>
						<td>合計数</td>
						<td>{{Cart::count()}}</td>
						<td>合計ポイント</td>
						<td>{{$cartSubtotal}}P</td>
					</tr>
					<tr>
						<td colspan="3" class="text-center">購入後 所持ポイント</td>
						<td>{{Auth::user()->point+$remaining-$cartSubtotal}}P</td>
					</tr>
				</table>
			</div>
			

			<div class="text-center mt20">
				<button type="submit" class="btn btn-warning">注文を確定する</button>
				<!-- <form action="{{route('user-product-payment')}}" method="POST">
				  <script
				      src="https://multipay.komoju.com" class="komoju-button"
				      data-key="pk_44c9b8face2b6e8a02d1315dce34a778b0725c4d"
				      data-amount="1000"
				      data-endpoint="https://sandbox.komoju.com"
				      data-currency="JPY"
				      data-locale="en"
				      data-title="Product Name"
				      data-description="Product Description"
				      data-methods="credit_card,konbini,bank_transfer,pay_easy">
				  </script>
				</form> -->
			</div>

			</form>

			
		</div>

		
	</div>
	
</div>

</div>







@stop

@section('custom_js')

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

	<script type="text/javascript">
		$('.datepicker').datepicker({
		    'format': 'yyyy-mm-dd',
		    'startDate': '+3d',
		    'autoclose': true
		});

		$('.card_payment').on('change', function(){
			if(this.checked) {
		        $('.new_card_info').show();
		        $('.new_card_info').children('input').each(function () {
				    this.addAttr('required');
				});
		    }else{
		    	$('.new_card_info').hide();
		    	$('.new_card_info').children('input').each(function () {
				    this.removeAttr('required');
				});
		    }
			
		});
	</script>

@stop