@extends('admin.layouts.main')

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

<div class="mt20">
	<div class="row">
		<div class="col-md-10">

			<!-- Tab panes -->
			<div class="card padding mt20">
				<div class="card-body">
					
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

							<?php 
								$returnData = '';
					            if ($project->status==0) {
					                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$project->id, 'status'=>1]).'" class="btn btn-xs btn-success inline">Active</a> '; //last_interest_at = current date time
					                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$project->id, 'status'=>4]).'" class="btn btn-xs btn-danger inline">Reject</a> ';
					            }
					            else if ($project->status==1) {
					                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$project->id, 'status'=>3]).'" class="btn btn-xs btn-warning inline">Hold</a> ';
					                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$project->id, 'status'=>4]).'" class="btn btn-xs btn-danger inline">Reject</a> ';
					            }
					            else if ($project->status==3) {
					                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$project->id, 'status'=>1]).'" class="btn btn-xs btn-success inline">Active</a> ';
					                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$project->id, 'status'=>4]).'" class="btn btn-xs btn-danger inline">Reject</a> ';
					            }
					            else{
					                //
					            }

					            $returnData .= '<a href="'.route('admin-project-delete', ['id' => $project->id]).'" class="btn btn-xs btn-danger delete-sure">Delete</a> ';

					            echo $returnData;
							?>


							<?php $rewards = []; ?>

							<?php foreach($rewards as $r){
								if(!empty($r['text'])){?>
								<h3 class="mt20">{{$r['text']}}</h3>
								<?php }if(!empty($r['image'])){?>
								<div style="margin-top: 5px; margin-bottom: 5px;"><img src="{{Request::root().'/uploads/projects/'.$r['image']}}" class="img img-fluid"></div>

							<?php }} ?>
						</div>						
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