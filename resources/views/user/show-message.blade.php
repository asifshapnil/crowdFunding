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
		.step{
			border: 2px solid #868e96;
		}
		.bg-dark{
			background-color: #CCCCCC;
		}
    tr{
      width: 750px;
    }
    .border-dark {
  border-color: #343a40 !important; }
  .form-control{
    border-radius: none !important;
  }

  .text-center {
  text-align: center !important; }
	</style>
@stop


@section('ecommerce')

@stop

@section('content')
@include('user.layouts.tab')


<div class="container">
  	<div class="row">
   		<div class="col-10 offset-md-1">
			<div class="mt20">
				<div class="row">
					<div class="col-md-3">
						@include('user.layouts.profile')
					</div>
					<div class="col-md-9">
						{{-- @include('user.layouts.tab') --}}


						{{-- @include('user.layouts.message_modal') --}}
						@if (session('success'))
							<div class="row">
								<div class="col-md-12">
									<h4 class=" bg-info  p-3 text-white">{{ session('success') }}</h4>

								</div>
							</div>
						@endif
			          <div class="row ml-md-1 well">

									{!! Form::open(['route' => 'delete-message', 'method' => 'get']) !!}
									<input type="hidden" name="id" value="{{ $messages->id }}">
									<div class="row">
										<div class="col-md-12">
											<button type="submit" class="msg_delete_btn p-3" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
										</div>
									</div>
									{!! Form::close() !!}



			            <div class="col-md-12 col-12">

										<div class="row">
											<div class="col-md-8 col-8 col-sm-8 p-0 m-0">
												<p class="font-weight-bold">商品名についてのお問い合わせ<p>
											</div>
											<div class="col-md-4 col-4 col-sm-4 p-0 m-0 text-right">
												{{date("Y/m/d ", strtotime($messages->created_at))}}
											</div>
										</div>
										<div class="row">
											<h5 class="mb-3 col-12 p-0">{{$from->first_name}} {{$from->last_name}}</h5>
											<p class="col-12 p-0">{{$messages->message}}</p>
										</div>

										<div class="row">
											<div class="col-md-10 col-10 bg-dark">
												{!! Form::open(['route' => 'send-reply', 'method' => 'post']) !!}

												<h5 class="px-2 ml-md-2 mt-3">返信メッセージ</h5>
												<div class="m-3">
													<textarea name="message" rows="8" cols="80" class="form-control"></textarea>
													<input type="hidden" name="subject" value="{{ $messages->subject }}">
													<input type="hidden" name="to_id" value="{{ $messages->from_id }}">
													<input type="hidden" name="reply_message_id" value="{{ $messages->id }}">

												</div>

											</div>
										</div>
										<div class="row mt-3">
											<button type="submit" class="btn btn-md btn-bottom">更新する</button>

										</div>
										{!! Form::close() !!}


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
