<?php
	$categories = App\Models\ProjectCategory::where('status', 1)->get();
?>

<div class="row">
	<div class="container">
		<div class="col-md-10 col-12 offset-md-1">
			<ul class="list-inline project_category_data pt-4">
				{{-- <li class="list-inline-item">>Top ></a></li> --}}
				<li class="list-inline-item">TOP > カタログ一覧 > {{ $product->subCategory->category->name }} > {{ $product->title }}</a></li>


			</ul>


		</div>
	</div>
</div>
