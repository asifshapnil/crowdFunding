<?php
	$budget = $p->budget;
	$investment = $p->investment()->sum('amount');
	$done = $investment*100/$budget;
	$done = round($done);
	// print(strtotime($p->end) < strtotime(date('Y-m-d H:i:s')));
?>

<div class="project_item" style="height: 365px;position: relative;">
	<a href="{{route('front-project-details', ['id' => $p->id])}}">
		<div  class="project_img" style="height:200px; width:auto; background-color:#fff; background-image: url({{url('uploads/projects/'.$p->featured_image)}});background-repeat: no-repeat;
			background-position: center center; background-size: contain;">

			<div class="project_status {{strtotime($p->end) < strtotime(date('Y-m-d H:i:s')) ? 'status_3' : ($done >= 100?'status_2':'status_1')}}"><span>{{strtotime($p->end) < strtotime(date('Y-m-d H:i:s')) ? '終了' : ($done >= 100?'達成':'募集中')}}</span></div>
		</div>
	</a>


	<div class="project_text">
		<ul class="project_tags list-inline project_category_items">
			<li class="list-inline-item">
				<i class="fa fa-tag"></i> <a href="?c={{ $p->category->id }} " class="category">{{$p->category->name}}</a>

			</li>
		</ul>




		<h2 class="project_title"><a title="{{$p->title}}" class="title" href="{{route('front-project-details', ['id' => $p->id])}}">{{str_limit($p->title, 35)}}</a></h2>

		<div class="row project_progress">
			<div class="col-10">
				<div class="progress project_progress">
					<div class="progress-bar bg-primary w-{{ $done }}" style="width:{{ $done }}%;" role="progressbar" aria-valuenow="{{ $done }}" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
			<div class="col-2"><p>{{ $done }}%</p></div>
		</div>
		<div class="row project_item_footer">
			<div class="col-7">
				<p>現在 {{ number_format($investment) }} 円</p>
			</div>
			<div class="col-5">
				<p class="text-right">応援者 {{$p->investment()->count()}} 人</p>
			</div>
		</div>
	</div>
</div>
