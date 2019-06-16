@extends('front.layouts.main')

@section('custom_css')
<style type="text/css">



	/* tab reordering fix - older browsers may require other prefixed rules */
	/*.nav.nav-tabs {
		width: auto;
	  	display: flex;
	  	flex-direction: row;
	  	flex-wrap: wrap-reverse;
	}*/


</style>
@stop


@section('ecommerce')
	@include('front.layouts.ecommerce')
@stop

@section('content')




	<div class="container padding">
			<div class="row">
				<div class="col-10 offset-md-1">
					<div class=" row mt20">
						<div class="col-md-3">
							@include('front.layouts.product_menu')
						</div>
						<div class="col-md-9">
							<?php
							$productCategories = App\Models\ProductCategory::where('status', 1)->get();
							?>
							<div class="menu-tab">
								<div class="home-tabs row" id="tabSet">
									<div class="nav-item p-1">
										<a class="nav-link {{Request::get('c') == 'p' || Request::get('c') == '' ? 'active' : ''}} popular" href="?c=p" role="tab">総合
											<!-- <div class="divider"></div> -->
										</a>
									</div>
							<h3>人気商品ランキング</h3>
							<div class="">
								<?php foreach($productCategories as $c){?>
									<div class="nav-item p-1 ">
										<a class="nav-link {{Request::get('c') == $c->id ? 'active' : ''}} {{$c->categoryClass()}}" href="?c={{$c->id}}" title="{{$c->name}}">{{str_limit($c->name, 50)}}
											<!-- <div class="divider"></div> -->
										</a>
									</div>
									<?php }?>
								</div>
								<!-- Tab panes -->
								<div class="row mt20 projects">
									<!-- <div class="active" id="popular"> -->
									<?php
									$col = 2;
									foreach($products as $p){?>
										@include('front.layouts.product')
										<?php }?>
										<!-- </div> -->
									</div>
								</div>
							</div>
							<h3 class="mt20">チェックした商品</h3>
							<div class="">
								<div class="row mt20 projects">
									<?php
									$col = 2;
									foreach($recent_products as $p){
										$p = $p->product;?>
										@include('front.layouts.product')
										<?php }?>
									</div>
								</div>
								<h3 class="mt20">おすすめ商品</h3>
								<div class="">
									<div class="row mt20 projects">
										<?php
										$col = 2;
										foreach($featured_products as $p){?>
											@include('front.layouts.product')
											<?php }?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
































@stop

@section('custom_js')
<script type="text/javascript">
	// $('#tabSet').scrollTabs();
	// $("#tabSet").tooManyTabs();
</script>
@stop
