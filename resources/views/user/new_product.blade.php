@extends('user.layouts.main')

@section('custom_css')
	<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 27%;
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
		.page_title_product_register{
			padding-top: 10px;
			padding-bottom: 10px;
			font-size: 25px;
		}
		.form-control{
			width: 99.9%;
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
			background-color: #FFBC00;
			padding-left: 42px;
			margin-left: -8px;
		}
		.wizard>.steps .current a:after{
			content: '';
		    background: #FFBC00;
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
			border: 2px solid #FFBC00;
			background-color: #ffffff;
			padding-top: 3px;
    		padding-bottom: 3px;
    		position: relative;
    		border-right: none;
    		border-left: none;
		}
		.wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active{
			margin-left: -8px;
			border-left: 2px solid #FFBC00;
			color: #aaaaaa;
		}
		.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
			content: '';
		    border-top: 2px solid #FFBC00;
		    border-right: 2px solid #FFBC00;
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
			margin-left: 14% !important;
			margin-top: 0px !important;
		}
		.wizard>.actions a, .wizard>.actions a:hover, .wizard>.actions a:active{
			background-color: #ffbc00;
		}
		/*steps end*/
		.error{
			color: red;
		}
		.add_color{
			background: transparent;
			color: #FFBC00;
			border: 2px solid #FFBC00;
			font-size: 18px;
		}
		.mt10{
			margin-top: 10px;
		}
		.preview_area{
			padding-top: 20px;
			padding-bottom: 20px;
			border-bottom: 1px solid #ccc;
		}
		.wizard>.actions{
			margin-top: 20px;
		}
		.error{
			color: red;
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
	</style>

	<link rel="stylesheet" type="text/css" href="{{Request::root()}}/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
@stop


@section('ecommerce')

@stop

@section('content')
@include('user.layouts.tab')


<div class="container" id="new-project">


<div class="mt20">
	<div class="row">
		<div class="col-md-8 offset-md-2">

			<h1 class="text-center page_title_product_register">商品を登録する</h1>

			<form id="example-form" action="" class="mt20" method="post" enctype="multipart/form-data">

				{{ csrf_field() }}

			    <div class="mt20">
			        <h3 class="step_title_area">
				        	<span class="steptext">Step</span><span class="stepcount">1</span>
				        	<span class="stepinfo">基本情報入力</span>
				    	</h3>
			        <section>


						  <div class="form-group">
						    <label for="">商品名 <span class="text-danger" id="length20"></span> </label>
						    <input type="text" class="form-control required p_title length20" placeholder="" name="title">
						  </div>

						  <div class="row">

							<div class="form-group col">
								<label for="">カテゴリ(分類)</label>
								<select class="form-control required category" name="category">
									<option value="0">Select Category</option>
									<?php foreach($category as $c){?>
										<option value="{{$c->id}}">{{$c->name}}</option>
									<?php }?>
								</select>
							</div>
							<div class="form-group col">
								<label for="">サブカテゴリー</label>
								<select class="form-control required subcategory" name="subcategory">

								</select>
							</div>

						  </div>

						  <div class="form-group">
						    <label for="">販売金額 (販売金額 ＝ 商品金額＋送料＋消費税)</label>
						    <input type="number" class="form-control required p_price" placeholder="" name="price">
						  </div>


						  <div class="form-group">
						    <label for="">商品内容およびセールスポイント <span class="text-danger" id="length200_1"></span> </label>
						    <textarea class="form-control required p_description length200_1" name="description"></textarea>
						  </div>

						  <div class="form-group">
						    <label for="">商品写真 ※商品の種類が複数ある場合は一枚の写真にしてアップロードしてください、</label>
						    <input type="file" class="form-control required product_image" placeholder="" name="image">
						  </div>



						  <div class="form-group">
						    <label for="">カラー・サイズ選択</label>
						    <div class="row">
						    	<div class="col-3">
						    		<select class="form-control product_color" name="color[]">
						    			<option value="">色</option>
						    			<option value="緑">緑</option>
						    			<option value="黄">黄</option>
						    			<option value="青白い">青白い</option>
						    			<option value="ピンク">ピンク</option>
						    			<option value="赤">赤</option>
						    			<option value="青">青</option>
						    		</select>
						    	</div>
						    	<div class="col-3">
						    		<select class="form-control product_type" name="type[]">
						    			<option value="">サイズ</option>
						    			<option value="S">S</option>
						    			<option value="M">M</option>
						    			<option value="L">L</option>
						    			<option value="XL">XL</option>
						    			<option value="XXL">XXL</option>
						    		</select>
						    	</div>
						    </div>

						    <div class="color_option"></div>

						    <div class="text-left mt20">
					    		<button class="btn btn-warning add_color" type="button"><i class="fa fa-plus-circle"></i> カラー・サイズを追加する</button>
					    	</div>

						  </div>

						  <div class="form-group">
						    <label for="">商品詳細(原材料・注意事項など) <span class="text-danger" id="length200_2"></span> </label>
						    <textarea class="form-control required p_details length200_2" name="explanation"></textarea>
						  </div>
						  <!-- <div class="form-group">
						    <label for="">イメージ画像をアップロードする ( 複数枚可にする )</label>
						    <input type="file" class="form-control" name="explanation_image">
						  </div> -->


						  <div class="form-group">
						    <label for="">企業名 (法人名を入力してください。) <span class="text-danger" id="length20_2"></span> </label>
						    <input type="text" class="form-control required company_name length20_2" name="company_name">
						  </div>


						  <div class="form-group">
						    <label for="">企業情報(会社のURL、住所、お問い合わせ先など）<span class="text-danger" id="length200_3"></span> </label>
						    <textarea class="form-control required p_company_info length200_3" name="company_info"></textarea>
						  </div>
						  <div class="form-group">
						    <!-- <label for="">イメージ画像をアップロードする ( 複数枚可にする )</label> -->
						    <input type="file" class="form-control company_info_image" name="company_info_image">
						  </div>

			        </section>

			        <h3 class="step_title_area">
			        	<span class="steptext">Step</span><span class="stepcount">2</span>
			        	<span class="stepinfo">情報確認</span>
			    	</h3>
			        <section>
			        	<div class="row" style="margin-top: 30px;">
			        		<div class="col-12">
			        			<div class="row preview_area">
			        				<div class="col-3">商品名</div>
			        				<div class="col-9 product_title"></div>
			        			</div>
			        			<div class="row preview_area">
			        				<div class="col-3">カテゴリ</div>
			        				<div class="col-3 product_category"></div>
			        				<div class="col-3">サブカテゴリ</div>
			        				<div class="col-3 product_subcategory"></div>
			        			</div>
			        			<div class="row preview_area">
			        				<div class="col-3">販売金額</div>
			        				<div class="col-9 product_price"></div>
			        			</div>
			        			<div class="row preview_area">
			        				<div class="col-12">商品内容およびセールスポイント</div>
			        				<div class="col-12 product_description"></div>
			        			</div>
			        			<div class="row preview_area">
			        				<div class="col-12">商品写真</div>
			        				<div class="col-12 product_image"></div>
			        			</div>
			        			<div class="row preview_area">
			        				<div class="col-3">カラー・サイズ</div>
			        				<div class="col-9 product_color_size"></div>
			        			</div>
			        			<div class="row preview_area">
			        				<div class="col-12">商品詳細（原材料・注意事項など）</div>
			        				<div class="col-12 product_details"></div>
			        			</div>
			        			<div class="row preview_area">
			        				<div class="col-3">企業名</div>
			        				<div class="col-9 product_company_name"></div>
			        			</div>
			        			<div class="row preview_area">
			        				<div class="col-12">企業情報（企業URL、住所、お問い合わせ先など）</div>
			        				<div class="col-12 product_company_info"></div>
			        			</div>
			        			<div class="row preview_area">
			        				<div class="col-12">企業写真</div>
			        				<div class="col-12 product_company_image"></div>
			        			</div>
			        		</div>
			        	</div>
			        </section>

			        <h3 class="step_title_area">
			        	<span class="steptext">Step</span><span class="stepcount">3</span>
			        	<span class="stepinfo">完了</span>
			    	</h3>
			        <section>
			            <h4 class="text-center mt20" style="color:#FFBC00;">
			            	商品登録申請が完了しました。
			            </h4>
			            <h4 class="text-center mt20">
			            	商品の登録ありがとうございました。
			            </h4>
			        </section>
			    </div>
			</form>


		</div>
	</div>

</div>

</div>



<div class="color_container hide">
	<div class="row mt10">
    	<div class="col-3">
    		<select class="form-control product_color" name="color[]">
    			<option value="">色</option>
    			<option value="緑">緑</option>
    			<option value="黄">黄</option>
    			<option value="青白い">青白い</option>
    			<option value="ピンク">ピンク</option>
    			<option value="赤">赤</option>
    			<option value="青">青</option>
    		</select>
    	</div>
    	<div class="col-3">
    		<select class="form-control product_type" name="type[]">
    			<option value="">サイズ</option>
    			<option value="S">S</option>
    			<option value="M">M</option>
    			<option value="L">L</option>
    			<option value="XL">XL</option>
    			<option value="XXL">XXL</option>
    		</select>
    	</div>
    </div>
</div>



@stop

@section('custom_js')

	<script src="{{Request::root()}}/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="{{Request::root()}}/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.js"></script>

	<script type="text/javascript" src="{{Request::root()}}/js/jquery.validate.min.js"></script>
	

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
		    startIndex: {{$finish?2:0}},
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
		  		if(currentIndex == 2){
		        	$('.actions > ul > li:nth-child(1)').attr('style', 'display:none;');
		        	$('.actions > ul > li:nth-child(2)').attr('style', 'display:none;');
		        	$('.actions > ul > li:nth-child(3)').attr('style', 'display:none;');
		        }
		        $('.steps .current').prevAll().removeClass('done').addClass('disabled');
		  	},
		    onStepChanging: function (event, currentIndex, newIndex)
		    {
					var check = 0;
					if (currentIndex == 0) {

						if ($('.length20').val().length > 20) {
							$('#length20').html('Maximum limit 20 charactar ');
							check = 1;
						}else {
							$('#length20').html('');
							// check = 0;
						}

						if ($('.length20_2').val().length > 20) {
							$('#length20_2').html('Maximum limit 20 charactar ');
							check = 1;
						}else {
							$('#length20_2').html('');
							// check = 0;
						}

						if ($('.length200_1').val().length > 200) {
							$('#length200_1').html('Maximum limit 200 charactar ');
							check = 1;
						}else {
							$('#length200_1').html('');
							// check = 0;
						}

						if ($('.length200_2').val().length > 200) {
							$('#length200_2').html('Maximum limit 200 charactar ');
							check = 1;
						}else {
							$('#length200_2').html('');
							// check = 0;
						}

						if ($('.length200_3').val().length > 200) {
							$('#length200_3').html('Maximum limit 200 charactar ');
							check = 1;
						}else {
							$('#length200_3').html('');
							// check = 0;
						}




						if (check == 1) {
							return false;
						}
					}
		        form.validate().settings.ignore = ":disabled,:hidden";
        		return form.valid();
        		// return true;
		    },
		    onStepChanged: function (event, currentIndex, newIndex)
		    {
		        if(currentIndex == 1){
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
		$('.p_title').change(function(){
			$('.product_title').html($(this).val());
		});
		$('.category').change(function(){
			var category_data = $(this).children('option:selected').html();
			$('.product_category').html(category_data);
		});
		$('.subcategory').change(function(){
			var subcategory_data = $(this).children('option:selected').html();
			console.log(subcategory_data);
			$('.product_subcategory').html(subcategory_data);
		});
		$('.p_price').change(function(){
			$('.product_price').html($(this).val());
		});
		$('.product_image').change(function(){
			if (this.files && this.files[0]) {
			    var reader = new FileReader();
			    reader.onload = function(e) {
			    	var imgcontent = '<img src="'+e.target.result+'">';
			    	$('.product_image').html('<img src="'+e.target.result+'">');
			    }
			    reader.readAsDataURL(this.files[0]);
			  }
		});
		$('.p_description').change(function(){
			$('.product_description').html($(this).val());
		});
		$(document).on('change', '.product_color, .product_type', function(){
			var color_type_data = '';
			$.each($('.product_color'), function(index, value){
				var colorData = $(value).children('option:selected').val();
				var typeData = $(value).parent('div').parent('div').children('div').children('.product_type').children('option:selected').val();
				if(colorData && typeData){
					color_type_data += '('+colorData+', '+typeData+'), ';
				}
			});
			$('.product_color_size').html(color_type_data);
		});
		$('.p_details').change(function(){
			$('.product_details').html($(this).val());
		});
		$('.company_name').change(function(){
			$('.product_company_name').html($(this).val());
		});
		$('.p_company_info').change(function(){
			$('.product_company_info').html($(this).val());
		});
		$('.company_info_image').change(function(){
			if (this.files && this.files[0]) {
			    var reader = new FileReader();
			    reader.onload = function(e) {
			    	var imgcontent = '<img src="'+e.target.result+'">';
			    	$('.product_company_image').html('<img src="'+e.target.result+'">');
			    }
			    reader.readAsDataURL(this.files[0]);
			  }
		});

	</script>

@stop
