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
			margin-top: 10px;
			margin-bottom: 45px;
		}
		.bg-danger{
			/* opacity: 0.9 !important; */
			background-color: #ffe3da !important;
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
									<ul class="nav nav-tabs" role="tablist">
									    <li class="nav-item">
									      <a class="nav-link {{Route::currentRouteName()=='user-favourite-project-list'?'active':''}}" href="{{route('user-favourite-project-list')}}">プロジェクト</a>
									    </li>
									    <li class="nav-item">
									      <a class="nav-link {{Route::currentRouteName()=='user-favourite-product-list'?'active':''}}" href="{{route('user-favourite-product-list')}}">カタログ商品</a>
									    </li>
									</ul>

								  	<!-- Tab panes -->
								  	<div class="tab-content">
								    	<div id="home" class="container tab-pane active row p-0  mt-5">
												@foreach ($projects as $p)

											<div class="col-md-12 col-12 p-0 m-0 horizontal ">
												<div class="row inner_inner ml-md-3">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-12 project-item">
																<img src="{{Request::root()}}/uploads/projects/{{$p->project->featured_image}}" alt="" class="img-fluid">
																<div class="project_status text-white" >募集中</div>
															</div>
														</div>
													</div>
													<div class="col-md-6 p-0">
														<div class="row ">
															<div class="col-md-8">
																<h6 class="" style="font-size:14px; color:#bfc5cc;"> <span style="color:#bfc5cc;"> 	<i class="fa fa-tag"></i> <a href="#">{{$p->category->name}}</a>
															</div>
															<div class="col-md-4">
																<a href="{{route('user-favourite-remove-project', ['id' => $p->project->id])}}" class="pull-right" style="font-size:14px;"><span style="color:#ed49b6;"> <i class="fa fa-heart"></i> </span>お気に入り</a>
															</div>
														</div>
														<div class="row mt-1">
															<div class="col-md-9">
																<h5 style="font-size:16px;" class="font-weight-bold">{{$p->project->title}}</h5>
																<h5 style="font-size:16px;" class="font-weight-bold"> こに入ります</h5>
															</div>
														</div>
												    <?php
																$budget = $p->project->budget;
																$invested = $p->project->investment()->sum('amount');
																$done = $invested*100/$budget;
																$done = round($done);
															 ?>
														<div class="row mt-3">
															<div class="col-md-9">
																<h5 style="font-size:21px; letter-spacing:2px;">現在 {{$invested}}円 </h5>
																<div class="progress">
																	<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="{{ $done }}%" aria-valuemin="0" aria-valuemax="100" style="width:{{$done}}%">
																		{{ $done }}%
																	</div>
																</div>
															</div>
														</div>
														<div class="row  mt-3">
															<div class="col-md-9">
																<h5 style="font-size:19px; letter-spacing:2px;">目標 {{$budget}} 円</h5>
															</div>
														</div>
														<div class="row mt-2">
															<div class="col-md-offset-2 mr-0 div-radius ml-3" style="height:75px; width:75px !important">
															<p class="text-center pt-1"><span class="pt-2 text-center" style="font-size:11px;">応援者</span>
																<br>	<span class="p-0 m-0 text-center" style="font-size:21px;">55人</span></p>
															</div>
															<div class="col-md-offset-2 div-radius ml-2" style="height:75px; width:75px !important">
															<p class="text-center pt-1"><span class="pt-2 text-center" style="font-size:11px;">残り日数</span>
																<br>	<span class="p-0 m-0 text-center" style="font-size:21px;">9日</span></p>
															</div>
															<div class="col-md-6  p-0 ml-md-2">
																<div style="font-size:15px;" class="p-0">起案者：{{$p->project->user->first_name}} {{$p->project->user->last_name}}</div>
																{{-- <div class=" div-radius1 m-0 p-0" style="height:40px"> --}}
																	<button class=" bg-primary p-2 text-white btn btn-md btn-block font-weight-bold" style="padding:12px !important; margin-top: 5px;">プロジェクトを支援する</button>
																{{-- </div> --}}
															</div>
														</div>
													</div>
												</div>
											</div>
										@endforeach


								   		</div>
									</div>
								</div>

							</div>

						{{-- repeat --}}



						{{-- repeat ends --}}

				</div>

			</div>

			</div>
	  </div>
	</div>
</div>


@stop

@section('custom_js')

@stop
