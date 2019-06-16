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
			background-color: #575757;
			padding-left: 42px;
			margin-left: -8px;
		}
		.wizard>.steps .current a:after{
			content: '';
		    background: #575757;
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
			border: 2px solid #575757;
			background-color: #ffffff;
			padding-top: 3px;
    		padding-bottom: 3px;
    		position: relative;
    		border-right: none;
    		border-left: none;
		}
		.wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active{
			margin-left: -8px;
			border-left: 2px solid #575757;
			color: #aaaaaa;
		}
		.wizard>.steps .disabled a:after, .wizard>.steps .done a:after{
			content: '';
		    border-top: 2px solid #575757;
		    border-right: 2px solid #575757;
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
			width: 23%;
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

							<li class="list-inline-item">退会申請 &gt; 退会申請理由入力</li>


						</ul>


					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>

<div class="container" id="new-project">


<div class="mt20">
	<div class="row justify-content-center">
		{{-- <div class="text-center col-sm-12 col-md-12">
				<h1 class=" page_title_product_register">商品を登録する</h1>
		</div> --}}
			

		<div class="col-md-8 offset-md-2">

			

			<form id="example-form" action="" class="mt20" method="post" enctype="multipart/form-data">

				{{ csrf_field() }}

			    <div class="mt20">
							<h3 class="step_title_area">
				        	<span class="steptext">Step</span><span class="stepcount">1</span>
				        	<span class="stepinfo">退会理由入力</span>
				    	</h3>
			        <section class="mt-3">
								<div class="col-md-12 col-sm-12">
									<h5 class="">退会理由</h5>

									
										<div class="offset-1">
											
												<div class="radio">
														<label><input type="radio" value="プロジェクトが成立し、資金調達が完了した" name="reason" checked>プロジェクトが成立し、資金調達が完了した</label>
													</div>
													<div class="radio">
														<label><input type="radio" value="プロジェクトを作成したが、支援が集まらなかった" name="reason">プロジェクトを作成したが、支援が集まらなかった</label>
													</div>
													<div class="radio disabled">
														<label><input type="radio" value="支援したいプロジェクトがなかった" name="reason" >支援したいプロジェクトがなかった</label>
													</div>
													<div class="radio disabled">
														<label><input type="radio" value="プロジェクト申請が通らなかった" name="reason" >プロジェクト申請が通らなかった</label>
													</div>
													<div class="radio disabled">
														<label><input type="radio" value="他で資金調達の目処がついた" name="reason" >他で資金調達の目処がついた</label>
													</div>
													<div class="radio disabled">
														<label><input type="radio" value="使いにくかった" name="reason" >使いにくかった</label>
													</div>
													<div class="radio disabled">
														<label><input type="radio" value="サポートが不満" name="reason" >サポートが不満</label>
													</div>
													<div class="radio disabled">
														<label><input type="radio" value="その他" name="reason" >その他</label>
													</div>
										</div>
										<div class="form-group">
											<h5 class="">理由詳細</h5>
											<div class="offset-1">
												<textarea name="reason_details" class="form-control" rows="8" cols="80"></textarea>
											</div>
										</div>
									

								</div>

									{{-- <div class="mr-md-5"> --}}
										{{-- <h4 class="text-center mt-5 mr-md-5">	<a href="{{route('user-withdrawal2')}}" class="btn btn-md btn-bottom"><span><i class="fa fa-angle-left"></i> --}}
			        </section>
							<h3 class="step_title_area">
									<span class="steptext">Step</span><span class="stepcount">2</span>
									<span class="stepinfo">退会理由確認</span>
							</h3>
							<section class="mt-3">
								<div class="row mt-5">
									<div class="col-md-8 col-sm-8">
										<h5 class="">退会理由</h5>
										<p class="p-3 reason">プロジェクトが成立し、資金調達が完了した</p>

										<h5 class="">理由詳細</h5>
										<p class="p-3">理由詳細をここに記載します</p>
										{{-- <div class="mr-md-5">
											<h4 class="text-center mt-5 mr-md-5">	<a href="{{route('user-withdrawal2')}}" class="btn btn-md btn-bottom"><span><i class="fa fa-angle-left"></i>

											</span>戻 る </a>
												<a href="{{route('user-withdrawal4')}}" class="btn btn-md btn-bottom">退会申請 <span><i class="fa fa-angle-right"></i>
											</span> </a></h4>
										</div> --}}
									</div>
								</div>
							</section>
							<h3 class="step_title_area">
									<span class="steptext">Step</span><span class="stepcount">3</span>
									<span class="stepinfo">退会申請完了</span>
							</h3>
							<section class="mt-3">
								<div class="row mt-5">
									<div class="col-md-8 col-sm-8 mr-md-5">
										<div class="mr-md-3">
											<h4 class="font-weight-bold   text-center mr-md-5">退会申請が完了しました。</h4>
											<p class="p-3  text-center mr-md-5">入力していただいた内容で退会申請を行いました。<br>
										 Crofunのご利用いただきありがとうございました。</p>
										 <h4 class="text-center mt-5 mr-md-5">	
											 <a href="{{route('user-withdrawal2')}}" class="btn btn-md btn-bottom btn-secondary">
												<span><i class="fa fa-angle-left"></i></span>戻 る 
											</a>
										 </h4>
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
		        form.validate().settings.ignore = ":disabled,:hidden";
        		return form.valid();
        		// return true;
		    },
		    onStepChanged: function (event, currentIndex, newIndex)
		    {
					 if (currentIndex == 2) {
					 }
		        if(currentIndex == 1){
		        	$('.actions > ul > li:last-child').attr('style', '');
		        	$('.actions > ul > li:nth-child(2)').attr('style', 'display:none;');
							// alert('hello');
							$('.reason').html($('input[name="reason"]:checked').val());
							$('.reason_details').html($('textarea[name="reason_details"]').val());



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
			$('.reward_container').before(content);
		})



		// console.log('new project');
		// $(function(){
		// 	CKEDITOR.replace( 'editor', {
		// 	    toolbar: basic
		// 	} );
		// 	// CKEDITOR.replaceClass = 'ckeditor';
		// 	CKEDITOR.replace( 'description' ,{
		// 		// filebrowserBrowseUrl : 'ckeditor1/plugins/imageuploader/imgbrowser.php',
		// 		// filebrowserUploadUrl : '/browser1/upload/type/all',
		// 	    filebrowserImageBrowseUrl : '{{Request::root()}}/ckeditor/plugins/imageuploader/imgbrowser.php',
		// 		// filebrowserImageUploadUrl : '/browser3/upload/type/image',
		// 	    // filebrowserWindowWidth  : 800,
		// 	    // filebrowserWindowHeight : 500,
		// 		extraPlugins: 'imageuploader'
		// 		// extraPlugins: 'dropler'
		// 	});
		// })

	</script>

@stop
