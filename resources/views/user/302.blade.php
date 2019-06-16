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
							@include('user.layouts.project-steps', ['step' => 1])
						</div>
						<div class="col-md-12 p-0 mb-4">
							<div class="row ">
								<h5 class="col-md-12  font-weight-bold ">商品情報確認</h5>
							</div>
							<div class="row justify-content-center mt-5">
								<div class="col-md-12">
									<table class="table">
								<tr class="bg-dark">
									<th class="text-center">商品名</th> <th class="text-center">数量</th>  <th class="text-center">必要ポイント</th>
								</tr>
								<tr class="">
									<td style="width:300px;" class="">
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
											<input type="text" class="px-3 py-1 border align-self-start text-center" id="number" name="" value="" style="width:50px;">
											<button class="px-3 py-1 align-self-end border text-center bg-light" id="increase">+</button>
										</div>
								 </td>
								 <td style="width:100px;" text-align="center" class="text-center">
									 <div class="pt-5">
										 <h4 style="letter-spacing:1px;">1,000</h4>
									 </div>
								</td>
								</tr>
								<tr>
									<td style="width:300px;" class="">
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
										<button class="px-3 py-1 align-self-end border text-center bg-light" id="decrease2">-</button>
										<input type="text" class="px-3 py-1 border align-self-start text-center" id="number2" name="" value="" style="width:50px;">
											<button class="px-3 py-1 align-self-end border text-center bg-light" id="increase2">+</button>
										</div>
								 </td>
								 <td style="width:100px;" text-align="center" class="text-center">
									 <div class="pt-5">
										 <h4 style="letter-spacing:1px;">2,000</h4>
									 </div>
								</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row justify-content-center mt-5">
						<div class="col-md-5 ">
							<a href="#" class=" offset-md-2 text-center btn btn-md btn-primary">プロジェクトの起案者へメッセージを送る</a>
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
	<script type="text/javascript">

		$(document).ready(function(){
			var n = $('#number').val();
			n = 1;
			$('#number').val(n);

			// console.log(n);
			$('#increase').click(function(){
				n = n+1;
				$('#number').val(n);

			});

			n2 = 1;
			$('#number2').val(n2);

			// console.log(n);
			$('#increase2').click(function(){
				n2 = n2+1;
				$('#number2').val(n2);

			});
			$('#decrease2').click(function(){
				n2 = n2-1;
				$('#number2').val(n2);

			});
		});

	</script>

@stop
