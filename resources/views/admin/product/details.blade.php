@extends('admin.layouts.main')

@section('custom_css')
@stop


@section('content')


<div class="container">


<div class="mt20">
	<div class="row">



		<div class="col-md-12">
			
			<div class="row mt20 projects">
				<div class="col-md-3">
					<img class="card-img-top img-fluid" src="{{Request::root()}}/uploads/products/{{$product->image}}" alt="Card image cap">

					
				</div>

				<div class="col-md-9">
					<div class="row add_to_favorite_area">
						

						<?php 
							$returnData = '';

				            if ($product->is_featured==0) {
				                $returnData .= ' <a href="'.route('admin-product-feature-status-change',['id'=>$product->id, 'status'=>1]).'" class="btn btn-xs btn-success">Make Featured</a> ';
				            }
				            else{
				                $returnData .= ' <a href="'.route('admin-product-feature-status-change',['id'=>$product->id, 'status'=>0]).'" class="btn btn-xs btn-danger">Remove Featured</a> ';
				            }

				            if ($product->status==0) {
				                $returnData .= ' <a href="'.route('admin-product-status-change',['id'=>$product->id, 'status'=>1]).'" class="btn btn-xs btn-success">Active</a> '; //last_interest_at = current date time
				                $returnData .= ' <a href="'.route('admin-product-status-change',['id'=>$product->id, 'status'=>4]).'" class="btn btn-xs btn-danger">Reject</a> ';
				            }
				            else if ($product->status==1) {
				                $returnData .= ' <a href="'.route('admin-product-status-change',['id'=>$product->id, 'status'=>3]).'" class="btn btn-xs btn-warning">Hold</a> ';
				                $returnData .= ' <a href="'.route('admin-product-status-change',['id'=>$product->id, 'status'=>4]).'" class="btn btn-xs btn-danger">Reject</a> ';
				            }
				            else if ($product->status==3) {
				                $returnData .= ' <a href="'.route('admin-product-status-change',['id'=>$product->id, 'status'=>1]).'" class="btn btn-xs btn-success">Active</a> ';
				                $returnData .= ' <a href="'.route('admin-product-status-change',['id'=>$product->id, 'status'=>4]).'" class="btn btn-xs btn-danger">Reject</a> ';
				            }
				            else{
				                //
				            }

				            $returnData .= ' <a href="'.route('admin-product-delete', ['id' => $product->id]).'" class="btn btn-xs btn-danger delete-sure">Delete</a>';

				            echo $returnData;
						?>
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
					<img width="100%" src="{{empty($product->image)?'/uploads/img/default.png':Request::root().'/uploads/products/'.$product->image}}">
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
					<img width="100%" src="{{empty($product->company_info_image)?'/uploads/img/default.png':Request::root().'/uploads/products/'.$product->company_info_image}}">
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
					<img width="100%" src="{{empty($product->profile_info_image)?'/uploads/img/default.png':Request::root().'/uploads/products/'.$product->profile_info_image}}">
				</div>
				<div class="col-md-10">
					{!! $product->profile_info !!}
				</div>
			</div>
		</div>

		
	</div>
	
</div>

</div>


@stop

@section('custom_js')
@stop