@extends('user.layouts.main')

@section('custom_css')
	<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 25%;
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
		.hide{
			display: none;
		}
	</style>
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
		<div class="col-md-10 offset-md-1 col-sm-12">
			<div class="mt20">
				<div class="row">
					<div class="col-md-3">
						@include('user.layouts.profile')
					</div>
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12">
								@if (session('success_message'))
									<h4 class="py-2 p-2 bg-success text-white">{{session('success_message')}}</h4>
								@elseif (session('error_message'))
									<h4 class="py-2 p-2 bg-danger text-white">{{session('error_message')}}</h4>

								@endif
							</div>

						</div>

						<div class="">
                  			<h4 class="py-2">パスワード変更</h4>

                  			<div class="col-md-12 col-12">
                  				<form action="{{ route('user-change-password-action') }}" method="POST" enctype="multipart/form-data">

									{{ csrf_field() }}

									<div class="row border">
										<div class="col-md-3 col-3 bg-dark">
											<p class="pt-3 ">現在のパスワード</p>
										</div>
										<div class="col-md-9 col-9  pt-2">
											<input type="password" class="form-control" id="inputEmail3" placeholder="現在のパスワード" name="current_password" value="">
									        @if ($errors->has('current_password'))
						                        <span class="help-block">
						                            <strong>{{ $errors->first('current_password') }}</strong>
						                        </span>
						                    @endif
										</div>
									</div>

									<div class="row border">
										<div class="col-md-3 col-3 bg-dark">
											<p class="pt-3 ">新しいパスワード</p>
										</div>
										<div class="col-md-9 col-9  pt-2">
											<input type="password" class="form-control" id="inputEmail3" placeholder="新しいパスワード" name="password" value="">
									        @if ($errors->has('password'))
						                        <span class="help-block">
						                            <strong>{{ $errors->first('password') }}</strong>
						                        </span>
						                    @endif
										</div>
									</div>

									<div class="row border">
										<div class="col-md-3 col-3 bg-dark">
											<p class="pt-3 ">新しいパスワード確認</p>
										</div>
										<div class="col-md-9 col-9  pt-2">
											<input type="password" class="form-control" id="inputEmail3" placeholder="新しいパスワード確認" name="password_confirmation" value="">
									        @if ($errors->has('password_confirmation'))
						                        <span class="help-block">
						                            <strong>{{ $errors->first('password_confirmation') }}</strong>
						                        </span>
						                    @endif
										</div>
									</div>

									<div class="row p-5">
					                  <div class="col-md-12 col-12">
					                    <h4 class="text-center"><button type="submit" class="btn btn-md btn-bottom">更新する</a></h4>
					                  </div>
					                </div>
			                    </form>
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
