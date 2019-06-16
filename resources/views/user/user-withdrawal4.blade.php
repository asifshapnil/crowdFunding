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
		.btn-bottom{
			color: #fff;
 background-color: #868e96;
 border-color: #868e96;
 width: 120px;
		}
		.btn-bottom:hover{
			color: #fff;
	 background-color: #727b84;
	 border-color: #6c757d;
		}
		/* .step{
			border: 2px solid #868e96;
		} */
		.bg-dark{
			background-color: #868e96;
		}
	</style>
@stop


@section('ecommerce')

@stop

@section('content')

<section class="first_tabs">
		<div class="container">
			<div class="row">
				<div class="col-10 offset-md-1">
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="{{route('user-withdrawal')}}" class="item">退会申請</a> > 退会申請
						</li>
						
					</ul>
				</div>
			</div>
		</div>
	</section>


<div class="container">


<div class="mt20">
	<div class="row">
		
		<div class="mx-auto">
			{{-- @include('user.layouts.tab') --}}


			{{-- @include('user.layouts.message_modal') --}}
			  {{-- <div class="row  justify-content-between">
					<div class="col-md-10 col-sm-10">
						<div class="row justify-content-center">
							<div class="col-md-2 col-sm-2  step align-self-center">
								<p class="  my-auto">step1 <br>退会理由入力 </p>

							</div>
							<div class="col-md-2 col-sm-2  step align-self-center">
								<p class="text-center text-dark my-auto">step2 <br>退会理由確認 </p>
							</div>
							<div class="col-md-2 col-sm-2  step align-self-center   bg-dark text-white">
								<p class="text-center text-dar my-auto">step3 <br>退会申請完了 </p>
							</div>
						</div>
					</div>
			  </div> --}}

			  @include('user.layouts.withdraw-steps', ['step' => 3])

				<div class="row mt-5 justify-content-center">
					<div class="col-md-7 col-sm-7 mr-md-5">
						<div class="mr-md-3">
							<h4 class="font-weight-bold   text-center mr-md-5">退会申請が完了しました。</h4>
							<p class="p-3  text-center mr-md-5">入力していただいた内容で退会申請を行いました。<br>
						 Crofunのご利用いただきありがとうございました。</p>
						 <h4 class="text-center mt-5 mr-md-5">	<a href="{{route('user-withdrawal3')}}" class="btn btn-md btn-bottom"><span><i class="fa fa-angle-left"></i>

						 </span>戻 る </a>
						 </h4>
						</div>

					</div>
				</div>



			{{-- <div class="row">
				hello lorem ispom
			</div> --}}

		</div>
	</div>

</div>

</div>





@stop

@section('custom_js')

@stop
