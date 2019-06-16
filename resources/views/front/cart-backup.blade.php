@extends('front.layouts.main')

@section('custom_css')
	<style type="text/css">

		.cart th{
			border: 1px solid black;
			padding: 5px;
			text-align: center;
		}
		.cart tbody tr{
			border-bottom: 1px solid black;
		}
		.table{
			border: none !important;
		}
		.no-border{
			border: none !important;
		}
	</style>
@stop


@section('ecommerce')
	@include('front.layouts.ecommerce')
@stop

@section('content')
@php
	// dd(Cart::content())
@endphp

<div class="container">


<div class="mt20">
	<div class="row">

		<div class="col-md-3">
			@include('front.layouts.product_menu')
		</div>



		<div class="col-md-9">
			<table class="cart">
				<thead>
					<tr>
						<th>買い物かご</th>
						<th style="width: 15%;">個数</th>
						<th style="width: 15%;">価格</th>
						<!-- <th style="width: 15%;">合計</th> -->
						<th style="width: 15%;">合計</th>
					</tr>
				</thead>
				<tbody class="text-center">

					<?php foreach(Cart::content() as $p) {
						// dd($p);
						$product = App\Models\Product::find($p->id);
						?>

					<tr>

						<td>

							<div class="row">
								<div class="col-md-4">
									<img class="card-img-top img-fluid" src="{{Request::root()}}/uploads/products/{{$product->image}}" alt="Card image cap">
								</div>
								<div class="col-md-8">
									<h5 class="text-info">{{$product->title}}</h5>
									<p>{{$product->description}}</p>
								</div>
							</div>
						</td>
						<td>
							<form class="cart-item" action="{{route('front-cart-update')}}" method="get">
								<input type="hidden" name="row_id" value="{{$p->rowId}}">
								<input type="text" class="qty" name="quantity" value="{{$p->qty}}" style="width: 50px;">個
							</form>
						</td>
						<td>{{$p->price}} P</td>
						<!-- <td>{{$p->qty*$p->price}} P</td> -->
						<td><h5 class="text-danger">{{$p->qty*$p->price}} P</h5></td>

					</tr>

					<?php }?>

					<?php if(Auth::check()){?>
					<tr class="no-border">

						<td colspan="4" class="text-right">あなたの持っているポイント <span class="text-info">{{Auth::user()->point}} P</span></td>

					</tr>

					<?php }?>


					<tr class="no-border">
						<td class="text-right">合計数 </td>
						<td colspan=""><h5>{{Cart::count()}}</h5></td>
						<td>合計ポイント</td>
						<td colspan=""> <h5 class="text-danger">{{Cart::subtotal()}} P</h5></td>


					</tr>


				</tbody>
			</table>


			<div class="text-center mt20">
				<a href="{{route('front-checkout')}}" class="btn btn-warning">ご注文手続きへ</a>
			</div>


		</div>


	</div>

</div>

</div>


@stop

@section('custom_js')
	<script type="text/javascript">
		$('form :input').blur(function() {
			console.log('ok');
		    $(this).closest('form').submit();
		});

	</script>
@stop
