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
	</style>
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
			        <h3>異本情報入力</h3>
			        <section>


						  <div class="form-group">
						    <label for="">プロジェクト名</label>
						    <input type="text" class="form-control required" placeholder="" name="title" value="{{$project->title}}">

						  </div>

						  <div class="form-group">
						    <label for="">画像</label>
						    <input type="file" class="form-control" placeholder="" name="featured_image">

						  </div>



						  <div class="row">

							<div class="form-group col">
								<label for="">カテゴリ(分類)</label>
								<select class="form-control required" name="category">
									<?php foreach($category as $c){?>
										<option value="{{$c->id}}" {{$project->category_id == $c->id?'selected':''}}>{{$c->name}}</option>
									<?php }?>
								</select>
							</div>

							<div class="form-group col">
								<label for="">その他の内容</label>
								<input type="text" class="form-control" placeholder="" name="sub_category" value="{{$project->sub_category}}">
							</div>

						  </div>

						  <div class="form-group">
						    <label for="">目的</label>
						    <input type="text" class="form-control required" placeholder="" name="purpose" value="{{$project->purpose}}">
						  </div>

						  <div class="row">



						  	<div class="form-group col">
							    <label for="">年</label>
							    <select class="form-control required calculateDay" name="fromY" id="fromY">
							    	<option value="0" selected>----</option>
							    	<?php for($i=date('Y');$i<date('Y')+5;$i++){?>
							    		<option value="{{$i}}" {{date('Y', strtotime($project->start)) == $i?'selected':''}}>{{$i}}</option>
							    	<?php }?>
							    </select>
							</div>

						  	<div class="form-group col">
							    <label for="">月</label>
							    <select class="form-control required calculateDay" name="fromM" id="fromM">
							    	<option value="0" selected>----</option>
							    	<?php for($i=1;$i<=12;$i++){?>
							    		<option value="{{$i}}" {{date('m', strtotime($project->start)) == $i?'selected':''}}>{{$i}}</option>
							    	<?php }?>
							    </select>
							</div>

						  	<div class="form-group col">
							    <label for="">日</label>
							    <select class="form-control required calculateDay" name="fromD" id="fromD">
							    	<option value="0" selected>----</option>
							    	<?php for($i=1;$i<=31;$i++){?>
							    		<option value="{{$i}}" {{date('d', strtotime($project->start)) == $i?'selected':''}}>{{$i}}</option>
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
							    	<?php for($i=date('Y');$i<date('Y')+5;$i++){?>
							    		<option value="{{$i}}" {{date('Y', strtotime($project->end)) == $i?'selected':''}}>{{$i}}</option>
							    	<?php }?>
							    </select>
							</div>

						  	<div class="form-group col">
							    <label for="">月</label>
							    <select class="form-control required calculateDay" name="toM" id="toM">
							    	<option value="0" selected>----</option>
							    	<?php for($i=1;$i<=12;$i++){?>
							    		<option value="{{$i}}" {{date('m', strtotime($project->end)) == $i?'selected':''}}>{{$i}}</option>
							    	<?php }?>
							    </select>
							</div>

						  	<div class="form-group col">
							    <label for="">日</label>
							    <select class="form-control required calculateDay" name="toD" id="toD">
							    	<option value="0" selected>----</option>
							    	<?php for($i=1;$i<=31;$i++){?>
							    		<option value="{{$i}}" {{date('d', strtotime($project->end)) == $i?'selected':''}}>{{$i}}</option>
							    	<?php }?>
							    </select>
							</div>

						  	<div class="form-group col">
							    <label for="">日間</label>
							    <input type="text" class="form-control required" placeholder="" name="total_day" readonly id="totalDay">
							</div>

						  </div>

						  <div class="form-group">
						    <label for="">目的金額</label>
						    <input type="number" class="form-control required" name="budget" value="{{$project->budget}}">
						  </div>

						  <div class="form-group">
						    <label for="">予算用途の内訳</label>
						    <textarea class="form-control required" id="editor" name="budget_usage_breakdown">{{$project->budget_usage_breakdown}}</textarea>
						  </div>


						  <div class="form-group">
						    <label for="">支援金受取人名</label>
						    <input type="text" class="form-control required" name="beneficiary" value="{{$project->beneficiary}}">
						    <span>※支援金を受け取る人名、または法人名を入力してください。</span>
						  </div>


						  <div class="form-group">
						    <label for="">プロジェクト概要</label>
						    <textarea class="form-control required description" name="description">{{$project->description}}</textarea>
						  </div>








			        </section>

			        <h3>リターン情報入力</h3>
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

			        <h3>草案入力</h3>
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

			        <h3>完了</h3>
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
	<div class="card mb20">
		<div class="card-block">
            <div class="row mt20">
            	<div class="col-md-4">
            		<div class="row">
            			<div class="col-md-9"><input type="text" class="form-control" name="amount[]"></div>
            			<div class="col-md-3">円</div>

            		</div>
            	</div>
            	<div class="col-md-8">

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
            	</div>
            </div>
        </div>
    </div>
</div>





<div class="hide details">
<div class="card mt20">
	<div class="card-block">
        <div class="form-group">
		    <label for="">小題</label>
		    <input type="text" class="form-control" placeholder="" name="details_title[]">
		</div>


		<div class="form-group">
		    <label for="">本文</label>
		    <textarea class="form-control" name="details_description[]"></textarea>
		</div>
	</div>
</div>
</div>


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
		        finish: "Finish!!",
		        next: "Next >",
		        previous: "< Previous",
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

		var calculateDay = function(e){
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

		// var lastSelectedIndex = 0;
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
			// CKEDITOR.replaceClass = 'ckeditor';
		})
		$('.add_reward').on('click', function(){
			var content = $('.reward').html();
			$('.reward_container').before(content);
		})

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
