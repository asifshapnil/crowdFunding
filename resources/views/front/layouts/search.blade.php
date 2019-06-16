<form class="form-inline" action="{{route('front-search')}}" method="get">
	<div class="input-group input_search">
		<input type="text" class="form-control search" placeholder="{{ __('main.search') }}" aria-describedby="basic-addon2" name="title" value="{{Request::get('title')}}">
		<div class="input-group-append" style="background:white;">
			<span class="input-group-text" id="search_control"><i class="fa fa-search"></i></span>
		</div>
	</div>
</form>
