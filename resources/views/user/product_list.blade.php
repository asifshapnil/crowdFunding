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
	</style>
@stop


@section('ecommerce')

@stop

@section('content')

@include('user.layouts.tab')

<div class="container">
	<div class="row">
		<div class="col-10 offset-1">
			<div class="mt20">
				<div class="row">
					<div class="col-md-3">
						@include('user.layouts.profile')
					</div>
					<div class="col-md-9">


						<?php foreach($products as $p){?>

						<div class="card mt20 padding">

							<div class="row projects">
								<div class="col-md-12">
									<h2 class="inline">
										<span class="badge badge-default category3">{{$p->subCategory->category->name}}</span>
										<span class="badge badge-primary category3">{{$p->subCategory->name}}</span>
									</h2>
									<span class="pull-right">{{date('F, d Y', strtotime($p->created_at))}}</span>
									<br>
									<h2 class="text-info inline">
										{{$p->title}}
									</h2>
									<br>
									<h5 class="text-info inline">
										{{$p->description}}
									</h5>
								</div>
							</div>
							<div class="row mt20 projects">
								<div class="col-sm-4">
									<img class="card-img-top img-fluid" src="{{Request::root()}}/uploads/products/{{$p->image}}" alt="Card image cap">
								</div>
								<div class="col">
									<div>
										<button class="btn btn-danger btn-block">募集中</button>
									</div>
									<div class="mt20">
										<a href="{{route('user-product-edit', ['id' => $p->id])}}" class="btn btn-warning btn-block">編集</a>
									</div>

									<?php
										$total = $p->color()->sum('stock');
										$sell = $p->orderDetails()->sum('qty');
										if($total <= 0) $done = 0;
										else $done = $sell*100/$total;
									?>

									<div class="progress mt20">
										<div class="progress-bar bg-success" style="width: {{$done}}%;" role="progressbar" aria-valuenow="{{$done}}" aria-valuemin="0" aria-valuemax="100">
											{{$done}}%
										</div>
									</div>

									<div class="mt20 text-right text-danger">
										<h3>{{$p->price}} P</h3>
									</div>

								</div>
							</div>

							<div class="row mt20">

								<?php
									$doneCount = $p->orderDetails()->where('status', 2)->with('order')->distinct('orders.user_id')->count();
									$doneTotal = $p->orderDetails()->where('status', 2)->sum('total_point');
									$activeCount = $p->orderDetails()->where('status', 1)->with('order')->distinct('orders.user_id')->count();
									$activeTotal = $p->orderDetails()->where('status', 1)->sum('total_point');
									$pendingCount = $p->orderDetails()->where('status', 0)->with('order')->distinct('orders.user_id')->count();
									$pendingTotal = $p->orderDetails()->where('status', 0)->sum('total_point');
								?>

								<div class="col">
									<table class="table text-center table-striped">
										<thead>
											<tr>
												<th class="text-center">完了</th>
												<th class="text-center">発送中</th>
												<th class="text-center">準備中</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="text-left">
													<b>購入人数: </b> <span class="pull-right">{{$doneCount}}名</span><br>
													<b>状況: </b> <span class="pull-right">郵送済み</span><br>
													<b>合計: </b> <span class="pull-right">{{$doneTotal}}P</span>
												</td>
												<td class="text-left">
													<b>購入人数: </b> <span class="pull-right">{{$activeCount}}名</span><br>
													<b>状況: </b> <span class="pull-right">発送済み</span><br>
													<b>合計: </b> <span class="pull-right">{{$activeTotal}}P</span>
												</td>
												<td class="text-left">
													<b>購入人数: </b> <span class="pull-right">{{$pendingCount}}名</span><br>
													<b>状況: </b> <span class="pull-right">準備中</span><br>
													<b>合計: </b> <span class="pull-right">{{$pendingTotal}}P</span>
												</td>


											</tr>
										</tbody>
									</table>
								</div>
							</div>

							</div>

						<?php }?>

						<div class="form-group text-center mt20">
							<a href="{{route('user-product-pre-add')}}" class="btn btn-info">新規商品登録</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>


@stop

@section('custom_js')

@stop
