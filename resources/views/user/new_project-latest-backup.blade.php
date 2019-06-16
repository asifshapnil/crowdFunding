@extends('user.layouts.main')

@section('custom_css')
	<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 24.3%;
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
		/*steps end*/
		.right_arrow_area{
			position: relative;
		}
		.right_arrow_area:after{
			content: '~';
		    display: block;
		    position: absolute;
		    top: 3px;
		    right: -6px;
		    font-size: 20px;
		    font-weight: 400;
		}
		.wizard>.actions a, .wizard>.actions a:hover, .wizard>.actions a:active{
			background: #039aff;
		}
		@media (max-width: 575.98px) {
			.wizard > .steps > ul > li{
		        width: 93% !important;
		    }
		    .wizard>.steps a, .wizard>.steps a:hover, .wizard>.steps a:active{
		        border-left: 2px solid #039aff !important;
		        margin-left: 0px !important;
		    }
		}
	</style>
@stop


@section('ecommerce')

@stop

@section('content')
@include('user.layouts.tab')

<div class="container" id="new-project">


<div class="mt20">
	<div class="row">

		<div class="col-md-10 offset-md-1">

			<h1 class="text-center page_title_product_register">プロジェクトを申請する</h1>

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
						    <input type="text" class="form-control required col-12 length35_1" placeholder="" name="title">
								<span id="length35_1" class="text-danger"></span>

						  </div>
							<div class="form-group">
								<label for="category">カテゴリ(分類)</label>
									<select class="form-control required col-12" name="category">
										<?php foreach($category as $c){?>
											<option value="{{$c->id}}">{{$c->name}}</option>
										<?php }?>

									</select>
							</div>


						  <div class="form-group">
						    <label for="">画像</label>
						    <input type="file" class="col-12 required" placeholder="" name="featured_image">

						  </div>

							<div class="form-group">
						    <label for="description">プロジェクト概要</label>
								<textarea name="description" id="description" rows="8" cols="80" class="form-control required col-12 length2k_1 ckeditor"></textarea>
								<span id="length2k_1" class="text-danger"></span>

						  </div>
							<div class="form-group">
								<label for="purpose">目的</label>
								<input type="text" class="form-control required col-12 length200_1" placeholder="" name="purpose">
								<span id="length200_1" class="text-danger"></span>


							</div>
							<div class="form-group">
								<label for="">目標金額</label>
								<input type="number" class="form-control required col-12" placeholder="" name="budget">

							</div>



						  	<div class="row">
						  		<div class="col-md-12">
						  			<div class="row">
									  	<div class="col-12">
											<label for="">募集期間</label>
										</div>

									  	<div class="form-group col">
										    <select class="form-control required col-12 calculateDay current fromY" name="fromY" id="fromY">
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
											 $year = date('Y');
											 $maxDays=date('t');
											 // echo $days;
											 // echo $maxDays;
											 $restD = ($maxDays-$day)+1;

											 // $restM = 13-$month;

											 // echo $year;
										@endphp
										<input type="hidden" name="" class="getyear" value="{{ $year }}">
										<input type="hidden" name="" class="getmonth" value="{{ $month }}">

										<div class="form-group col">
											<select class="form-control required calculateDay currentyear fromM" name="fromM" id="fromM">
												<option value="0" selected>----</option>
												<?php for($i=date('m');$i<date('m')+$restM;$i++){?>
													<option value="{{$i}}">{{$i}}</option>

												<?php }?>
											</select>
											<select class="form-control required calculateDay notcurrent fromM hide" name="fromM" id="fromM">
												<option value="0" selected>----</option>
												<?php for($i=1;$i<13;$i++){?>
													<option value="{{$i}}">{{$i}}</option>

												<?php }?>
											</select>
										</div>

									  	<div class="form-group col right_arrow_area">
										    <select class="form-control required calculateDay currentmonth fromD" name="fromD" id="fromD">
													<option value="0" selected>----</option>
													<?php for($i=date('d');$i<date('d')+$restD;$i++){?>
														<option value="{{$i}}">{{$i}}</option>

													<?php }?>
										    </select>
												<select class="form-control required calculateDay notcurrentmonth fromD hide" name="fromD" id="fromD">
													<option value="0" selected>----</option>
													<?php for($i=1;$i<32;$i++){?>
														<option value="{{$i}}">{{$i}}</option>

													<?php }?>
												</select>
										</div>

									  	<div class="form-group col">
												<select class="form-control required col-12 calculateDay tocurrent toY" name="toY" id="toY">
													<option value="0" selected>----</option>
													<?php for($i=date('Y');$i<date('Y')+2;$i++){?>
														<option value="{{$i}}">{{$i}}</option>
													<?php }?>
												</select>


										</div>

									  	<div class="form-group col">
												<select class="form-control required calculateDay tocurrentyear toM" name="toM" id="toM">
													<option value="0" selected>----</option>
													<?php for($i=date('m');$i<date('m')+$restM;$i++){?>
														<option value="{{$i}}">{{$i}}</option>

													<?php }?>
												</select>
												<select class="form-control required calculateDay tonotcurrent toM hide" name="toM" id="toM">
													<option value="0" selected>----</option>
													<?php for($i=1;$i<13;$i++){?>
														<option value="{{$i}}">{{$i}}</option>

													<?php }?>
												</select>

										</div>

									  	<div class="form-group col">
												<select class="form-control required calculateDay tocurrentmonth toD" name="toD" id="toD">
													<option value="0" selected>----</option>
													<?php for($i=date('d');$i<date('d')+$restD;$i++){?>
														<option value="{{$i}}">{{$i}}</option>

													<?php }?>
												</select>
												<select class="form-control required calculateDay tonotcurrentmonth toD hide" name="toD" id="toD">
													<option value="0" selected>----</option>
													<?php for($i=1;$i<32;$i++){?>
														<option value="{{$i}}">{{$i}}</option>

													<?php }?>
												</select>

										</div>
										<div class="form-group col">
							    {{-- <label for="">日間</label> --}}
							    <input type="text" class="form-control required " placeholder="" name="total_day" readonly id="totalDay">
									{{-- <span id="length30_1" class="text-danger"></span> --}}

							</div>

									</div>
								</div>
						  	</div>

							<div class="form-group">
								<label for="">支援金受取人名</label>
								<input type="text" class="form-control required col-12 length30_2" name="beneficiary">
								<span id="length30_2" class="text-danger"></span>

							</div>

						  <div class="form-group">
						    <label for="sub_category">その他内容</label>
						    <input type="text" class="form-control  col-12 length30_3" name="sub_category">
								<span id="length30_3" class="text-danger"></span>

						  </div>
							{{-- <div class="form-group">
							 <label for="budget">d金額</label>
							 <input type="number" class="form-control col-12 required" name="budget">
						 </div> --}}

						  <div class="form-group">
						    <label for="budget_usage_breakdown">予算用途の内訳</label>
								<textarea name="budget_usage_breakdown" rows="8" cols="80" class="form-control required col-12 length2k_2"></textarea>
								<span id="length2k_2" class="text-danger"></span>

						  </div>

							<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

						</section>








							<h3 class="step_title_area">
				        	<span class="steptext">Step</span><span class="stepcount">2</span>
				        	<span class="stepinfo">リターン情報入力</span>
				    	</h3>
			         <section>

								 <div class="row mt20">
								 	<div class="col-md-12">
										<div class="row">
										<label for="amount[]" class="col-md-12">金額</label>
										<div class="col-md-4"> <input type="number" class="form-control" name="amount[]">

										</div>	<sub class="p-0 mt-4 mr-3">円</sub>
										{{-- <div class="col-md-3 p-0">円</div> --}}

									</div>
								 		{{-- <div class="row">
								 			<label for="crofun_amount[]" class="col-md-12">金額</label>
								 			<div class="col-md-4"> <input type="text" class="form-control" name="crofun_amount[]">

								 			</div>	<sub class="p-0 mt-4 mr-3">円</sub>
								 		</div> --}}
								 	</div>
								 	<div class="col-md-12 mt-3">
								 		<div class="row">
								 			<label for="is_crofun_point[]" class="col-md-12">Crofunポイント  <span class="text-danger" data-toggle="modal" data-target="#add-project">(?)</span> </label>
								 			<div class="col-md-4"><input type="number" class="form-control" name="is_crofun_point[]">

								 			</div>	<sub class="p-0 mt-4 mr-3">pt</sub>
								 			{{-- <div class="col-md-3 p-0">pt</div> --}}

								 		</div>
								 	</div>
								 	<div class="col-md-12 mt-3">
								 		<div class="row">
								 			<label for="is_other[]" class="col-md-12">リターン品名</label>
								 			<div class="col-md-4"><input type="text" class="form-control" name="is_other[]"></div>


								 		</div>
								 	</div>
								 	<div class="col-md-12 mt-3">
								 		<div class="row">
								 			<label for="other_description[]" class="col-md-12">内容</label>
								 			<div class="col-md-10">
								 				<textarea name="other_description[]" rows="8" cols="80" class="form-control"></textarea>
								 			</div>

								 		</div>
								 	</div>

								 	<div class="col-md-12 mt-3">
								 		<div class="row">
								 			<label for="other_file[]" class="col-md-12">写真</label>
								 			<div class="col-md-4"><input type="file" class="" name="other_file[]"></div>
								 		</div>
								 	</div>
								 	{{-- <div class="col-md-8">

								 <div class="row">

								 	<div class="col">
								 		<input type="checkbox" class="form-check-input" name="is_crofun_point[]">
								 		Crofun ポイント
								 	</div>
								 	<div class="col">
								 		<input type="text" class="form-control" name="crofun_amount[]">
								 	</div>
								 	<div class="col-md-1">
								 		P
								 	</div>

								 </div>

								 <div class="row mt20">
								 <div class="col-md-1">
								 	<input type="checkbox" class="form-check-input" name="is_other[]">
								 </div>
								 <div class="col">
								 	<input type="text" class="form-control" name="other_description[]">
								 	<label class="custom-file mt20">
								 		<input type="file" id="file" class="custom-file-input" name="other_file[]">
								 		<span class="custom-file-control"></span>
								 	</label>
								 </div>
								 </div>
								 	</div> --}}
								 </div>
								<div class="row  mt-3 mb-3 reward_button_area">
									<div class="col-md-2 offset-4">
										<a href="#!" class="btn btn-outline-info add_reward">+ さらに追加する</a>

									</div>
								</div>


			            <div class="reward_container"></div>


			        </section>
							<h3 class="step_title_area">
				        	<span class="steptext">Step</span><span class="stepcount">3</span>
				        	<span class="stepinfo">追加情報入力</span>
				    	</h3>
			         <section>
								 <div class="form-group">
									<label for="details_title[]">見出しタイトル</label>
									<input type="text" class="form-control required col-12" placeholder="" name="details_title[]">
								</div>
					            {{-- <div class="form-group">
								    <label for="">小題</label>
								    <input type="text" class="form-control" placeholder="" name="details_title[]">
								</div> --}}

								<div class="form-group">
									<label for="details_description[]">内容</label>
									<textarea name="details_description[]" class="form-control required col-12" rows="8" cols="80"></textarea>
							 	</div>
								{{-- <div class="form-group">
								    <label for="">本文</label>
								    <textarea class="form-control" name="details_description[]"></textarea>
								</div> --}}
								<div class="form-group">
									<label for="draft_file[]" class="col-md-12">見出しタイトル</label>
									<input type="file" class="required col-10" placeholder="" name="draft_file[]">
							 	</div>



						<div class="details_container"></div>
						<div class="row  mt-3 mb-3">
							<div class="col-md-2 offset-4">
								<a href="#!" class="btn btn-outline-info add_details">+ さらに追加する</a>

							</div>
						</div>

						{{-- <div class="text-center mt20">
							<a href="#!" class="btn btn-secondary add_details">+ さらに追加する</a>
						</div> --}}

			        </section>
							<h3 class="step_title_area">
				        	<span class="steptext">Step</span><span class="stepcount">4</span>
				        	<span class="stepinfo">申請完了</span>
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

 <div class="hide reward">
	 <div class="row mt20">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<label for="amount[]" class="col-md-12">金額</label>
	 			<div class="col-md-4"> <input type="number" class="form-control" name="amount[]">

	 			</div>	<sub class="p-0 mt-4 mr-3">円</sub>
	 			{{-- <div class="col-md-3 p-0">円</div> --}}

	 		</div>
	 	</div>
	 	<div class="col-md-12 mt-3">
	 		<div class="row">
				<label for="is_crofun_point[]" class="col-md-12">Crofunポイント</label>

	 			<div class="col-md-4"><input type="number" class="form-control" name="is_crofun_point[]">

	 			</div>	<sub class="p-0 mt-4 mr-3">pt</sub>
	 			{{-- <div class="col-md-3 p-0">pt</div> --}}

	 		</div>
	 	</div>
	 	<div class="col-md-12 mt-3">
	 		<div class="row">
	 			<label for="is_other[]" class="col-md-12">リターン品名</label>
	 			<div class="col-md-4"><input type="text" class="form-control" name="is_other[]"></div>


	 		</div>
	 	</div>
	 	<div class="col-md-12 mt-3">
	 		<div class="row">
	 			<label for="other_description[]" class="col-md-12">内容</label>
	 			<div class="col-md-10">
	 				<textarea name="other_description[]" rows="8" cols="80" class="form-control"></textarea>
	 			</div>

	 		</div>
	 	</div>

	 	<div class="col-md-12 mt-3">
	 		<div class="row">
	 			<label for="amount[]" class="col-md-12">写真</label>
	 			<div class="col-md-4"><input type="file" class="" name="other_file[]"></div>


	 		</div>
	 	</div>
	 	{{-- <div class="col-md-8">

	 <div class="row">

	 	<div class="col">
	 		<input type="checkbox" class="form-check-input" name="is_crofun_point[]">
	 		Crofun ポイント
	 	</div>
	 	<div class="col">
	 		<input type="text" class="form-control" name="crofun_amount[]">
	 	</div>
	 	<div class="col-md-1">
	 		P
	 	</div>

	 </div>

	 <div class="row mt20">
	 <div class="col-md-1">
	 	<input type="checkbox" class="form-check-input" name="is_other[]">
	 </div>
	 <div class="col">
	 	<input type="text" class="form-control" name="other_description[]">
	 	<label class="custom-file mt20">
	 		<input type="file" id="file" class="custom-file-input" name="other_file[]">
	 		<span class="custom-file-control"></span>
	 	</label>
	 </div>
	 </div>
	 	</div> --}}
	 </div>
</div>





<div class="hide details">
	<div class="mt20">
		<div class="">
	        <div class="form-group">
			    <label for="">小題</label>
			    <input type="text" class="form-control" placeholder="" name="details_title[]">
			</div>


			<div class="form-group">
			    <label for="">本文</label>
			    <textarea name="details_description[]" class="form-control required col-12" rows="8" cols="80"></textarea>
			</div>

			<div class="form-group">
				<label for="draft_file[]" class="col-md-12">見出しタイトル</label>
				<input type="file" class="required col-10" placeholder="" name="draft_file[]">
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
			$(document).ready(function(){
				$('.fromY').on('change', function(){
					var fromY = parseInt($(this).val());
					var year = parseInt($('.getyear').val());
					if (fromY != year) {
						$('.notcurrent').removeClass('hide').addClass('showM');
						$('.currentyear').addClass('hide').removeClass(('showM'));
						// $('.currentyear').removeAttr('id')

					}else {
						$('.notcurrent').addClass('hide').removeClass('showM');
						$('.currentyear').removeClass('hide').addClass('showM');
						// $('.currentyear').attr('id', 'fromM');

					}

					// alert(fromY +' --- '+ year);

				});

				$('.toY').on('change', function(){
					var toY = parseInt($(this).val());
					var toyear = parseInt($('.getyear').val());
					if (toY != toyear) {
						$('.tonotcurrent').removeClass('hide').addClass('toshowM');
						$('.tocurrentyear').addClass('hide').removeClass('toshowM');

					}else {
						$('.tonotcurrent').addClass('hide').removeClass('toshowM');
						$('.tocurrentyear').removeClass('hide').addClass('toshowM');
					}

					// alert(fromY +' --- '+ year);

				});

				$('.fromM').on('change', function(){
					// alert('jhghj');
					var fromM = parseInt($(this).val());
					var month = parseInt($('.getmonth').val());
					var fromgetyear = parseInt($('.getyear').val());
					var getfromYear = parseInt($('.fromY').val());
					if (fromgetyear == getfromYear) {

						if (fromM != month) {
						$('.notcurrentmonth').removeClass('hide').addClass('showD');
						$('.currentmonth').addClass('hide').removeClass('showD');

					}else {
						$('.notcurrentmonth').addClass('hide').removeClass('showD');
						$('.currentmonth').removeClass('hide').addClass('showD');
					}
				}else{
					$('.notcurrentmonth').removeClass('hide').addClass('showD');
					$('.currentmonth').addClass('hide').removeClass('showD');
				}

					// alert(fromY +' --- '+ year);

				});

				$('.toM').on('change', function(){
					// alert('jhghj');
					var toM = parseInt($(this).val());
					var tomonth = parseInt($('.getmonth').val());
					var togetyear = parseInt($('.getyear').val());

					var gettoYear = parseInt($('.toY').val());
					// alert(togetyear);
					if (togetyear == gettoYear) {

					if (toM != tomonth) {
						$('.tonotcurrentmonth').removeClass('hide').addClass('toshowD');
						$('.tocurrentmonth').addClass('hide').removeClass('toshowD');

					}else {
						$('.tonotcurrentmonth').addClass('hide').removeClass('toshowD');
						$('.tocurrentmonth').removeClass('hide').addClass('toshowD');
					}
				}else{
					$('.tonotcurrentmonth').removeClass('hide').addClass('toshowD');
					$('.tocurrentmonth').addClass('hide').removeClass('toshowD');
				}

					// alert(fromY +' --- '+ year);

				});
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
				var date1 = new Date($('.showM').val()+"/"+$('.showD').val()+"/"+$('.fromY').val());
				// console.log(date1.getTime());
				var date2 = new Date($('.toshowM').val()+"/"+$('.toshowD').val()+"/"+$('.toY').val());
				console.log(date2.getTime());
				console.log(date1.getTime());

				console.log($('.toshowM').val());

				timeDiff = date2.getTime() - date1.getTime();
				// console.log(timeDiff);

				if(timeDiff < 0){
					alert('invalid date');
					return false;
				}
				var timeDiff = Math.abs(timeDiff);
				var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
				console.log(diffDays);
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
