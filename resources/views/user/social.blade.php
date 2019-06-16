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
		.facebook{
        background-color: #3B5998;
      }
      .google{
        background-color: #d34836;
      }
      .twitter{
        background-color: #0084b4;
      }
	</style>
@stop


@section('ecommerce')
	
@stop

@section('content')


<div class="container" id="new-project">


<div class="mt20">
	<div class="row">
		<div class="col-md-3">
			@include('user.layouts.profile')
		</div>
		<div class="col-md-9">

			


			<div class="car padding">

					@include('layouts.message')



					<h4>ソーシャル連携すると、パスワード入力せずにログインできるようになります。</h4>


					<a href="{{route('front-facebook')}}" class="btn btn-primary btn-lg btn-block facebook mt20"><i class="fa fa-facebook"></i> Connect Facebook</a>
		            <a href="{{route('front-google')}}" class="btn btn-danger btn-lg btn-block google"><i class="fa fa-google"></i> Connect Google</a>
		            <a href="{{route('front-twitter')}}" class="btn btn-info btn-lg btn-block twitter"><i class="fa fa-twitter"></i> Connect Twitter</a>
		            <!-- <a href="{{route('front-yahoo')}}" class="btn btn-danger btn-lg btn-block"><i class="fa fa-yahoo"></i> Connect Yahoo</a> -->

            </div>


			

			
			


		</div>
	</div>
	
</div>

</div>





@stop

@section('custom_js')

@stop