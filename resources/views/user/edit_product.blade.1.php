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
		.bootstrap-tagsinput{
			width: 100%;
		}
		.bootstrap-tagsinput .tag{
			color: black !important;
		}
		.actions{
			text-align: center !important;
		}
	</style>

	<link rel="stylesheet" type="text/css" href="{{Request::root()}}/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
@stop


@section('ecommerce')

@stop

@section('content')


<div class="container" id="new-project">


<div class="mt20">
	<div class="row">
		<div class="col-md-3">
			@include('user.layouts.profile')
		</div>
		<div class="col-md-9">



			<form id="example-form" action="" class="mt20" method="post" enctype="multipart/form-data">

				{{ csrf_field() }}

				<div class="mt20">
					<h3>基本情報入力</h3>
					<section>


						<div class="form-group">
							<label for="">商品名</label>
							<input type="text" class="form-control required" placeholder="" name="title" value="{{$product->title}}">

						</div>







						<div class="row">

							<div class="form-group col">
								<label for="">カテゴリ(分類)</label>
								<select class="form-control required category" name="category">
									<?php foreach($category as $c){?>
										<option value="{{$c->id}}" {{$product->subCategory->category->id == $c->id ? 'selected' : ''}}>{{$c->name}}</option>
									<?php }?>
								</select>
							</div>
							<div class="form-group col">
								<label for="">サブカテゴリー</label>
								<select class="form-control required subcategory" name="subcategory">
									<option value="{{$product->subCategory->id}}">{{$product->subCategory->name}}</option>
								</select>
							</div>

						</div>

						<div class="form-group">
							<label for="">販売金額</label>
							<input type="number" class="form-control required" placeholder="" name="price" value="{{$product->price}}">
						</div>



						<div class="form-group">
							<label for="">商品内容</label>
							<textarea class="form-control required" name="description">{{$product->description}}</textarea>
						</div>


						<div class="form-group">
							<label for="">画像</label>
							<input type="file" class="form-control" placeholder="" name="image">
						</div>



						<div class="form-group">
							<label for="">カラー・サイズ選択</label>

							<?php foreach($product->color as $c){?>

							<div class="row">
								<div class="col">
									<input type="text" class="form-control" placeholder="色" name="color[]" value="{{$c->color}}">
								</div>
								<div class="col">
									<input type="text" class="form-control" placeholder="サイズ" name="type[]" value="{{$c->type}}">
								</div>
								<div class="col">
									<input type="number" min="1" class="form-control" placeholder="在庫数" name="stock[]" value="{{$c->stock}}">
								</div>
								<div class="col-md-4">
									<input type="text" class="form-control" placeholder="イメージ画像をアップロードする ( 複数枚可にする )" name="individual[]" value="{{$c->individual}}">
								</div>

							</div>

							<?php }?>

							<div class="color_option"></div>

							<div class="text-right mt20">
								<button class="btn btn-warning add_color" type="button"><i class="fa fa-plus"></i></button>
							</div>

						</div>









						<div class="form-group">
							<label for="">商品説明文</label>
							<textarea class="form-control required" name="explanation">{{$product->explanation}}</textarea>
						</div>
						<!-- <div class="form-group">
							<label for="">イメージ画像をアップロードする ( 複数枚可にする )</label>
							<input type="file" class="form-control" name="explanation_image">
						</div> -->


						<div class="form-group">
							<label for="">企業名 (法人名を入力してください。)</label>
							<input type="text" class="form-control required" name="company_name" value="{{$product->company_name}}">
						</div>


						<div class="form-group">
							<label for="">企業情報</label>
							<textarea class="form-control required" name="company_info">{{$product->company_info}}</textarea>
						</div>
						<div class="form-group">
							<label for="">イメージ画像をアップロードする ( 複数枚可にする )</label>
							<input type="file" class="form-control" name="company_info_image">
						</div>

						<div class="form-group">
							<label for="">プロフィール情報</label>
							<textarea class="form-control required" name="profile_info">{{$product->profile_info}}</textarea>
						</div>
						<div class="form-group">
							<label for="">イメージ画像をアップロードする ( 複数枚可にする )</label>
							<input type="file" class="form-control" name="profile_info_image">
						</div>








					</section>

					<h3>口座情報入力</h3>
					<section>

						<div class="mt20">
							<div class="row">
								<div class="col-md-4">
									<span>種別</span>
									<input type="radio" name="payment_option" {{$product->payment_option == 1?'checked':''}} value="1"> 銀行信用機関
									<input type="radio" name="payment_option" {{$product->payment_option == 2?'checked':''}} value="2"> ゆうちょ
								</div>
								<div class="col-md-4">
									<span>種別</span>
									<input type="radio" name="account_option" {{$product->account_option == 1?'checked':''}} value="1"> 普通
									<input type="radio" name="account_option" {{$product->account_option == 2?'checked':''}} value="2"> 当座
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="form-group col-md-6">
											<level>金融機関名</level>
											<input type="text" name="bank_name" class="form-control" value="{{$product->bank_name}}">
										</div>
										<div class="form-group col-md-6">
											<level>金融コード</level>
											<input type="text" name="bank_code" class="form-control" value="{{$product->bank_code}}">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="form-group col-md-4">
											<level>支店名</level>
											<input type="text" name="branch_name" class="form-control" value="{{$product->branch_name}}">
										</div>
										<div class="form-group col-md-4">
											<level>口座番号</level>
											<input type="text" name="account_number" class="form-control" value="{{$product->account_number}}">
										</div>
										<div class="form-group col-md-4">
											<level>口座名義</level>
											<input type="text" name="account_name" class="form-control" value="{{$product->account_name}}">
										</div>
									</div>
								</div>

							</div>
						</div>



							<div class="">
								<?php foreach(Auth::user()->cards as $c){?>
									<div class="box row">
										<div class="col-md-1">
											<input type="radio" name="card" value="{{$c->id}}" {{$product->card_id == $c->id?'checked':''}}>
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
							</div>
							<div class="new_card_info mt20 text-left">
								<div class="row">
									<div class="col-md-1">
										<input type="radio" name="card" value="0">
									</div>
									<div class="col-md-11">


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
								</div>


							</div>
						</div>

						<div class="row">
							発送期間情報
						</div>
						<div class="row">
							<div class="col-md-4">
								<input type="radio" name="shipping_option" {{$product->shipping_option == 1?'checked':''}}  value="1"> 日本国内全域
							</div>
							<div class="col-md-4">
								<input type="radio" name="shipping_option" {{$product->shipping_option == 2?'checked':''}} value="2"> 日本国内(条件あり)
							</div>
							<div class="col-md-4">
								<input type="text" name="shipping_option_details" class="form-control" placeholder="条件:" value="{{$product->shipping_option_details}}">
							</div>
						</div>

						<div class="row">
							発送可能地域:
						</div>
						<div class="row">
							<div class="col-md-4">
								<input type="radio" name="shipping_option_foreign" {{$product->shipping_option_foreign == 1?'checked':''}} value="1"> 国外対応
							</div>
							<div class="col-md-4">
								<input type="radio" name="shipping_option_foreign" {{$product->shipping_option_foreign == 2?'checked':''}} value="2"> 地域限定
							</div>
							<div class="col-md-4">
								<input type="text" name="shipping_option_foreign_details" class="form-control" placeholder="条件:鮮度の問題により関東地方のみ" value="{{$product->shipping_option_foreign_details}}">
							</div>
						</div>

						<div class="row">
							営業日:
						</div>
						<div class="row">
							<div class="col-md-3">
								<input type="checkbox" name="monday" {{$product->monday?'checked':''}}> 月曜日
							</div>
							<div class="col-md-3">
								<input type="checkbox" name="tuesday" {{$product->tuesday?'checked':''}}> 火曜日
							</div>
							<div class="col-md-3">
								<input type="checkbox" name="wednesday" {{$product->wednesday?'checked':''}}> 水曜日
							</div>
							<div class="col-md-3">
								<input type="checkbox" name="thursday" {{$product->thursday?'checked':''}}> 木曜日
							</div>
						</div>


						<div class="row">
							<div class="col-md-3">
								<input type="checkbox" name="friday" {{$product->friday?'checked':''}}> 金曜日
							</div>
							<div class="col-md-3">
								<input type="checkbox" name="saturday" {{$product->saturday?'checked':''}}> 土曜日
							</div>
							<div class="col-md-3">
								<input type="checkbox" name="sunday" {{$product->sunday?'checked':''}}> 日曜日
							</div>
							<div class="col-md-3">
								<input type="checkbox" name="holyday" {{$product->holyday?'checked':''}}> 祝日
							</div>
						</div>


						<div class="row">
							<div class="col-md-6">
								<input type="checkbox" name="other_day" {{$product->other_day?'checked':''}}> その他
							</div>
							<div class="col-md-6">
								<input type="text" name="other_day_details" class="form-control" placeholder="第2日曜日は営業" value="{{$product->other_day_details}}">
							</div>

						</div>

						<div class="row">
							発送期間:
						</div>
						<div class="row">
							<div class="col-md-6">
								<input type="radio" name="delivery_day" {{$product->delivery_day == 1?'checked':''}} value="1"> 注文から営業日の1~2日に発送
							</div>
							<div class="col-md-6">
								<input type="radio" name="delivery_day" {{$product->delivery_day == 2?'checked':''}} value="2"> 注文から営業日の 3 ~ 4 日に発送
							</div>

						</div>
						<div class="row">
							<div class="col-md-6">
								<input type="radio" name="delivery_day" {{$product->delivery_day == 3?'checked':''}} value="3"> その他
							</div>
							<div class="col-md-6">
								<input type="text" name="delivery_day_details" class="form-control" placeholder="発送までに要2週間" value="{{$product->delivery_day_details}}">
							</div>

						</div>


					</section>

					<h3>情報確認</h3>
					<section>
						<div class="card">
							<div class="card-block">
								商品名
							</div>
						</div>
						<div class="card">
							<div class="card-block">
								商品金額
							</div>
						</div>
						<div class="card">
							<div class="card-block">
								商品情報詳細
							</div>
						</div>
						<div class="card">
							<div class="card-block">
								会社情報
							</div>
						</div>
						<div class="card">
							<div class="card-block">
								カード情報
							</div>
						</div>
						<div class="card">
							<div class="card-block">
								発送情報
							</div>
						</div>




					</section>

					<h3>完了</h3>
					<section>
						<h4 class="text-center mt20">
							商品登録申請が完了しました。
						</h4>
						<h4 class="text-center mt20">
							<a href="{{route('user-product-list')}}">→ マイページへ</a>
						</h4>
					</section>
				</div>
			</form>


		</div>
	</div>

</div>

</div>


<div class="color_container hide">
	<div class="row">
		<div class="col">
			<input type="text" class="form-control" placeholder="色" name="color[]">
		</div>
		<div class="col">
			<input type="text" class="form-control" placeholder="サイズ" name="type[]">
		</div>
		<div class="col">
			<input type="number" min="1" class="form-control" placeholder="在庫数" name="stock[]">
		</div>
		<div class="col-md-4">
			<input type="text" class="form-control" placeholder="イメージ画像をアップロードする ( 複数枚可にする )" name="individual[]">
		</div>
	</div>
</div>





@stop

@section('custom_js')
	<script src="{{Request::root()}}/ckeditor/ckeditor.js"></script>

	<script type="text/javascript" src="{{Request::root()}}/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.js"></script>

	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>

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
			startIndex: {{$finish?3:0}},
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
				if(currentIndex == 3){
					$('.actions > ul > li:nth-child(1)').attr('style', 'display:none;');
					$('.actions > ul > li:nth-child(2)').attr('style', 'display:none;');
					$('.actions > ul > li:nth-child(3)').attr('style', 'display:none;');
				}
				$('.steps .current').prevAll().removeClass('done').addClass('disabled');
			},
			onStepChanging: function (event, currentIndex, newIndex)
			{
				form.validate().settings.ignore = ":disabled,:hidden";
				return form.valid();
				// return true;
			},
			onStepChanged: function (event, currentIndex, newIndex)
			{
				if(currentIndex == 2){
					$('.actions > ul > li:last-child').attr('style', '');
					$('.actions > ul > li:nth-child(2)').attr('style', 'display:none;');
				}
			},
			onFinishing: function (event, currentIndex)
			{
				form.validate().settings.ignore = ":disabled,:hidden";
				return form.valid();
				// return true;
			},
			onFinished: function (event, currentIndex)
			{
				form.submit();
			}
		});

		$(function(){
			// CKEDITOR.config.extraPlugins = 'imageuploader';
			// CKEDITOR.config.filebrowserImageBrowseUrl = '{{Request::root()}}/ckeditor/plugins/imageuploader/imgbrowser.php';

			$('.category').on('change', function(){
				console.log('working');
				var category = $(this).val();
				$.ajax({
				url: "{{Request::root()}}/user/sub-category/"+category,
				context: document.body
				}).done(function(response) {
				$('.subcategory').html(response);
				});
			});

			$('.add_color').on('click', function(){
				var html = $('.color_container').html();
				$('.color_option').before(html);
			});

		});



	</script>

@stop