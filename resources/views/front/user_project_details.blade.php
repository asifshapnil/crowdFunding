@extends('front.layouts.main')

@section('custom_css')
	<script type="text/javascript">
		.mar_top_15{
			margin-top : 15px !important;
		}
	</script>
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
				<a href="#" class="list-group-item text-center"><h3>支援情報</h3>	</a>
				<a href="#" class="list-group-item text-center"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p></a>
			</div>
		</div>



		<div class="col-md-9">


			<ul class="nav nav-tabs home-tabs" role="tablist">
				<li class="nav-item ">
					<a class="nav-link active" data-toggle="tab" href="#popular" role="tab">総合
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
					<a class="nav-link" data-toggle="tab" href="#category3" role="tab" style="background-color: #636c72 !important;color: #ffffff !important; ">本
						<div class="divider"></div>
					</a>
				</li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="popular" role="tabpanel">
					
					<div class="row projects">
						<div class="col-md-12">
							<h2 class="inline"><span class="badge badge-default category3">社会貢献</span></h2>
							<h2 class="text-success inline"> カンボジアの子供たちに服を届けたい！</h2>
						</div>
					</div>
					<div class="row mt20 projects">
						<div class="col">
							<img class="card-img-top img-fluid" src="{{Request::root()}}/assets/front/img/project.jpg" alt="Card image cap">
						</div>
						<div class="col">
							<div>
								<h5 class="text-right">購入日：2017/1/1</h5>
							</div>
							<div><button class="btn btn-danger">お気に入りに登録</button></div>
							<div><button class="btn btn-warning" style="margin-top: 15px;">お気に入りに登録</button></div>
							
							<h3 class="text-success">9 名</h3>
							<div class="progress">
								<div class="progress-bar bg-success w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
									75%
								</div>
							</div>
						</div>
					</div>

					<nav class="nav nav-pills nav-fill" style="margin-top: 15px;">
					  <a class="nav-item nav-link" href="#" style="border: 1px solid;border-radius: 0px;">Link</a>
					  <a class="nav-item nav-link" href="#" style="border: 1px solid;border-radius: 0px;">Link</a>
					  <a class="nav-item nav-link disabled" href="#" style="border: 1px solid;border-radius: 0px;">Disabled</a>
					</nav>

					<div class="row mt20">
						<div class="col-4">
							<h3>支援情報</h3>	
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit,
							</p>						
						</div>	
						<div class="col-4">
							<h3>支援情報</h3>	
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit,
							</p>						
						</div>	
						<div class="col-4">
							<h3>支援情報</h3>	
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit,
							</p>						
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