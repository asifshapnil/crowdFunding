@extends('front.layouts.main')

@section('custom_css')
	<style type="text/css">
		.category3{
			background-color: #76C0D4 !important;
    		color: white !important;
		}
	</style>
@stop

@section('content')


<div class="container">

@include('front.layouts.search')

<div class="mt20">
	<div class="row">
		<div class="col-md-10">
			@include('front.layouts.tabs')

			<!-- Tab panes -->
			<div class="card padding mt20">

			<div class="tab-content">
				<div class="tab-pane active" id="popular" role="tabpanel">
					
					<div class="row projects">
						<div class="col-md-12">
							<h2 class="inline"><span class="badge badge-default project-category">{{$project->category->name}}</span>
							<?php if(isset($project->sub_category)){?>
							<span class="btn btn-sm hide project-subcategory">{{$project->sub_category}}</span>
							<?php }?>
							</h2>
							
							<br>
							<h2 class="text-success inline"> {{$project->title}}</h2>
						</div>
					</div>
					<div class="row mt20 projects">
						<div class="col-md-5">
							<img class="card-img-top" style="height:270px;" src="{{Request::root()}}/uploads/projects/{{$project->featured_image}}" alt="Card image cap">
						</div>

						<?php
							$budget = $project->budget;
							$investment = $project->investment()->sum('amount');
							$done = $investment*100/$budget;
							$done = round($done);

						?>

						<div class="col-md-7">
							<div>
								<?php if(isset($project->favourite_count) && $project->favourite_count > 0){?>
								<a href="{{route('user-favourite-remove-project', ['id' => $project->id])}}" class="btn btn-success">お気に入りに追加しました</a>
								<?php }else{?>
								<a href="{{route('user-favourite-add-project', ['id' => $project->id])}}" class="btn btn-danger">お気に入りに登録</a>
								<?php }?>
							</div>
							<div class="text-success mt20">現在の金額</div>
							<div class="text-success mt20"><h4>￥{{$investment}}</h4></div>
							<small>目標金額￥{{$budget}}</small>
							<h4 class="mt20">共感人数</h4>
							<h3 class="text-success">{{$project->investment()->count()}} 名</h3>
							<div class="progress">
								<div class="progress-bar bg-success w-{{$done}}" style="width: {{$done}}%;" role="progressbar" aria-valuenow="{{$done}}" aria-valuemin="0" aria-valuemax="100">
									{{$done}}%
								</div>
							</div>
						</div>
					</div>

					<div class="mt20">
						<div class="col bg-grey">
							<h3>支援情報</h3>
							
						</div>						
					</div>

					<div class="row mt20">
						<div class="col">
							<h4>予算用途の内訳</h4>
							<p>{!! $project->budget_usage_breakdown !!}</p>

							<h4>支援金受取人名</h4>
							<p>{{$project->beneficiary}}</p>
							
							<h4>プロジェクト概要</h4>
							<p>{!! $project->description !!}</p>

							<?php foreach($project->details as $d){?>
							<h4>{{$d->details_title}}</h4>
							<p>{!! $d->details_description !!}</p>
							<?php }?>
						</div>
						<div class="col">
							<?php $rewards = [];?>
							<a target="_blank" href="{{route('front-profile', ['id' => $project->user_id])}}" class="btn btn-block btn-secondary">起案者プロフィール</a>
							<button class="btn btn-block bg-blue text-white">支援する</button>
							<?php foreach($project->reward as $r){
								$rewardText = "";
								$rewardImage = "";
								?>
								<a href="{{route('user-invest', ['id' => $project->id, 'reward' => $r->id])}}" class="btn btn-block btn-info">
								<?php if($r->is_crofun_point){?>
									<div>￥{{$r->amount}}（クロファンポイント{{$r->crofun_amount}}Ｐ）</div>
								<?php }if($r->is_other){
									$rewardText = $r->other_description;
									?>
									{{$r->other_description}}
								<?php }?>
								</a>
								<?php if(!empty($r->other_file)){
									$rewardImage = $r->other_file;
								}
								$rewards[] = ['text' => $rewardText, 'image' => $rewardImage];
							}?>


							<?php foreach($rewards as $r){
								if(!empty($r['text'])){?>
								<h3 class="mt20">{{$r['text']}}</h3>
								<?php }if(!empty($r['image'])){?>
								<div style="margin-top: 5px; margin-bottom: 5px;"><img src="{{Request::root().'/uploads/projects/'.$r['image']}}" class="img img-fluid"></div>

							<?php }}?>
						</div>						
					</div>
					
				</div>
				
				
			</div>

			</div>
		</div>




		<!-- Button trigger modal -->



		<div class="col-md-2 mt50">
			@include('front.layouts.right_menu')
		</div>
	</div>
	
</div>

</div>







@stop

@section('custom_js')
@stop