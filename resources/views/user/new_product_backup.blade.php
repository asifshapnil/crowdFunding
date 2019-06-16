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
						    <input type="text" class="form-control required p_title" placeholder="" name="title">
						    
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
						    <label for="">販売金額</label>
						    <input type="number" class="form-control required p_price" placeholder="" name="price">
						  </div>


						  <div class="form-group">
						    <label for="">商品内容</label>
						    <textarea class="form-control required p_description" name="description"></textarea>
						  </div>

						  <div class="form-group">
						    <!-- <label for="">画像</label> -->
						    <input type="file" class="form-control required" placeholder="" name="image">						    
						  </div>



						  <div class="form-group">
						    <label for="">カラー・サイズ選択</label>
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

						    <div class="color_option"></div>

						    <div class="text-right mt20">
					    		<button class="btn btn-warning add_color" type="button"><i class="fa fa-plus"></i></button>
					    	</div>
						    				    
						  </div>

						  

						  



						  

						  <div class="form-group">
						    <label for="">商品説明文</label>
						    <textarea class="form-control required" name="explanation"></textarea>
						  </div>
						  <!-- <div class="form-group">
						    <label for="">イメージ画像をアップロードする ( 複数枚可にする )</label>
						    <input type="file" class="form-control" name="explanation_image">
						  </div> -->


						  <div class="form-group">
						    <label for="">企業名 (法人名を入力してください。)</label>
						    <input type="text" class="form-control required" name="company_name">
						  </div>
						 

						  <div class="form-group">
						    <label for="">企業情報</label>
						    <textarea class="form-control required p_company_info" name="company_info"></textarea>
						  </div>
						  <div class="form-group">
						    <!-- <label for="">イメージ画像をアップロードする ( 複数枚可にする )</label> -->
						    <input type="file" class="form-control" name="company_info_image">
						  </div>

						  <div class="form-group">
						    <label for="">プロフィール情報</label>
						    <textarea class="form-control required" name="profile_info"></textarea>
						  </div>
						  <div class="form-group">
						    <!-- <label for="">イメージ画像をアップロードする ( 複数枚可にする )</label> -->
						    <input type="file" class="form-control" name="profile_info_image">
						  </div>






						  
						
			        </section>			

			        <h3>口座情報入力</h3>
			        <section>

			        	<div class="mt20">
			        		<div class="row">
			        			<div class="col-md-4">
					        		<span>種別</span>
					        		<input type="radio" name="payment_option" checked value="1"> 銀行信用機関
					        		<input type="radio" name="payment_option" value="2"> ゆうちょ
				        		</div>
				        		<div class="col-md-4">
					        		<span>種別</span>
					        		<input type="radio" name="account_option" checked value="1"> 普通
					        		<input type="radio" name="account_option" value="2"> 当座
				        		</div>
				        		<div class="col-md-4">
				        			<div class="row">
				        				<div class="form-group col-md-6">
				        					<level>金融機関名</level>
				        					<input type="text" name="bank_name" class="form-control">
				        				</div>
				        				<div class="form-group col-md-6">
				        					<level>金融コード</level>
				        					<input type="text" name="bank_code" class="form-control">
				        				</div>
			        				</div>
				        		</div>
			        		</div>
			        		<div class="row">
			        			<div class="col-md-12">
			        				<div class="row">
				        				<div class="form-group col-md-4">
				        					<level>支店名</level>
				        					<input type="text" name="branch_name" class="form-control">
				        				</div>
				        				<div class="form-group col-md-4">
				        					<level>口座番号</level>
				        					<input type="text" name="account_number" class="form-control">
				        				</div>
				        				<div class="form-group col-md-4">
				        					<level>口座名義</level>
				        					<input type="text" name="account_name" class="form-control">
				        				</div>
			        				</div>
			        			</div>
			        			
			        		</div>
			        	</div>

			        	
			        	<div class="form-check text-center mt20">
						    <label class="form-check-label row">
						    	
						    		<div class="col-md-2">
						    			<input type="radio" name="card_info" value="1" class="form-check-input card_info">
						    		</div>
						    		<div class="col-md-10">
						    			<div class="box">
						    				既に登録されているカード情報
						    			</div>

						    			<div class="hide existing_card_info text-left box-invest mt20">
									    	<?php foreach(Auth::user()->cards as $c){?>
									    		<div class="box row">
									    			<div class="col-md-1">
									    				<input type="radio" name="card" value="{{$c->id}}" class="card" data-value="{{$c->id}}">
									    			</div>
									    			<div class="col-md-3">
									    				カード名義
									    				<br>
									    				<span class="n_c_name">{{$c->name}}</span>
									    			</div>
									    			<div class="col-md-3">
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
									    	<?php }?>
									    </div>
						    		</div>
						    	
						    </label>
						</div>
			            <div class="form-check text-center mt20">
						    <label class="form-check-label row">
						    	
						    		<div class="col-md-2">
						    			<input type="radio" name="card_info" value="2" class="form-check-input card_info">
						    		</div>
						    		<div class="col-md-10">
						    			<div class="box">
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
			        		
			        		

					    <div class="row">
					    	発送期間情報
					    </div>
					    <div class="row">
					    	<div class="col-md-4">
					    		<input type="radio" name="shipping_option" checked value="1"> 日本国内全域
					    	</div>
					    	<div class="col-md-4">
					    		<input type="radio" name="shipping_option" value="2"> 日本国内(条件あり)
					    	</div>
					    	<div class="col-md-4">
					    		<input type="text" name="shipping_option_details" class="form-control" placeholder="条件:">
					    	</div>
					    </div>

					    <div class="row">
					    	発送可能地域:
					    </div>
					    <div class="row">
					    	<div class="col-md-4">
					    		<input type="radio" name="shipping_option_foreign" checked value="1"> 国外対応
					    	</div>
					    	<div class="col-md-4">
					    		<input type="radio" name="shipping_option_foreign" value="2"> 地域限定
					    	</div>
					    	<div class="col-md-4">
					    		<input type="text" name="shipping_option_foreign_details" class="form-control" placeholder="条件:鮮度の問題により関東地方のみ">
					    	</div>
					    </div>

					    <div class="row">
					    	営業日:
					    </div>
					    <div class="row">
					    	<div class="col-md-3">
					    		<input type="checkbox" name="monday"> 月曜日
					    	</div>
					    	<div class="col-md-3">
					    		<input type="checkbox" name="tuesday"> 火曜日
					    	</div>
					    	<div class="col-md-3">
					    		<input type="checkbox" name="wednesday"> 水曜日
					    	</div>
					    	<div class="col-md-3">
					    		<input type="checkbox" name="thursday"> 木曜日
					    	</div>
					    </div>

					    
					    <div class="row">
					    	<div class="col-md-3">
					    		<input type="checkbox" name="friday"> 金曜日
					    	</div>
					    	<div class="col-md-3">
					    		<input type="checkbox" name="saturday"> 土曜日
					    	</div>
					    	<div class="col-md-3">
					    		<input type="checkbox" name="sunday"> 日曜日
					    	</div>
					    	<div class="col-md-3">
					    		<input type="checkbox" name="holyday"> 祝日
					    	</div>
					    </div>

					    
					    <div class="row">
					    	<div class="col-md-6">
					    		<input type="checkbox" name="other_day"> その他
					    	</div>
					    	<div class="col-md-6">
					    		<input type="text" name="other_day_details" class="form-control" placeholder="第2日曜日は営業">
					    	</div>
					    	
					    </div>

					    <div class="row">
					    	発送期間:
					    </div>
					    <div class="row">
					    	<div class="col-md-6">
					    		<input type="radio" name="delivery_day" checked value="1"> 注文から営業日の1~2日に発送
					    	</div>
					    	<div class="col-md-6">
					    		<input type="radio" name="delivery_day" value="2"> 注文から営業日の 3 ~ 4 日に発送
					    	</div>
					    	
					    </div>
					    <div class="row">
					    	<div class="col-md-6">
					    		<input type="radio" name="delivery_day" value="3"> その他
					    	</div>
					    	<div class="col-md-6">
					    		<input type="text" name="delivery_day_details" class="form-control" placeholder="発送までに要2週間">
					    	</div>
					    	
					    </div>


			        </section>			

			        <h3>情報確認</h3>
			        <section>
			        	<div class="card">
			        		<div class="card-block">
					            商品名
							</div>
							<div class="card-block title"></div>
						</div>
			        	<div class="card">
			        		<div class="card-block">
					            商品金額
							</div>
							<div class="card-block price"></div>
						</div>
			        	<div class="card">
			        		<div class="card-block">
					            商品情報詳細
							</div>
							<div class="card-block description"></div>
						</div>
			        	<div class="card">
			        		<div class="card-block">
					            会社情報
							</div>
							<div class="card-block company_info"></div>
						</div>
			        	<div class="card">
			        		
							<div class="card-block mt20" style="margin-bottom: 20px;">
				            	<h4>カード情報</h4>
					            <div class="hide existing_card_info">
					            	<?php foreach(Auth::user()->cards as $c){?>
							    		<div class=" row {{'card'.$c->id}} all_card_info">
							    			<div class="col-md-3">
							    				カード名義
							    				<br>
							    				<span class="n_c_name">{{$c->name}}</span>
							    			</div>
							    			<div class="col-md-3">
							    				カード番号
							    				<br>
							    				<span class="n_c_number">{{$c->number}}</span>
							    			</div>
							    			<div class="col-md-3">
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
					            	<div class=" padding mt20 row">
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




						</div>
			        	<div class="card">
			        		<div class="card-block">
					            発送情報
							</div>
							<div class="shipping"></div>
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
			console.log('this is ok');
			$('.title').html($(this).val());
		});
		$('.p_price').change(function(){
			console.log('this is ok');
			$('.price').html($(this).val());
		});
		$('.p_description').change(function(){
			console.log('this is ok');
			$('.description').html($(this).val());
		});
		$('.p_company_info').change(function(){
			console.log('this is ok');
			$('.company_info').html($(this).val());
		});
		
	</script>

@stop