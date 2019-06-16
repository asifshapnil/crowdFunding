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
			width: 22%;
		}
		/*steps end*/
	</style>
@stop


@section('ecommerce')

@stop

@section('content')
@include('user.layouts.tab')

<div class="container" id="new-project">


<div class="mt20">
	<div class="row justify-content-center">

		<div class="col-md-10">

			<h1 class="text-center page_title_product_register">商品を登録する</h1>

			<form id="example-form" action="" class="mt20" method="post" enctype="multipart/form-data">

				{{ csrf_field() }}

			    <div class="mt20">
							<h3 class="step_title_area">
				        	<span class="steptext">Step</span><span class="stepcount">1</span>
				        	<span class="stepinfo">異本情報入力</span>
				    	</h3>
			        <section class="mt-3">
								<div class="form-group">
									<label for="">プロジェクト名</label>
									<input type="text" class="form-control length35_1" placeholder="" name="title" value="">
									<span id="length35_1" class="text-danger"></span>

								</div>

								<div class="form-group">
									<label for="">画像</label>
									<input type="file" class="form-control" placeholder="" name="featured_image">

								</div>



								<div class="row">

								<div class="form-group col">
									<label for="">カテゴリ(分類)</label>
									<select class="form-control " name="category">
										<?php foreach($category as $c){?>
											<option value="{{$c->id}}" {{$project->category_id == $c->id?'selected':''}}>{{$c->name}}</option>
										<?php }?>
									</select>
								</div>

								<div class="form-group col">
									<label for="">その他の内容</label>
									<input type="text" class="form-control length30_3" placeholder="" name="sub_category" value="{{$project->sub_category}}">
									<span id="length30_3" class="text-danger"></span>

								</div>

								</div>

								<div class="form-group">
									<label for="">目的</label>
									<input type="text" class="form-control length200_1" placeholder="" name="purpose" value="{{$project->purpose}}">
									<span id="length200_1" class="text-danger"></span>

								</div>

								<div class="row">



									<div class="form-group col">
										<label for="">年</label>
										<select class="form-control  calculateDay" name="fromY" id="fromY">
											<option value="0" selected>----</option>
											<?php for($i=date('Y');$i<date('Y')+2;$i++){?>
												<option value="{{$i}}">{{$i}}</option>
											<?php }?>
										</select>
								</div>
								@php
									 $transdate = date('m-d-Y', time());
									 $month = date('m');
									 $restM = 13-$month;
									 $day = date('d');
									 $maxDays=date('t');
									 // echo $days;
									 // echo $maxDays;
									 $restD = ($maxDays-$day)+1;

									 // $restM = 13-$month;


								@endphp

									<div class="form-group col">
										<label for="">月</label>
										<select class="form-control required calculateDay" name="fromM" id="fromM">
											<option value="0" selected>----</option>
											<?php for($i=date('m');$i<date('m')+$restM;$i++){?>
												<option value="{{$i}}">{{$i}}</option>

											<?php }?>
										</select>
								</div>

									<div class="form-group col">
										<label for="">日</label>
										<select class="form-control  calculateDay" name="fromD" id="fromD">
											<option value="0" selected>----</option>
											<?php for($i=date('d');$i<date('d')+$restD;$i++){?>
												<option value="{{$i}}">{{$i}}</option>

											<?php }?>
										</select>
								</div>

								<div class="col-xs-1 text-center allign">
									~
								</div>

									<div class="form-group col">
										<label for="">年</label>
										<select class="form-control required calculateDay" name="toY" id="toY">
	 									 <option value="0" selected>----</option>
	 									 <?php for($i=date('Y');$i<date('Y')+2;$i++){?>
	 										 <option value="{{$i}}">{{$i}}</option>
	 									 <?php }?>
	 								 </select>
								</div>

									<div class="form-group col">
										<label for="">月</label>
										<select class="form-control required calculateDay" name="toM" id="toM">
											<option value="0" selected>----</option>
											<?php for($i=date('m');$i<date('m')+$restM;$i++){?>
												<option value="{{$i}}">{{$i}}</option>

											<?php }?>
										</select>
								</div>

									<div class="form-group col">
										<label for="">日</label>
										<select class="form-control required calculateDay" name="toD" id="toD">
											<option value="0" selected>----</option>
											<?php for($i=date('d');$i<date('d')+$restD;$i++){?>
												<option value="{{$i}}">{{$i}}</option>

											<?php }?>
										</select>
								</div>

									<div class="form-group col">
										<label for="">日間</label>
										<input type="text" class="form-control " placeholder="" name="total_day" readonly id="totalDay">
								</div>

								</div>

								<div class="form-group">
									<label for="">目的金額</label>
									<input type="number" class="form-control " name="budget" value="{{$project->budget}}">
								</div>

								<div class="form-group">
									<label for="">予算用途の内訳</label>
									<textarea class="form-control length2k_2 " id="editor" name="budget_usage_breakdown">{{$project->budget_usage_breakdown}}</textarea>
									<span id="length2k_2" class="text-danger"></span>

								</div>


								<div class="form-group">
									<label for="">支援金受取人名</label>
									<input type="text" class="form-control length30_2" name="beneficiary" value="{{$project->beneficiary}}">
									<span id="length30_2" class="text-danger"></span>

									<span>※支援金を受け取る人名、または法人名を入力してください。</span>
								</div>


								<div class="form-group">
									<label for="">プロジェクト概要</label>
									<textarea class="form-control  description length2k_1" name="description">{{$project->description}}</textarea>
									<span id="length2k_1" class="text-danger"></span>

								</div>

			        </section>


							<h3 class="step_title_area">
				        	<span class="steptext">Step</span><span class="stepcount">2</span>
				        	<span class="stepinfo">リターン情報入力</span>
				    	</h3>
			         <section>
								 <?php foreach($project->reward as $r){?>
								 <div class="card mb20">
									 <input type="hidden" name="reward_id[]" value="{{$r->id}}">
									 <div class="card-block">
											 <div class="row mt20">
												 <div class="col-md-4">
													 <div class="row">
														 <div class="col-md-9"><input type="text" class="form-control" name="amount[]" value="{{$r->amount}}"></div>
														 <div class="col-md-3">円</div>

													 </div>
												 </div>
												 <div class="col-md-8">

										 <div class="row">

												 <div class="col">
													 <input type="checkbox" class="form-check-input" name="is_crofun_point[]" {{$r->is_crofun_point?'checked':''}}>
													 Crofun ポイント
												 </div>
												 <div class="col">
													 <input type="text" class="form-control" name="crofun_amount[]" value="{{$r->crofun_amount}}">
												 </div>
												 <div class="col-md-1">
													 P
												 </div>

										 </div>

										 <div class="row mt20">
											 <div class="col-md-1">
												 <input type="checkbox" class="form-check-input" name="is_other[]" {{$r->is_other?'checked':''}}>
											 </div>
											 <div class="col">
												 <input type="text" class="form-control" name="other_description[]" value="{{$r->other_description}}">
												 <label class="custom-file mt20">
													 <input type="file" id="file" class="custom-file-input" name="other_file[]">
													 <span class="custom-file-control"></span>
												 </label>
											 </div>
										 </div>
												 </div>
											 </div>
									 </div>
									 </div>

									 <?php }?>

									 <div class="reward_container"></div>

									 <div class="text-center">
										 <a href="#!" class="btn btn-secondary add_reward">+ さらに追加する</a>
									 </div>
			        </section>
							<h3 class="step_title_area">
				        	<span class="steptext">Step</span><span class="stepcount">3</span>
				        	<span class="stepinfo">草案入力</span>
				    	</h3>
			         <section>
								 <?php foreach($project->details as $d){?>
								 <input type="hidden" name="details_id[]" value="{{$d->id}}">
								 <div class="card">
									 <div class="card-block">
											 <div class="form-group">
										 <label for="">小題</label>
										 <input type="text" class="form-control" placeholder="" name="details_title[]" value="{{$d->details_title}}">
								 </div>


								 <div class="form-group">
										 <label for="">本文</label>
										 <textarea class="form-control" name="details_description[]">{{$d->details_description}}</textarea>
								 </div>
							 </div>
						 </div>
						 <?php }?>

						 <div class="details_container"></div>

						 <div class="text-center mt20">
							 <a href="#!" class="btn btn-secondary add_details">+ さらに追加する</a>
						 </div>
			        </section>
							<h3 class="step_title_area">
				        	<span class="steptext">Step</span><span class="stepcount">4</span>
				        	<span class="stepinfo">完了</span>
				    	</h3>

			        <section>
								<h4 class="text-center mt20">
			 					 プロジェクト申請が完了しました。
			 				 </h4>
			 				 <h4 class="text-center mt20">
			 					 <a href="{{route('user-project-list')}}">→ マイページへ</a>
			 				 </h4>
			        </section>
			    </div>
			 </form>


		</div>
	</div>

</div>

</div>



@include('user.layouts.add-project')
@stop

@section('custom_js')

	<!-- <script src="//cdn.ckeditor.com/4.8.0/basic/ckeditor.js"></script> -->
	<script src="{{Request::root()}}/ckeditor/ckeditor.js"></script>

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
						// alert('-----' + currentIndex + '-----' + newIndex);
						var check = 0;
						if (currentIndex == 0) {

							if ($('.length35_1').val().length > 35) {
								$('#length35_1').html('Maximum limit 35 charactar ');
								check = 1;
							}
							if ($('.length2k_1').val().length > 2000) {
								$('#length2k_1').html('Maximum limit 2000 charactar ');
								check = 1;
							}
							if ($('.length2k_2').val().length > 2000) {
								$('#length2k_2').html('Maximum limit 2000 charactar ');
								check = 1;
							}
							if ($('.length30_2').val().length > 30) {
								$('#length30_2').html('Maximum limit 30 charactar ');
								check = 1;
							}
							if ($('.length30_3').val().length > 30) {
								$('#length30_3').html('Maximum limit 30 charactar ');
								check = 1;
							}
							if ($('.length200_1').val().length > 200) {
								$('#length200_1').html('Maximum limit 200 charactar ');
								check = 1;
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
			$('.reward_button_area').before(content);
		})



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
		})

	</script>

@stop
