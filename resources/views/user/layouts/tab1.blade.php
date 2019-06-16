<style media="screen">
	.search{
		padding-top: 10px;
	}
</style>
<section class="first_tabs">
	<div class="row">
		<div class="container">
			<div class="row justify-content-center">
			<div class="col-9">
				<ul class="list-inline">

					<li class=" p-2 list-inline-item {{Route::currentRouteName()=='user-project-list'?'active':''}}">
						<a href="{{route('user-project-list')}}" class="item">TOP  ></a>
					</li>
					<li class=" p-2 list-inline-item  {{Route::currentRouteName()=='user-invest-list'?'active':''}}">
						<a href="{{route('user-invest-list')}}" class="item">プロジェクト一覧 ></a>
					</li>
					<li class=" p-2 list-inline-item {{Route::currentRouteName()=='user-purchase-list'?'active':''}}">
						<a href="{{route('user-purchase-list')}}" class="item">ものづくり＞</a>
					</li>
					<li class=" p-2 list-inline-item {{Route::currentRouteName()=='user-product-list'?'active':''}}">
						<a href="{{route('user-product-list')}}" class="item">プロジェクト名</a>
					</li>
					<li class="pull-right search list-inline-item {{Route::currentRouteName()=='user-product-list'?'active':''}}">
						@include('front.layouts.search')
					</li>
				</ul>

			</div>
		</div>
	</div>
</div>
</section>
