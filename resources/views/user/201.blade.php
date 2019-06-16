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
			<div class="row">
        <div class="col-md-12 p-0 mb-4">
          <h4 class="text-center mb-4">プロジェクトを支援する</h4>
          @include('user.layouts.project-steps', ['step' => 1])
        </div>
        <div class="col-md-12 p-0 mb-4">
          <h4>リターンをお選びください</h4>
        </div>

				<div class="col-md-12 ">
          <div class="row bg-sky">
            <div class="col-12">
              <div class="form-check pl-5 pt-3">
                  <input type="radio" class="form-check-input" name="optradio">
                  <label class="form-check-label">￥3,000 コース </label>
              </div>
            </div>
            <div class="col-12">
              <div class="row inner_inner horizontal pl-5 ml-2 pb-4">
            <div class="col-md-5">
              <div class="row">
                <div class="col-md-12 project-item">
                  <img src="{{ asset('images/BMW-TA.jpg') }}" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="col-md-7">
              <div class="row ">
                <div class="col-md-12">
                  <span class="text-primary">100ポイント</span>
                </div>
              </div>
              <div class="row mt-1">
                <div class="col-md-12">
                  <span class="font-weight-bold " style="font-size:20px">リターンの名前がここに入ります</span>
                  <br>

                </div>
              </div>
              <div class="row mt-1">
                <div class="col-md-12">
                  <span>リターン説明文がここに入りますリターン説明文がここに入り  <br>
                     ますリターン説明文がここに入りますリター <br>
                     ン説明文がここに入りますリターン説明文がここに入ります <br>
                     リターン説明文がここに入ります</span>
                </div>
               </div>



          </div>


            </div>
          </div>



          </div>


				</div>
        <div class="col-md-12 ">
          <div class="row">
            <div class="col-12">
              <div class="form-check pl-5 pt-3">
                  <input type="radio" class="form-check-input" name="optradio">
                  <label class="form-check-label">￥3,000 コース </label>
              </div>
            </div>
            <div class="col-12">
              <div class="row inner_inner horizontal pl-5 ml-2 pb-4">
            <div class="col-md-5">
              <div class="row">
                <div class="col-md-12 project-item">
                  <img src="{{ asset('images/BMW-TA.jpg') }}" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="col-md-7">
              <div class="row ">
                <div class="col-md-12">
                  <span class="text-primary">100ポイント</span>
                </div>
              </div>
              <div class="row mt-1">
                <div class="col-md-12">
                  <span class="font-weight-bold " style="font-size:20px">リターンの名前がここに入ります</span>
                  <br>

                </div>
              </div>
              <div class="row mt-1">
                <div class="col-md-12">
                  <span>リターン説明文がここに入りますリターン説明文がここに入り  <br>
                     ますリターン説明文がここに入りますリター <br>
                     ン説明文がここに入りますリターン説明文がここに入ります <br>
                     リターン説明文がここに入ります</span>
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

	</div>
</div>




@stop

@section('custom_js')

@stop
