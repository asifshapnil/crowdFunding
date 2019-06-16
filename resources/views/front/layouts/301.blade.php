<div class="row bg-dark">
	<div class="container">
		<div class="row justify-content-center">
			<div class=" col-10">
				<div class="mt-5">
					<div class="row">
						<div class="col-md-12">
							<div class="row inner">
								<div class="col-md-8  mb-5 ">
									<div class="content-inner mb-3">
										<div class="bg-white p-2">
											<h4 class="pb-2 font-weight-bold">商品詳細</h4>
											<p>{{ $product->description }}</p>

										</div>
									</div>

									<div class="content-inner mb-3 ">
										<div class="bg-white p-2">
											<h4 class="pb-2 font-weight-bold">企業情報</h4>
											<div class="row mb-4">
												<img src="{{$product->company_info_image ? Request::root().'/uploads/products/'.$product->company_info_image : asset('uploads/projects/1615154785167836.jpeg')}}" alt="" class="col-md-4" width="157px" height="157px;">
												<div class="col-md-8">
													<h5>{{ $product->company_name }}</h5>
													<p>
														{{ $product->company_info }}
													</p>
													<span class="col-md-12 p-0">
														@if (Auth::check())
															<button class=" text-white btn btn-md mt-4 font-weight-bold msg_send_btn bg-yellow"  data-user_id="{{ $product->user->id }}" data-product_company_name="{{ $product->company_name ?  $product->company_name : $product->user->first_name.' '.$product->user->last_name}}" data-project_username="{{ $product->user->first_name.' '.$product->user->last_name }}" style="cursor:pointer; color:#fff;"> <span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span> メッセージを送る</button>
														@else
															<a class=" text-white btn btn-md mt-4 font-weight-bold bg-dark bg-yellow" href="{{ route('front-product-details-login', $product->id) }}"   style="cursor:pointer; color:#fff;"> <span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span> メッセージを送る</a>
														@endif
													</span>
													{{-- <button type="button" class="btn btn-md mt-4 text-white font-weight-bold" name="button" style="background-color:#ffbc00 !important;"; > <span class="fa fa-envelope" style="color:#fff;"></span> メッセージを送る</button> --}}
												</div>
											</div>

										</div>
									</div>
							</div>
							<div class="col-md-4">
								@foreach ($any_two as $product)

								<div class="content-inner mb-3">
									<div class="bg-white p-2">
										<div class=row>
											<div class="px-4 mb-2 col-md-12">
												<h4 class="fornt-weight-bold p-0">{{ $product->title }}</h4>
												{{-- <span>リターン名がここに入りますす</span> --}}

											</div>
											<div class="px-4 mb-2 col-md-12">
												<img src="{{$product->image ? Request::root().'/uploads/products/'.$product->image : asset('uploads/products/1615154785167836.jpeg')}}" alt="" class="" width="100%" height="200px">

											</div>
											<div class="px-4 mb-2 col-md-12" style="font-size:15px;">
												<h4>{{ $product->price }} ポイント</h4>
												CrofunポイントとはCrofunに登録されて いる様々な商品と交換できるポイントです。
											</div>
											<div class="px-4 mb-2 mt-1 col-md-12">
												<form action="{{route('front-cart-add')}}" method="get">
													<input type="hidden" name="id" value="{{$product->id}}">
													<input type="hidden" name="price" value="{{$product->price}}">
													<input type="hidden" name="title" value="{{$product->title}}">
													<input type="hidden" name="quantity" class="add_to_cart_quantity form-control" value="1" required placeholder="数量">
													<button type="submit" class="px-3 text-white btn btn-lg btn-block  font-weight-bold" style="background-color:#ffbc00 !important; height:80%;"> <span class="fa fa-shopping-cart px-1"></span> カートに入れる</button>
													{{-- <div class=" div-radius1 m-0 p-0" style="height:50px"> --}}
													{{-- </div> --}}
												</form>
											</div>

										</div>
									</div>
								</div>
							@endforeach
							</div>

							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
