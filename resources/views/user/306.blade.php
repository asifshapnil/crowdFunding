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
						<div class="col-md-12 p-0 mb-4 ">
							<h4>リターンをお選びください</h4>
						</div>
						<div class="col-md-12 p-0 mb-4 ml-md-5">
							<h4 class="ml-md-3">商品情報</h4>
						</div>

						<div class="col-md-12 ">
							<div class="row inner_inner  pl-0 ml-2 pb-4">
								<div class="col-md-12">
									<table class="table table-striped">
										<tr>
											<th class="text-center">商品名</th> <th class="text-center">数量</th>  <th class="text-center">必要ポイント</th>
										</tr>
										<tr class="">
											<td style="width:200;" class="pl-md-5">
												<div class="d-flex flex-row">
													<img src="{{ asset('images/BMW-TA.jpg') }}" alt="" class="" width="200" height="150">
													<span class="px-2">
														12345123451234512345123 <br>
														M／ネイビー <br> 1,000ポイント
													</span>
												</div>
											</td>
											<td class="text-center">
												<div class="d-flex flex-row pt-5 justify-content-center">
													<p class="px-3 py-1 border align-self-start text-center">1</p>
													<p class="px-3 py-1 align-self-end border text-center">+</p>
												</div>
											</td>
											<td style="width:100px;" text-align="center" class="text-center">
												<div class="pt-5">
													<h4 style="letter-spacing:1px;">1,000</h4>
												</div>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div class="col-md-12 pt-3">
							<div class="row">
								<div class="col-10  border offset-md-1 p-2">
									<div class="row inner_inner">
										<div class="col-md-12 ">
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
								</div>
							</div>
						</div>
						<div class="col-md-12 pt-3">
							<div class="row">
								<div class="col-10  border offset-md-1 p-2">
									<div class="row inner_inner  pl-0 ml-2 pb-4">
										<div class="col-md-12">
											<div class="row ">
												<div class="col-md-12">
													<span class="">並木 来未子  (ナミキ クミコ) <br>
														〒270-2241 <br>
														千葉県 松戸市 松戸新田４３９－２４ <br>
														電話番号:0473654993</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12  pt-3">
								<div class="row">
									<div class="col-10  border offset-md-1">
										<div class="row">
										<div class="row inner_inner  pl-0 ml-2 pb-4">
											<div class="col-md-12">
												<div class="row ">
													<div class="col-md-12 p-2">
														<span>カード名義</span> <br>
														<h6>KUMIKO NAMIKI</h6> <br>
														<span>カード番号</span> <br>
														<h6>XXXX-XXXX-XXXX-1212</h6> <br>
														<span class="col-2">有効期限 <br>
															<h6>09/2018</h6></span>
															<span class="col-3">セキュリティコード <br>
																<h6>XX8</h6></span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12 mt-5">
									<div class="row justify-content-center">
										<div class="col-8">
											<p class="text-center">
												<span>	<input type="checkbox" name="" value="">
													<a href="#">利用規約</a>に同意 </span> <br>
													このプロジェクトはチャレンジ形式です。<br>
													目標金額に達していなくても、プロジェクトは期間が来れば成立となります。<br>
													支援後のキャン</p>
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
