@extends('front.layouts.main')

@section('custom_css')
@stop


@section('ecommerce')
	<li class="nav-item border middle">
		<a class="nav-link" href="#">
			買い物かご
		</a>
	</li>
	<li class="nav-item border middle">
		<a class="nav-link" href="#">
			お気に入り
		</a>
	</li>
	<li class="nav-item border middle">
		<a class="nav-link" href="#">
			履歴
		</a>
	</li>
@stop

@section('content')


<div class="container">


<div class="mt20">
	<div class="row">

		<div class="col-md-3">
			<div class="list-group text-center">
				<a href="#" class="list-group-item">
					<img src="http://via.placeholder.com/300x300" alt="..." class="img-thumbnail">
				</a>
				<a href="#" class="list-group-item text-center"><h3>支援情報</h3></a>
				<a href="#" class="list-group-item text-center"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p></a>
			</div>
		</div>



		<div class="col-md-9">


			<h3>人気商品ランキング</h3>
			<div class="row">
				

				<div class="col">
					<ul class="nav nav-tabs home-tabs" role="tablist">
						<li class="nav-item ">
							<a style="background-color: #636c72 !important;color: #ffffff !important; " class="nav-link active" data-toggle="tab" href="#popular" role="tab">総合
								<div class="divider"></div>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#category1" role="tab">食品
								<div class="divider"></div>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#category2" role="tab">サービス
								<div class="divider"></div>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#category3" role="tab">本
								<div class="divider"></div>
							</a>
						</li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="popular" role="tabpanel">
							
							<div class="row mt20 projects">
								<?php for($i=0; $i<4; $i++){?>
									@include('front.layouts.user_projects')
								<?php }?>
							</div>
							<div class="row mt20 projects">
								<?php for($i=0; $i<4; $i++){?>
									@include('front.layouts.user_projects')
								<?php }?>
							</div>
						</div>
						<div class="tab-pane" id="category1" role="tabpanel">
							<div class="row mt20 projects">
								<?php for($i=0; $i<4; $i++){?>
									@include('front.layouts.user_projects')
								<?php }?>
							</div>
							<div class="row mt20 projects">
								<?php for($i=0; $i<4; $i++){?>
									@include('front.layouts.user_projects')
								<?php }?>
							</div>
						</div>
						<div class="tab-pane" id="category2" role="tabpanel">
							<div class="row mt20 projects">
								<?php for($i=0; $i<4; $i++){?>
									@include('front.layouts.user_projects')
								<?php }?>
							</div>
							<div class="row mt20 projects">
								<?php for($i=0; $i<4; $i++){?>
									@include('front.layouts.user_projects')
								<?php }?>
							</div>
						</div>
						<div class="tab-pane" id="category3" role="tabpanel">
							<div class="row mt20 projects">
								<?php for($i=0; $i<4; $i++){?>
									@include('front.layouts.user_projects')
								<?php }?>
							</div>
							<div class="row mt20 projects">
								<?php for($i=0; $i<4; $i++){?>
									@include('front.layouts.user_projects')
								<?php }?>
							</div>
						</div>
						<div class="tab-pane" id="category4" role="tabpanel">
							<div class="row mt20 projects">
								<?php for($i=0; $i<4; $i++){?>
									@include('front.layouts.user_projects')
								<?php }?>
							</div>
							<div class="row mt20 projects">
								<?php for($i=0; $i<4; $i++){?>
									@include('front.layouts.user_projects')
								<?php }?>
							</div>
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