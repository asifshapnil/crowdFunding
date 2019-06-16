<?php
	$categories = App\Models\ProjectCategory::where('status', 1)->get();
?>

<style media="screen">
	.first_tabs{
		background-color: #f1f1f1;
		margin-top: -5px !important;
		padding-top: 15px;
		padding-bottom: 15px;
	}
	.list-padding{
		padding-top: 5px;
	}
	ul.plist{
		padding: 0px !important;
		margin:0px !important;
	}
	ul.plist li{
		margin-top: 6px;
	}
	ul.plist li a{
		color: #707070;
		font-size: 18px;
		text-decoration: none;
		font-weight: bold;
		margin-right: 15px;
	}
	.input_search input[type="text"]{
		border-right: none;
		border-color: #c6c6c6;
		border-radius: 0px;
	}
	.input_search .input-group-append{
		border-top: 1px solid #c6c6c6;
		border-right: 1px solid #c6c6c6;
		border-bottom: 1px solid #c6c6c6;
		background-color: #ffffff;
	}
	.input_search .input-group-append i{
		color: #c6c6c6;
		font-size: 24px;
		margin-top: 4px;
	    margin-right: 6px;
	}
</style>

<section class="first_tabs">
	<div class="container">
		<div class="row">
			<div class="col-md-7 offset-md-1 col-sm-12">
				<ul class="list-inline plist project_category_data">
					<?php
						$project_list_menu = 0;
						if(isset($_GET['c']) && $_GET['c']){
							$project_list_menu = $_GET['c'];
						}
					?>
					<li class="list-inline-item"><a href="{{route('front-project-list')}}" class="{{ ($project_list_menu == 0) ? 'active' : '' }}">ALL</a></li>
					<?php foreach($categories as $c){?>
						<li class="list-inline-item"><a href="{{route('front-project-list')}}?c={{$c->id}}" class="{{ ($project_list_menu == $c->id) ? 'active' : '' }}">{{$c->name}}</a></li>
					<?php }?>
				</ul>
				<select class="project_category_sm_data form-control">
					<option value="{{route('front-project-list')}}" {{ ($project_list_menu == 0) ? 'selected' : '' }}>ALL</option>
					<?php foreach($categories as $c){?>
						<option value="{{route('front-project-list')}}?c={{$c->id}}" {{ ($project_list_menu == $c->id) ? 'selected' : '' }}>{{$c->name}}</option>
					<?php }?>
				</select>
			</div>
			<div class="col-md-3 col-sm-12">
				<form class="form-inline float-right search_form" action="{{route('front-search')}}" method="get">
					<div class="input-group input_search">
						<input type="text" class="form-control" placeholder="{{ __('main.search') }}" aria-describedby="basic-addon2" name="title" value="{{Request::get('title')}}">
						<div class="input-group-append">
							<span class="input-group-text" id="search_control"><i class="fa fa-search"></i></span>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
