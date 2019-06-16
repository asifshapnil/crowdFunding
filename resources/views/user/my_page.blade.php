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
		.heading:after{
			display: block;
			height: 3px;
			background-color: #80b9f2;
			content: "";
			width: 100%;
			margin: 0 auto;
			margin-top: 10px;
			margin-bottom: 30px;
		}
		.bg-dark{
			background-color: #c6c6c6;
		}
		.div-radius{
			border: 3px solid #eaebed;
			border-radius: 5px;
		}
		.div-radius1{
			/* border: 3px solid #eaebed; */
			border-radius: 5px;
		}
		.horizontal:after{
			display: block;
			height: 2px;
			background-color: #999;
			content: "";
			width: 100%;
			margin: 0 auto;
			margin-top: 30px;
			margin-bottom: 30px;
		}
		.bg-danger{
			/* opacity: 0.9 !important; */
			background-color: #ffe3da !important;
		}
		.btn-dark{
			background-color: #575757;
		}

	.project_status {
    position: absolute;
    top: 15px;
    left: 3px;
    width: auto;
    padding: 5px;
    padding-left: 15px;
    padding-right: 15px;
    text-align: center;
		background-color: #ff6540;
	}
	.project-item{
		position: relative;
	}
	.icon-info{
		border: 2px solid #ff3300;
		padding-right: 10px;
		padding-left: 10px;
		padding-top: 1px;
		padding-bottom: 1px;
		border-radius: 50%;
		color: #ff3300;
		background-color: #ffffff;


	}





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
					<div class="col-md-3">
						@include('user.layouts.profile')
					</div>
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12 col-12">
								<div class="row inner">
									<div class="col-md-12 col-12 ">
										<div class="{{ !$messages->isEmpty() || !$OrderDetails->isEmpty() ? 'bg-danger' : '' }} px-2 pt-3">
											@if (!$messages->isEmpty())
												<div class="d-flex flex-row">
													<div class="align-self-start pr-2">
														<span class="icon-info"> <i class="	fa fa-exclamation"></i> </span>
													</div>
														<div class="align-self-end">
															<p class="font-weight-bold" style="color:red; font-size:15px;">メッセージが届いています。</p>
														</div>
													</div>
											 @endif

											 @if (!$OrderDetails->isEmpty())
												 <div class="d-flex flex-row">
													 <div class="align-self-start pr-2">
														 <span class="icon-info"> <i class="	fa fa-exclamation"></i> </span>
													 </div>
													 <div class="align-self-end">
														 <p class="font-weight-bold" style="color:red; font-size:15px;">商品の注文が入りました</p>
													 </div>
												 </div>
											 @endif
										 </div>
									 </div>
								 </div>
							 </div>
						 </div>

						<div class="row">
							<div class="col-md-12 col-12">
								<div class="row inner">
									<div class="col-md-12 col-12 pt-3">
										<h4 class="heading">現在起案中のプロジェクト</h4>
									</div>
								</div>
							</div>
						</div>
						@if($projects)
						@foreach ($projects as $project)
							<?php
									$budget = $project->budget;
									$invested = $project->investment()->sum('amount');
									$done = $invested*100/$budget;
									$done = round($done);
								 ?>

							<div class="row horizontal">
							<div class="col-md-12 col-12">


								<div class="row ">
									<div class="col-md-12 col-12">
										<div class="row ">
											<div class="col-md-6">
												<div class="row">
													<div class="col-md-12 project-item">
														<img src="{{$project->featured_image ?  asset('uploads/projects/'.$project->featured_image) : asset('uploads/projects/1615154785167836.jpeg')}}" alt="" class="img-fluid">
														<div class="project_status {{strtotime($project->end) < strtotime(date('Y-m-d H:i:s')) ? 'status_3' : ($done >= 100?'status_2':'status_1')}}"><span>{{strtotime($project->end) < strtotime(date('Y-m-d H:i:s')) ? '終了' : ($done >= 100?'達成':'募集中')}}</span></div>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="row ">
													<div class="col-md-7">
														<h6 class="" style="font-size:14px; color:#bfc5cc;"> <span style="color:#bfc5cc;"> 	<i class="fa fa-tag"></i> <a href="/?c={{ $project->category->id }} ">{{$project->category->name}}</a>
												</span></h6>
													</div>
													<div class="col-md-5">
														@php
															$fav = 0;
														@endphp
														@foreach ($project->favourite as $f)
															@if ($f->user_id == Auth::user()->id)
																@php
																	$fav = 1;
																@endphp
															@endif
														@endforeach
														@if ($fav == 0)
															<a  href="{{ route('user-favourite-add-project', $project->id) }}" class="pull-right" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span> お気に入りに追加 </a>
														@else
															<span class="pull-right" style="font-size:14px;"><span style="color:#555"> <i class="fa fa-heart-o"></i> </span>お気に入り</span>
														@endif



													</div>
												</div>
												<div class="row mt-1">
													<div class="col-md-9">
														<h5 style="font-size:16px;" class="font-weight-bold">{{$project->title}}</h5>
													</div>
												</div>
												<?php
														// $budget = $project->budget;
														// $invested = $project->investment()->sum('amount');
														// $done = $invested*100/$budget;
														// $done = round($done);
													 ?>
												<div class="row mt-3">
													<div class="col-md-9">
														<h5 style="font-size:21px; letter-spacing:2px;">現在 {{$invested}} 円 </h5>
														<div class="progress">
															<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="{{$done}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$done}}%">
																{{$done}}%
															</div>
														</div>
													</div>
												</div>
												<div class="row  mt-3">
													<div class="col-md-9">
														<h5 style="font-size:19px; letter-spacing:2px;">目標 {{$budget}} 円</h5>
													</div>
												</div>
												<div class="row mt-3">
													<div class="col-md-offset-2 mr-0 div-radius ml-3" style="height:80px; width:80px !important;">
															<p class="text-center pt-2"><span class="pt-2 text-center" style="font-size:11px;">応援者</span>
															<br><span class="p-0 m-0 text-center" style="font-size:21px;">{{ $project->investment()->count() }}人</span><p/>
													</div>
													@php
													$start = strtotime("now");
													$end = strtotime($project->end);
													$days_between = ceil(abs($end - $start) / 86400);
													// $datediff = round($datediff / (60 * 60 * 24));

													@endphp
													<div class="col-md-offset-2 div-radius ml-2" style="height:80px; width:80px !important;">
															<p class="text-center pt-2"><span class="pt-2 text-center" style="font-size:11px;">残り日数</span>
															<br><span class="p-0 m-0 text-center" style="font-size:21px;">{{ $days_between }}日</span><p/>
													</div>
													<div class="col-md-6 offset-0 editbtn">
														<div class="bg-dark div-radius1">
															<a href="{{ route('user-project-edit', $project->id) }}" class="p-2 text-white btn btn-md btn-block font-weight-bold" style="padding-top: 28px !important;padding-bottom: 28px !important;">編集する</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						@endforeach
					@endif

						<div class="row" style="margin-top: 30px;margin-bottom: 30px;">
							<div class="col-12 text-center">
								<a href="{{ route('user-project-add') }}" class="btn btn-primary">プロジェクトを起案申請する</a>
							</div>
						</div>

						@if($invested_projects)
						@foreach ($invested_projects as $invested_project)
							<?php
									$budget = $invested_project->budget;
									$invested = $invested_project->investment()->sum('amount');
									$done = $invested*100/$budget;
									$done = round($done);
								 ?>
							<div class="row mb-5">
							<div class="col-md-12 col-12">
								<div class="row inner">
									<div class="col-md-12 col-12 pt-3">
										<h4 class="heading">現在支援中のプロジェクト</h4>
									</div>
								</div>

								<div class="row inner">
									<div class="col-md-12 col-12">
										<div class="row inner_inner">
											<div class="col-md-6">
												<div class="row">
													<div class="col-md-12 project-item">
														<img src="{{$invested_project->featured_image ?  asset('uploads/projects/'.$invested_project->featured_image) : asset('uploads/projects/1615154785167836.jpeg')}}" alt="" class="img-fluid">
														<div class="project_status {{strtotime($invested_project->end) > strtotime(date('Y-m-d H:i:s')) ? 'status_1' : 'status_2'}}"><span>{{strtotime($invested_project->end) > strtotime(date('Y-m-d H:i:s')) ? '募集中' : '達成！'}}</span></div>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="row ">
													<div class="col-md-7">
														<h6 class="" style="font-size:14px; color:#bfc5cc;"> <span style="color:#bfc5cc;"> 	<i class="fa fa-tag"></i> <a href="/?c={{ $invested_project->category->id }} ">{{$invested_project->category->name}}</a>
													</span></h6>
												</div>
													<div class="col-md-5">
														@php
															$fav = 0;
														@endphp
														@foreach ($invested_project->favourite as $f)
															@if ($f->user_id == Auth::user()->id)
																@php
																	$fav = 1;
																@endphp
															@endif
														@endforeach
														@if ($fav == 0)
															<a  href="{{ route('user-favourite-add-project', $invested_project->id) }}" class="pull-right" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入りに追加</a>
														@else
															<span class="pull-right" style="font-size:14px;"><span style="color:#555"> <i class="fa fa-heart-o"></i> </span>  お気に入り</span>
														@endif
													</div>
												</div>
												<div class="row mt-1">
													<div class="col-md-9">
														<h5 style="font-size:16px;" class="font-weight-bold">{{$invested_project->title}}</h5>
													</div>
												</div>

												<div class="row mt-3">
													<div class="col-md-9">
														<h5 style="font-size:21px; letter-spacing:2px;">現在 {{$invested}} 円 </h5>
														<div class="progress">
															<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="{{$done}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$done}}%">
																{{$done}}%
															</div>
														</div>
													</div>
												</div>
												<div class="row  mt-3">
													<div class="col-md-9">
														<h5 style="font-size:19px; letter-spacing:2px;">目標 {{$budget}} 円</h5>
													</div>
												</div>
												<div class="row mt-3">
													<div class="col-md-offset-2 mr-0 div-radius ml-3" style="height:80px; width:80px !important;">
															<p class="text-center pt-2"><span class="pt-2 text-center" style="font-size:11px;">応援者</span>
															<br><span class="p-0 m-0 text-center" style="font-size:21px;">{{ $invested_project->investment()->count() }}人</span><p/>
													</div>
													@php
													$start = strtotime("now");
													$end = strtotime($invested_project->end);
													$days_between = ceil(abs($end - $start) / 86400);
													// $datediff = round($datediff / (60 * 60 * 24));

													@endphp
													<div class="col-md-offset-2 div-radius ml-2" style="height:80px; width:80px !important;">
															<p class="text-center pt-2"><span class="pt-2 text-center" style="font-size:11px;">残り日数</span>
															<br><span class="p-0 m-0 text-center" style="font-size:21px;">{{ $days_between }}日</span><p/>
													</div>
													<div class="col-md-6 offset-0">
														<p style="font-size:15px;">起案者：{{$invested_project->user->first_name}} {{$invested_project->user->last_name}}</p>
														<div class="bg-dark div-radius1">
															<button class="p-2 text-white btn btn-md btn-block font-weight-bold msg_send_btn" data-user_id="{{ $invested_project->user->id }}" data-project_username="{{ $invested_project->user->first_name.' '.$invested_project->user->last_name }}" style="cursor:pointer; color:#fff;"> <span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span>メッセージを送る</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						@endforeach
					@endif
						<div class="row">
							<div class="col-md-12 col-12">
								<div class="row inner">
									<div class="col-md-12 col-12 pt-3">
										<h4 class="heading">掲載商品</h4>
									</div>
								</div>
							</div>
						</div>
						@if($products)
						@foreach ($products as $product)
							<div class="row mb-5">
								<div class="col-md-12 col-12">


									<div class="row inner">
										<div class="col-md-12 col-12">
											<div class="row inner_inner">
												<div class="col-md-6">
													<div class="row">
														<div class="col-md-12 project-item">
															<img src="{{$product->image ?  asset('uploads/products/'.$product->image) : asset('uploads/projects/1615154785167836.jpeg')}}" alt="" class="img-fluid">
															{{-- <div class="project_status {{strtotime($product->end) > strtotime(date('Y-m-d H:i:s')) ? 'status_1' : 'status_2'}}"><span>{{strtotime($product->end) > strtotime(date('Y-m-d H:i:s')) ? '募集中' : '達成！'}}</span></div> --}}
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="row ">
														<div class="col-md-7">
															<h6 class="" style="font-size:14px; color:#bfc5cc;"> <span style="color:#bfc5cc;">{{ $product->company_name }}</h6>
														</div>
														<div class="col-md-5">
															@php
																$fav = 0;
															@endphp
															@foreach ($product->favourite as $f)
																@if ($f->user_id == Auth::user()->id)
																	@php
																		$fav = 1;
																	@endphp
																@endif
															@endforeach

															@if ($fav == 0)
																<a  href="{{ route('user-favourite-add-product', $product->id) }}" class="pull-right" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入りに追加 </a>
															@else
																<span class="pull-right" style="font-size:14px;"><span style="color:#555"> <i class="fa fa-heart-o"></i> </span>お気に入り</span>
															@endif
														</div>
													</div>
													<div class="row mt-1">
														<div class="col-md-9">
															<h5 style="font-size:16px;" class="font-weight-bold">{{$product->title}}</h5>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-9">
															<h5 style="font-size:21px; letter-spacing:2px;">{{ $product->price }} ポイント</h5>
														</div>
													</div>
													<div class="row  mt-3">
														<div class="col-md-9">
															<h5 style="font-size:15px; letter-spacing:2px;">カラー：
																@foreach ($product->color as $p_color)
																	{{ $p_color->color.',' }}
																@endforeach
															</h5>
														</div>
													</div>
													<div class="row  mt-3">
														<div class="col-md-9">
															<h5 style="font-size:15px; letter-spacing:2px;">サイズ：
																@foreach ($product->color as $p_color)
																	{{ $p_color->type.',' }}
																@endforeach
															</h5>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-12">
															<div class="div-radius1">
																<a href="{{ route('user-product-edit', $product->id) }}" class="p-2 bg-dark text-white btn btn-secondary font-weight-bold" style="padding-left: 30px !important;padding-right: 30px !important;">編集する</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>

						@endforeach
					@endif
						<div class="row" style="margin-top: 30px;margin-bottom: 30px;">
						<div class="col-12 text-center">
							<a href="{{ route('user-product-add') }}" class="btn btn-warning">商品を登録をする</a>
						</div>
					</div>

						<div class="row">
							<div class="col-md-12 col-12">
								<div class="row inner">
									<div class="col-md-12 col-12 pt-3">
										<h4 class="heading">購入済み商品</h4>
									</div>
								</div>
							</div>
						</div>
						@if($OrderDetails)
							@foreach($OrderDetails as $orderDetail)
								<div class="row mb-5">
									<div class="col-md-12 col-12">

										<div class="row inner">
											<div class="col-md-12 col-12">
												<div class="row inner_inner">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-12 project-item">

																<img src="{{$orderDetail->product->image ?  asset('uploads/products/'.$orderDetail->product->image) : asset('uploads/projects/1615154785167836.jpeg')}}" alt="" class="img-fluid">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="row ">
															<div class="col-md-7">
																<h6 class="" style="font-size:14px; color:#bfc5cc;"> <span style="color:#bfc5cc;">{{ $orderDetail->product->company_name }}</h6>
															</div>
															<div class="col-md-5">
																@php
																	$fav = 0;
																@endphp
																@foreach ($orderDetail->product->favourite as $f)
																	@if ($f->user_id == Auth::user()->id)
																		@php
																			$fav = 1;
																		@endphp
																	@endif
																@endforeach
																@if ($fav == 0)
																	<a  href="{{ route('user-favourite-add-product', $orderDetail->product->id) }}" class="pull-right" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入りに追加</a>
																@else
																	<span class="pull-right" style="font-size:14px;"><span style="color:#555"> <i class="fa fa-heart-o"></i> </span> お気に入り</span>
																@endif
															</div>
														</div>
														<div class="row mt-1">
															<div class="col-md-9">
																<h5 style="font-size:16px;" class="font-weight-bold">{{$orderDetail->product->title}}</h5>
															</div>
														</div>
														<div class="row mt-3">
															<div class="col-md-9">
																<h5 style="font-size:21px; letter-spacing:2px;">1,900 ポイント</h5>
															</div>
														</div>
														<div class="row  mt-3">
															<div class="col-md-9">
																<h5 style="font-size:15px; letter-spacing:2px;">1個 ／ 白 ／ L ／</h5>
															</div>
														</div>
														<div class="row  mt-3">
															<div class="col-md-9">
																<h5 style="font-size:15px; letter-spacing:2px;">購入日：2018年10月1日</h5>
															</div>
														</div>
														<div class="row  mt-3">
															<div class="col-md-9">
																<h5 style="font-size:13px; letter-spacing:2px;">商品提供者：{{$orderDetail->product->user->first_name}} {{$orderDetail->product->user->last_name}}</h5>
															</div>
														</div>
														<div class="row mt-3">
															<div class="col-md-6 pr-md-1">
																<button class="p-2 text-white btn btn-md btn-block font-weight-bold msg_send_btn" data-user_id="{{ $orderDetail->product->user->id }}" data-project_username="{{ $orderDetail->product->user->first_name.' '.$orderDetail->product->user->last_name }}" style="cursor:pointer; color:#fff;">
																	<span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span>メッセージを送る
																</button>
															</div>
															<div class="col-md-6 pl-md-1">
																	<button type="button" class="p-2 editbtn text-white btn btn-md btn-block font-weight-bold btn-warning" data-toggle="modal" data-target="#star">★★★  レビューを書く</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							@endforeach
					@endif

					@php
						$error = 0;

						if (empty($user->first_name) || empty($user->last_name) || empty($user->first_name) || empty($user->profile->dob) || empty($user->profile->sex) || empty($user->profile->municipility) || empty($user->profile->address) || empty($user->profile->room_no) || empty($user->profile->phone_no) ) {
							$error = 1;

						}
					@endphp
					<input type="hidden" name="getError" id="getError" value="{{ $error }}">

					</div>
				</div>
			</div>
	  	</div>
	</div>
</div>
@include('user.layouts.profileModal')
@include('user.layouts.star-rating')
@include('user.layouts.message_modal')




@stop

@section('custom_js')
	<script type="text/javascript">
	    // var error = document.getElementById('getError').value;
			var error = $('#getError').val();

			// error = 1;
				$(window).on('load',function(){
					console.log('error = ' + error);
						if (error == 1) {
							$('#myModal').modal('show');
						}
				});




			// $('#myModal').modal({
    	// 	backdrop: 'static',
    	// 	keyboard: false  // to prevent closing with Esc button (if you want this too)
			// });
	</script>


		<script type="text/javascript">
				$(document).ready(function(){
					$('.msg_send_btn').on('click', function(e){
						var user_id = $(this).attr('data-user_id');
						var user_name = $(this).attr('data-project_username');


						$('#to_id').html(user_id);
						$('#project_user_name').html(user_name);
						$('#send-message').modal('show');
						//$('#send-message').addClass('show');
					});
				});
		</script>

@stop
