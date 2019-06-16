@extends('user.layouts.main')

@section('custom_css')
	<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 20%;
		}
		.amount{
			border: 1px solid black !important;
			padding: 5px;
		}
		.no-border{
			border: none;
		}
		.box{
			border: 1px solid black !important;
		}
		.padding{
			padding: 10px;
		}
	</style>
@stop


@section('ecommerce')
	
@stop

@section('content')


<div class="container">


<div class="mt20">
	<div class="row">
		<div class="col-md-3">
			@include('user.layouts.profile')
		</div>
		<div class="col-md-9">
			
			<div class="card text-center">
			  <div class="card-block">
			    <p>
			    	プロジェクト申請についての説明文
			    </p>
			  </div>
			</div>
			
			<div class="card text-center mt20">
			  <div class="card-block">
			    <p>
			    	【プロジェクトの手順】 <br>
						1 申請・審査 <br>
						2 プロジェクトページ作成 <br>
						3 開始・広報活動 <br>
						4 終了・実行 <br>
						5 活動報告・リターン
			    </p>
			  </div>
			</div>

			
			<div class="form-group text-center mt20">
				<a href="{{route('user-project-add')}}" class="btn btn-info">プロジェクト入力画面へ</a>
			</div>
		</div>
	</div>
	
</div>

</div>


@stop

@section('custom_js')

@stop