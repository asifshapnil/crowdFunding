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
		.btn-bottom{
			color: #fff;
 background-color: #868e96;
 border-color: #868e96;
 width: 120px;

		}
		.btn-bottom:hover{
			color: #fff;
	 background-color: #727b84;
	 border-color: #6c757d;
		}
		.step{
			border: 2px solid #868e96;
		}
		.bg-dark{
			background-color: #CCCCCC;
		}
    tr{
      width: 750px;
    }
    .border-dark {
  border-color: #343a40 !important; }
  .form-control{
    border-radius: none !important;
  }

  .text-center {
  text-align: center !important; }
	</style>
@stop

@section('ecommerce')

@stop

@section('content')
@include('user.layouts.tab')


<div class="container">
	<div class="row">
		<div class="col-md-10 offset-md-1 col-sm-12">
			<div class="mt20">
				<div class="row">
					<div class="col-md-3">
						@include('user.layouts.profile')
					</div>
					<div class="col-md-9">
						@if (session('success'))
							<div class="row">
								<div class="col-md-12">
									<h4 class=" bg-info text-white">{{ session('success') }}</h4>

								</div>
							</div>
						@endif
						<div class="">
							<h4 class="py-2">配送先情報</h4>
							<div class="col-md-12 col-12">
								{!! Form::open(['route' => 'user-shipping-address-update-action', 'method' => 'post']) !!}

								<div class="row border">
									<div class="col-md-3 col-3 bg-dark">
										<p class="pt-3 ">氏名</p>
									</div>
									<div class="col-md-9 col-9 ">
										<div class="row pt-2">
											<div class="col-md-3 col-3 p-0 ml-5">
												<input type="text" class="form-control" id="" placeholder=" 姓" value="{{ $user->first_name }}" name="first_name">
												@if ($errors->has('first_name'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('first_name') }}</strong>
													</span>
												@endif
											</div>
											<div class="col-md-3 col-3 p-0 m-0">
												<input type="text" class="form-control mx-1" id="" placeholder="名" value="{{ $user->last_name }}" name="last_name">
												@if ($errors->has('last_name'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('last_name') }}</strong>
													</span>
												@endif
											</div>
										</div>
									</div>
								</div>

								<div class="row border">
									<div class="col-md-3 col-3 bg-dark">
										<p class="pt-3 ">フリガナ</p>
									</div>
									<div class="col-md-9 col-9 ">
										<div class="row pt-2">
											<div class="col-md-3 col-3 p-0 ml-5">
												<input type="text" class="form-control" id="" placeholder="セイ" value="{{ $user->profile->phonetic }}" name="first_name1">
												@if ($errors->has('first_name'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('first_name') }}</strong>
													</span>
												@endif
											</div>
											<div class="col-md-3 col-3 p-0 m-0">
												<input type="text" class="form-control mx-1" id="" placeholder="メイ" value="{{ $user->profile->phonetic1 }}" name="last_name1">
												@if ($errors->has('last_name'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('last_name') }}</strong>
													</span>
												@endif
											</div>
										</div>
									</div>
								</div>

								<div class="row border">
									<div class="col-md-3 col-3 bg-dark">
										<p class="pt-3 ">住所</p>
									</div>
									<div class="col-md-9 col-9 ">
										<div class="row pt-2">
											<div class="col-md-6 col-6 p-0 ml-5">
												<input type="number" class="form-control" id="postal_code" placeholder="郵便番号" name="shipping_postal_code" value="{{ $user->shipping_postal_code }}">
												<span id="postal_error" style="color:red;"></span>
												@if ($errors->has('postal_code'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('shipping_postal_code') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="row pt-2">
											<div class="col-md-3 col-3 p-0 ml-5">
												{{-- <input type="text" class="form-control" id="" placeholder="都道府県" name="division" value=""> --}}
												@include('user.layouts.prefectures', ['user' => $user])

												@if ($errors->has('division'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('shipping_prefecture') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="row pt-2">
											<div class="col-md-6 col-6 p-0 ml-5">
												<input type="text" class="form-control" id="" placeholder="市区町村" name="shipping_municipility" value="{{ $user->shipping_municipility }}">
												@if ($errors->has('municipility'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('shipping_municipility') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="row pt-2">
											<div class="col-md-6 col-6 p-0 ml-5">
												<input type="text" class="form-control" id="" placeholder="それ以降の住所" name="shipping_address" value="{{ $user->shipping_address }}">
												@if ($errors->has('address'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('shipping_address') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="row pt-2">
											<div class="col-md-6 col-6 p-0 ml-5">
												<input type="text" class="form-control" id="" placeholder="マンション名・部屋番号" name="shipping_room_num" value="{{ $user->shipping_room_num }}">
												@if ($errors->has('room_no'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('shipping_room_num') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<br>
									</div>
								</div>

								<div class="row border">
									<div class="col-md-3 col-3 bg-dark">
										<p class="pt-3 ">電話番号</p>
									</div>
									<div class="col-md-9 col-9 ">
										<div class="row pt-2">
											<div class="col-md-6 col-6 p-0 ml-5">
												<input type="text" class="form-control" id="" placeholder="(例)09012341234" value="{{ $user->shipping_phone_num }}" name="shipping_phone_num">
												@if ($errors->has('phone'))
													<span class="help-block text-danger">
														<strong>{{ $errors->first('shipping_phone_num') }}</strong>
													</span>
												@endif
											</div>

										</div>
									</div>
								</div>

								<div class="row p-5">
									<div class="col-md-2 col-2 offset-5">
										{{-- <button type="submit" class="btn btn-md btn-bottom">更新する</button> --}}
										<input type="submit" name="" value="更新する" class="btn btn-md btn-bottom" id="submit">
									</div>

								</div>
								{!! Form::close() !!}
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
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '#submit', function(){
			var postal = $('#postal_code').val();
			if(postal.length > 7 || postal.length < 7){
				$('#postal_error').html('Postal code takes only 7 character.');
				return false;
			}else{
				$('#postal_error').html('');

				return true;
			}
		});
	});
</script>
@stop
