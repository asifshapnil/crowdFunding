@extends('admin.layouts.main')

@section('custom_css')
@stop

@section('content')
	<div class="row mb-3">
		<div class="col-md-4">
			<div class="card text-center text-white bg-dark">
			  <div class="card-header"> ユーザ一覧</div>
			  <div class="card-body">
			    <h4 class="card-title">{{$total_user}}</h4>
			    <a href="{{route('admin-user-list')}}" class="btn btn-primary">View</a>
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card text-center text-white bg-dark">
			  <div class="card-header">プロジェクト一覧</div>
			  <div class="card-body">
			    <h4 class="card-title">{{$total_project}}</h4>
			    <a href="{{route('admin-project-list')}}" class="btn btn-primary">View</a>
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card text-center text-white bg-dark">
			  <div class="card-header">申請中プロジェクト</div>
			  <div class="card-body">
			    <h4 class="card-title">{{$total_pending_project}}</h4>
			    <a href="{{route('admin-project-list',['status'=>0])}}" class="btn btn-primary">View</a>
			  </div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="card text-center text-white bg-dark">
			  <div class="card-header">カタログ一覧</div>
			  <div class="card-body">
			    <h4 class="card-title">{{$total_product}}</h4>
			    <a href="{{route('admin-product-list')}}" class="btn btn-primary">View</a>
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card text-center text-white bg-dark">
			  <div class="card-header">申請中商品</div>
			  <div class="card-body">
			    <h4 class="card-title">{{$total_pending_product}}</h4>
			    <a href="{{route('admin-product-list',['status'=>0])}}" class="btn btn-primary">View</a>
			  </div>
			</div>
		</div>
	</div>
@stop

@section('custom_js')
@stop