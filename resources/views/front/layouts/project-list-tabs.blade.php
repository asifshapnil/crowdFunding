<?php
	$categories = App\Models\ProjectCategory::where('status', 1)->get();
?>

<style media="screen">
	li a{
		color: #000;
		padding: 10px;
	}
	li a:hover{
		border-bottom: 2px solid #14a0fe;
		text-decoration: none;
	}
	.first_tabs{
		background-color: #f1f1f1;
		margin-top: -5px !important;
	}
	.list-padding{
		padding-top: 5px;
	}
	ul{
		width: 100% !important;
		padding: 0px !important;
		margin:0px !important;
	}
</style>

<section class="first_tabs" >
	{{-- <div class="row p-3"> --}}
		{{-- <div class="container"> --}}
			<div class="row justify-content-center">
			<div class="col-md-12">
				<ul class="list-inline p-2">

					<li class="list-inline-item list-padding"><a href="#" class="active">ALL</a></li>

					<li class="list-inline-item list-padding  {{Route::currentRouteName()=='user-invest-list'?'active':''}}">
						<?php foreach($categories as $c){?>
							<li class="list-inline-item"><a href="{{route('front-project-list')}}?c={{$c->id}}">{{$c->name}}</a></li>
							<?php }?>
					</li>

					<li class="pull-right pb-2  list-inline-item {{Route::currentRouteName()=='user-product-list'?'active':''}}">
						@include('front.layouts.search')
					</li>
				</ul>

			</div>
		</div>
	{{-- </div> --}}
{{-- </div> --}}
</section>
