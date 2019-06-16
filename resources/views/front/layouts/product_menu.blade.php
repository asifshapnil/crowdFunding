<style>
	ul.product_list_link{
		padding:0px;
		margin:0px;
	}
	ul.product_list_link li{
		list-style:none;
		padding:10px;
		border-bottom: 1px solid #ccc;
		color: #333;
		font-weight: 100;
		position: relative;
	}
	ul.product_list_link li a{
		display: block;
	}
	ul.product_list_link li:first-child{
		border-top: 1px solid #ccc;
	}
	ul.product_list_link li i.angle{
		position: absolute;
		right: 0px;
		font-size: 20px;
	}
</style>

<form action="">
<div class="input-group input_search">
	<input type="text" class="form-control" placeholder="商品を探す" aria-describedby="basic-addon2" name="title" value="">
	<div class="input-group-append">
		<span class="input-group-text" id="search_control"><i class="fa fa-search"></i></span>
	</div>
</div>
</form>

<p style="margin-top:20px;">

<span class="fa-stack" style="font-size:14px;">
	<i class="fa fa-circle fa-stack-2x" style="color:dimgrey;" aria-hidden="true"></i>
	<i class="fa fa-tag fa-rotate-180 fa-flip-vertical fa-stack-1x text-white" aria-hidden="true"></i>
</span>

<strong>カテゴリーから探す</strong>

</p>

<?php
$productCategory = App\Models\ProductCategory::where('status', 1)->with('subCategory')->get();
?>
<!-- <h3>カテゴリー</h3> -->
<ul class="product_list_link">
	<?php foreach($productCategory as $pc){?>
	<li>
		<a style="color: black; font-size:15px;" href="{{route('front-product-list', ['c' => $pc->id])}}">
			{{$pc->name}}
			<i class="fa fa-angle-right angle" aria-hidden="true"></i>
		</a>
	</li>
	<?php }?>

</ul>

{{-- <form action="{{route('front-search')}}" method="get">

<ul class="list-unstyled price_area">
	<li><label><input type="radio" name="min_point" value="1000"> 1000 ポイント獲得</label></li>
	<li><label><input type="radio" name="min_point" value="2000"> 2000 ポイント獲得</label></li>
</ul>

<div class="form-inline mt20">
    <div class="input-group">
		<input type="text" class="form-control" placeholder="{{ __('main.search') }}" aria-describedby="basic-addon2" name="title">
		<button type="submit" class="input-group-addon" id="basic-addon2"><i class="fa fa-search"></i></button>
	</div>
</div>

</form>

<p class="mt20">
	<a href="{{route('user-video')}}">
	無料でポイント獲得
	したい方は
	こちらをクリック！
	</a>
</p> --}}