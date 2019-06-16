<form class="form-inline" action="{{route('front-product-list')}}" method="get">
	<div class="input-group input_search">
		<input type="text" class="form-control search" placeholder="商品を探す" aria-describedby="basic-addon2" name="title" value="{{Request::get('title')}}">
		<div class="input-group-append" style="background:white;">
			<span class="input-group-text" id="search_control"><i class="fa fa-search"></i></span>
		</div>
	</div>
</form>
