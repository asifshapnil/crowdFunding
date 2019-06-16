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
		.modal_close_btn{
		  position: absolute;
		  right: 5px;
		  top: -12px;
		  background-color: #dddddd !important;
		  opacity: 1;
		  border-radius: 50px;
		  width: 26px;
		  height: 25px;
		  padding-top: 2px !important;
		}
		.modal_body_area{
		  position: relative;
		}
	</style>
@stop


@section('ecommerce')

@stop

@section('content')

@include('user.layouts.tab')


<div class="container">
	<div class="row">
		<div class="col-10 offset-md-1">
			<div class="mt20">
				<div class="row">
					<div class="col-md-3">
						@include('user.layouts.profile')
					</div>
					<div class="col-md-9">
						<?php foreach($projects as $p){
							$message_modal_id = 'message'.$p->id;
						?>
							<div class="card padding mt20">
								<?php
									$date1 = new DateTime();
									$date2 = new DateTime($p->end);
									$diff = $date2->diff($date1)->format("%a");
								?>
								<div class="row projects">
									<div class="col-md-12">
										<h2 class="inline">
											<span class="badge badge-default category3">{{$p->category->name}}</span>
										</h2>
										<br>
										<h2 class="text-success inline">{{$p->title}}</h2>
									</div>
								</div>
								<div class="row mt20 projects">
									<div class="col-sm-4">
										<img class="card-img-top img-fluid" src="{{Request::root()}}/uploads/projects/{{$p->featured_image}}" alt="Card image cap">
									</div>
									<div class="col">
										<div>
											<button class="btn btn-danger btn-block">{{$diff > 0?'プロジェクト募集中':'プロジェクト成立'}}</button>
										</div>
										<div class="mt20">
											<a href="!#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#{{isset($message_modal_id)?$message_modal_id:'message'}}">起案者へのメッセージ</a>
										</div>
										<!-- <div class="mt20">
											<a href="{{route('user-project-edit', ['id' => $p->id])}}" class="btn btn-warning btn-block">編集</a>
										</div> -->

										<?php
											$budget = $p->budget;
											$invested = $p->investment()->sum('amount');
											$done = $invested*100/$budget;
											$done = round($done);
										?>

										<div class="progress mt20">
											<div class="progress-bar bg-success" style="width: {{$done}}%;" role="progressbar" aria-valuenow="{{$done}}" aria-valuemin="0" aria-valuemax="100">
												{{$done}}%
											</div>
										</div>
									</div>
								</div>

								<?php
									$date1 = new DateTime();
									$date2 = new DateTime($p->end);
									$diff = $date2->diff($date1)->format("%a");
								?>

								<div class="row projects">
									<div class="col-md-12">
										<h2 class="inline">
											<span class="badge badge-default category3">{{$p->category->name}}</span>
										</h2>
										<br>
										<h2 class="text-success inline">{{$p->title}}</h2>
									</div>
								</div>

								<div class="row mt20 projects">
									<div class="col-sm-4">
										<img class="card-img-top img-fluid" src="{{Request::root()}}/uploads/projects/{{$p->featured_image}}" alt="Card image cap">
									</div>
									<div class="col">
										<div>
											<button class="btn btn-danger btn-block">{{$diff > 0?'プロジェクト募集中':'プロジェクト成立'}}</button>
										</div>
										<div class="mt20">
											<a href="!#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#{{isset($message_modal_id)?$message_modal_id:'message'}}">起案者へのメッセージ</a>
										</div>
										<!-- <div class="mt20">
											<a href="{{route('user-project-edit', ['id' => $p->id])}}" class="btn btn-warning btn-block">編集</a>
										</div> -->

										<?php
											$budget = $p->budget;
											$invested = $p->investment()->sum('amount');
											$done = $invested*100/$budget;
											$done = round($done);
										?>

										<div class="progress mt20">
											<div class="progress-bar bg-success" style="width: {{$done}}%;" role="progressbar" aria-valuenow="{{$done}}" aria-valuemin="0" aria-valuemax="100">
												{{$done}}%
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col">
										<div class="bg-red">
											<h3>支援情報</h3>
										</div>
									</div>
								</div>
								<div class="row">
									<?php
										$investment = $p->investment->where('user_id', Auth::user()->id);
										// dd($investment);
										foreach ($investment as $inv) {
									?>
									<div class="col-md-6">
										<table class="card">
											<tr>
												<td class="text-right">支援金額 :
													<?php
														$details = '';
														foreach ($inv->reward as $r) {
															$details .= $r->reward->amount.'円X'.$r->quantity.'  ';
														}

													?>
												</td>
												<td>{{$details}}</td>
											</tr>
											<tr>
												<td class="text-right">支援日時 :</td>
												<td>{{$inv->created_at}}</td>
											</tr>
											<tr>
												<td class="text-right">支援状況 :</td>
												<!-- <td>{{$diff > 0?'決算予定':'決算済み'}}</td> -->
												<td>決算済み</td>
											</tr>
											<tr>
												<td class="text-right">合計 :</td>
												<td>{{$inv->amount}} 円</td>
											</tr>
										</table>
									</div>
									<?php }?>
								</div>
							</div>

						<?php
							$owner = $p->user;
						?>
						@include('user.layouts.message_modal')
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>





@stop

@section('custom_js')

@stop
