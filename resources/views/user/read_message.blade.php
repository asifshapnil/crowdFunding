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
						<div class="card padding">
							<?php if(count($messages) == 0){?>
								メッセージはありません
							<?php }else{
								foreach($messages as $m){
									$message_modal_id = 'message'.$m->id;
							?>
							<div class="card padding mt20">
								<div class="row">
									<div class="col-sm-2">From:</div>
									<div class="col-sm-6">{{$m->from->first_name.' '.$m->from->last_name}}</div>
									<div class="col-sm-4">
										<small>{{date('F j, Y', strtotime($m->created_at))}} at {{date('H:i:s', strtotime($m->created_at))}}</small>
										<a href="!#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#{{isset($message_modal_id)?$message_modal_id:'message'}}">メッセージを返信</a>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-2">Subject:</div>
									<div class="col-sm-10">{{$m->subject}}</div>
								</div>
								<div class="row">
									<div class="col-sm-2">Message:</div>
									<div class="col-sm-10">{{$m->message}}</div>
								</div>
							</div>
							<?php $owner = $m->from; ?>
							@include('user.layouts.message_modal')
							<?php }} ?>
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
