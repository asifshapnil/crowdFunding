@extends('user.layouts.main')

@section('custom_css')
	<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 20%;
		}
		.body{

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
		.heading:after{
			display: block;
			height: 3px;
			background-color: #80b9f2;
			content: "";
			width: 100%;
			margin: 0 auto;
			margin-top: 10px;
			margin-bottom: 30px;
		}
		.bg-dark{
			background-color: #f8f8f8;
		}
		.div-radius{
			border: 3px solid #eaebed;
			border-radius: 5px;
		}
		.div-radius1{
			/* border: 3px solid #eaebed; */
			border-radius: 5px;
		}
		.horizontal:before{
			display: block;
			height: 2px;
			background-color: #72c7ff;
			content: "";
			width: 90%;
			margin-top: 10px;
			margin-bottom: 25px;
      margin-left: 15px;;


		}
		.bg-danger{
			/* opacity: 0.9 !important; */
			background-color: #ffe3da !important;
		}

	.project_status {
    position: absolute;
    top: 15px;
    left: 3px;
    width: auto;
    padding: 5px;
    padding-left: 15px;
    padding-right: 15px;
    text-align: center;
		background-color: #ff6540;
	}
	.project-item{
		position: relative;
	}
	.icon-info{
		border: 2px solid #ff3300;
		padding-right: 10px;
		padding-left: 10px;
		padding-top: 1px;
		padding-bottom: 1px;
		border-radius: 50%;
		color: #ff3300;
		background-color: #ffffff;


	}
	.bg-white{
		background-color:#fff;
	}
	.content-inner:before{
		display: block;
		height: 2px;
		background-color: #ffbc00;
		content: "";
		width: 100%;
		margin: 0 auto;
		margin-top: 0px;
		margin-bottom: 0px;
	}

.content-inner-arrow{
	-webkit-clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);
	clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);

}
.checked{
	color: #ffbc00;
}
.bg-sky{
  background-color: #e5f5ff;
}
/* .content-inner-arrow:after{
	-webkit-clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);
	clip-path: polygon(0 0, 100% 0, 100% 82%, 51% 100%, 0 82%);
	display: block;
	height: 2px;
	background-color: #81ccff;
	content: "";
	width: 100%;
	margin: 0 auto;
	margin-top: 80px;
	margin-bottom: 0px;

} */
/* .arrow-down {
  width: 0;
  height: 0;
  border-left: 20px solid transparent;
  border-right: 20px solid transparent;

  border-top: 20px solid #f00;
} */




	</style>
@stop


@section('ecommerce')

@stop

@section('content')

@include('user.layouts.tab')

<div class="row bg-white ">
	<div class="container">
		<div class="row justify-content-center">
			<div class=" col-9">
				<div class="mt-3">
					<div class="row justify-content-center">
						<div class="col-md-12 p-0 mb-4">
							<h4 class="text-center mb-4">プロジェクトを支援する</h4>
							@include('user.layouts.project-steps', ['step' => 1])
						</div>
						<div class="col-md-12 p-0 mb-4">
							<div class="row justify-content-center">
								<div class="col-md-12 ">
									<h5 class=" font-weight-bold ">プロジェクトの支援が完了しました。</h5>
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-12 offset-md-1">
									<div class="form-check pt-3 pb-3">
										<input type="radio" class="form-check-input" name="optradio">
										<label class="form-check-label font-weight-bold">新しい送付先</label>
									</div>
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-12 offset-md-2">
									<table>
										<tr>
											<th class="px-3 pb-2">ポイント残高</th> <th>10,000 ポイント</th>
										</tr>
										<tr>
											<th class="px-3 py-2">支払ポイント</th> <th>-5,000 ポイント</th>
										</tr>
										<tr>
											<th class="px-3 py-2">購入後ポイント</th> <th> 5,000 ポイント</th>
										</tr>
									</table>
								</div>
							</div>
							<div class="row justify-content-center mt-4">
								<div class="col-md-12 ">
									<h5 class=" font-weight-bold ">不足ポイント分支払い</h5>
								</div>
							</div>
							<div class="row justify-content-center mt-1">
								<div class="col-md-12 offset-md-1">
									<h6 class="">不足ポイント分をクレジットカードで支払いできます。</h6>
								</div>
							</div>
							<div class="row justify-content-center mt-4">
								<div class="col-md-12 offset-md-2">
									<h6 class="font-weight-bold">カード情報入力</h6>
								</div>
							</div>
							<div class="row  mt-1 ml-md-3">
								<div class="col-md-7 offset-md-1">
									<label for="">(例 TARO SUZUKI)</label>
									<input type="text" name="" class="form-control" value="">
									<label for="">(例 TARO SUZUKI)</label>
									<input type="text" name="" class="form-control" value="">
									<div class="row mt-2 pt-md-2">
										<div class="col-3">
											<label for="">label</label>
											<input type="text" class="form-control" name="" value="">
										</div>
										<div class="col-1">
											<label for="" class="text-white">hidden</label>
											<p>/</p>
										</div>

										<div class="col-3 ">
											<label for="" class="text-white">hidden</label>
											<input type="text" class="form-control" name="" value="">
										</div>

										<div class="col-3 ml-5">
											<label for="">label</label>
											<input type="text" class="form-control" name="" value="">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>





































@stop

@section('custom_js')

@stop
