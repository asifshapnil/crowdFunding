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
.bg-light-yellow{
	background-color: #fff8e5;

}
.bg-yellow{
	background-color: #ffbc00;
}
.form-check{
	padding-left: 35px;

}
.check-first{
	padding-left: 30px !important;
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
							<div class="row">
								<div class="col-md-10 ml-md-3">
									<div class="form-check check-first  pt-3">
										<input type="radio" class="form-check-input frm-control-lg" name="optradio">
										<label class="form-check-label">￥3,000 コース <br> 並木 来未子  (ナミキ クミコ) <br>
											〒270-2241 <br>
											千葉県 松戸市 松戸新田４３９－２４ <br>
											電話番号:0473654993 </label>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 ">
								<div class="row bg-light-yellow">
									<div class="col-12">
										<div class="form-check pt-3 pb-3">
											<input type="radio" class="form-check-input" name="optradio">
											<label class="form-check-label font-weight-bold">新しい送付先</label>
										</div>
									</div>
									<div class="col-12">
										<div class="row inner_inner  pl-5 ml-2 pb-4">
											<div class="col-md-9">
												<div class="row border">
													<div class="col-md-3 col-3 bg-dark">

													</div>
													<div class="col-md-9 col-9 bg-white">
														<div class="row pt-2">
															<div class="col-md-3 col-3 p-0 ml-5">
																<input type="text" class="form-control" id="" placeholder="名" value="" name="first_name">
															</div>
															<div class="col-md-3 col-3 p-0 m-0">
																<input type="text" class="form-control mx-1" id="" placeholder="姓" value="" name="last_name">
																<p class="pt-3 ">氏名</p>
															</div>
														</div>
													</div>
												</div>
												<div class="row border">
													<div class="col-md-3 col-3 bg-dark">
														<p class="pt-3 ">フリガナ</p>
													</div>
													<div class="col-md-9 col-9 bg-white">
														<div class="row pt-2">
															<div class="col-md-3 col-3 p-0 ml-5">
																<input type="text" class="form-control" id="" placeholder="名" value="" name="first_name">
															</div>
															<div class="col-md-3 col-3 p-0 m-0">
																<input type="text" class="form-control mx-1" id="" placeholder="姓" value="" name="last_name">
															</div>
														</div>
													</div>
												</div>
												<div class="row border">
													<div class="col-md-3 col-3 bg-dark">
														<p class="pt-3 ">住所</p>
													</div>
													<div class="col-md-9 col-9 bg-white">
														<div class="row pt-2">
															<div class="col-md-6 col-6 p-0 ml-5">
																<input type="text" class="form-control" id="" placeholder="郵便番号" name="postal_code" value="">
																@if ($errors->has('postal_code'))
																	<span class="help-block text-danger">
																		<strong>{{ $errors->first('postal_code') }}</strong>
																	</span>
																@endif
															</div>
														</div>
														<div class="row pt-2">
															<div class="col-md-4 col-4 p-0 ml-5">
																<select class="form-control" name="">
																	<option value="">123</option>
																</select>
															</div>
														</div>
														<div class="row pt-2">
															<div class="col-md-6 col-6 p-0 ml-5">
																<input type="text" class="form-control" id="" placeholder="それ以降の住所" name="address" value="">
																@if ($errors->has('address'))
																	<span class="help-block text-danger">
																		<strong>{{ $errors->first('address') }}</strong>
																	</span>
																@endif
															</div>
														</div>
														<div class="row pt-2">
															<div class="col-md-6 col-6 p-0 ml-5">
																<input type="text" class="form-control" id="" placeholder="マンション名・部屋番号" name="room_no" value="">
																@if ($errors->has('room_no'))
																	<span class="help-block text-danger">
																		<strong>{{ $errors->first('room_no') }}</strong>
																	</span>
																@endif
															</div>
														</div>
														<div class="row pt-2 pb-2">
															<div class="col-md-6 col-6 p-0 ml-5">
																<input type="text" class="form-control" id="" placeholder="マンション名・部屋番号" name="room_no" value="">
																@if ($errors->has('room_no'))
																	<span class="help-block text-danger">
																		<strong>{{ $errors->first('room_no') }}</strong>
																	</span>
																@endif
															</div>
														</div>
													</div>
												</div>
												<div class="row border">
													<div class="col-md-3 col-3 bg-dark">
														<p class="pt-3 ">電話番号</p>
													</div>
													<div class="col-md-9 col-9 bg-white">
														<div class="row pt-2">
															<div class="col-md-6 col-6 p-0 ml-5">
																<input type="text" class="form-control" id="" placeholder="名" value="" name="first_name">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 mt-4">
								<a href="#">戻 る</a>
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
