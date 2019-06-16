@extends('front.layouts.main')

@section('custom_css')
@stop


@section('ecommerce')
	@include('front.layouts.ecommerce')
@stop

@section('content')


<div class="container">


<div class="mt20">
	<div class="row">

		<div class="col-md-3">
			@include('front.layouts.product_menu')
		</div>



		<div class="col-md-9">

			<div class="row mt20 projects">
				<div class="col-md-3">
					<img class="card-img-top img-fluid" src="{{Request::root()}}/uploads/products/{{$product->image}}" alt="Card image cap">


				</div>

				<div class="col-md-9">
					<div class="cart_add_area">
						<form action="{{route('front-cart-add')}}" method="get">
						<div class="row">


							<?php
							if($product->color->count() > 0)
							{
							?>
							<div class="col">
								<select class="form-control">
									<option value="0">色</option>
									<?php foreach($product->color as $c){?>
										<option value="{{$c->id}}">{{$c->color}}</option>
									<?php }?>
								</select>
							</div>
							<?php }?>


							<div class="col add_to_cart_quantity_area">
								<!-- <p>数量</p> -->
								<input type="hidden" name="id" value="{{$product->id}}">

								<input type="hidden" name="price" value="{{$product->price}}">

								<input type="hidden" name="title" value="{{$product->title}}">



								<input type="text" name="quantity" class="add_to_cart_quantity form-control" required placeholder="数量">
							</div>

							<div class="col">
								<button type="submit" class="btn btn-warning add_to_cart_btn btn-block">カゴに入れる</button>
							</div>
						</div>
						</form>
					</div>
					<div class="row add_to_favorite_area">


						<?php if(isset($product->favourite_count) && $product->favourite_count > 0){?>
							<a href="{{route('user-favourite-remove-product', ['id' => $product->id])}}" class="btn btn-block btn-success"><i class="fa fa-heart" aria-hidden="true"></i> お気に入りに追加しました</a>
							<?php }else{?>
							<a href="{{route('user-favourite-add-product', ['id' => $product->id])}}" class="btn btn-info btn-block add_to_favorite_btn"><i class="fa fa-heart" aria-hidden="true"></i> お気に入りに追加する</a>
						<?php }?>
					</div>
				</div>


			</div>

			<div class="row mt20" style="border-bottom: 1px solid grey; padding-bottom: 10px;">
					<div class="col-md-4">
						<span class=" inline"> {{$product->title}}</span>
					</div>
					<div class="col-md-4">
						<span class=" inline"> {{$product->description}}</span>
					</div>
					<div class="col-md-4">
						<span class=" inline">価格（税込）￥{{$product->price}}</span>
					</div>


			</div>



			<div class="row mt20">
				<div class="col-md-12">
					<h4 class="section_head_title">【商品説明文】</h4>
				</div>
				<div class="col-md-2">

					<img width="100%" src="{{$product->image ?  asset('uploads/products/'.$product->image) : asset('uploads/projects/1615154785167836.jpeg')}}">
				</div>
				<div class="col-md-10">
					{!! $product->explanation !!}
				</div>
			</div>

			<div class="row mt20">
				<div class="col-md-12">
					<h4 class="section_head_title">【企業名】</h4>
				</div>
				<div class="col-md-12">
					{!! $product->company_name !!}
				</div>
			</div>

			<div class="row mt20">
				<div class="col-md-12">
					<h4 class="section_head_title">【企業情報】</h4>
				</div>
				<div class="col-md-2">
					<img width="100%" src="{{$product->company_info_image ? asset('uploads/products/'.$product->company_info_image) : asset('uploads/projects/1615154785167836.jpeg')}}">
				</div>
				<div class="col-md-10">
					{!! $product->company_info !!}
				</div>
			</div>

			<div class="row mt20">
				<div class="col-md-12">
					<h4 class="section_head_title">【プロフィール情報】</h4>
				</div>
				<div class="col-md-2">
					<img width="100%" src="{{$product->profile_info_image ? asset('uploads/products/'.$product->profile_info_image) : asset('uploads/projects/1615154785167836.jpeg')}}">
				</div>
				<div class="col-md-10">
					{!! $product->profile_info !!}
				</div>
			</div>

			<div class="cart_add_area mt20">
				<form action="{{route('front-cart-add')}}" method="get">
				<div class="row">

					<?php
					if($product->color->count() > 0)
					{

					?>
					<div class="col">
						<select class="form-control">
							<option value="0">色</option>
							<?php foreach($product->color as $c){?>
								<option value="{{$c->id}}">{{$c->color}}</option>
							<?php }?>
						</select>
					</div>
					<?php }?>

					<div class="col add_to_cart_quantity_area">
						<!-- <p>数量</p> -->
						<input type="hidden" name="id" value="{{$product->id}}">

						<input type="hidden" name="price" value="{{$product->price}}">

						<input type="hidden" name="title" value="{{$product->title}}">



						<input type="text" name="quantity" class="add_to_cart_quantity form-control" required placeholder="数量">
					</div>

					<div class="col">
						<button type="submit" class="btn btn-warning add_to_cart_btn btn-block">カゴに入れる</button>
					</div>
				</div>
				</form>
			</div>
		</div>


	</div>

</div>

</div>


@stop

@section('custom_js')
@stop
