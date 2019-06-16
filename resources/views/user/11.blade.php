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


<div class="container">


<div class="mt20">
	<div class="row">
		<div class="col-md-3">
			@include('user.layouts.profile')
		</div>
		<div class="col-md-9">
			{{-- @include('user.layouts.tab') --}}


			{{-- @include('user.layouts.message_modal') --}}
          <div class="row ml-md-1 well">
            <h4 class="py-2">プロフィール編集</h4>

            <div class="col-md-12 col-12">
              <div class="row border">
                <div class="col-md-3 col-3 bg-dark">
                  <p class="pt-3 ">氏名</p>
                </div>
                <div class="col-md-9 col-9 ">
                  <div class="row pt-2">
                    <div class="col-md-3 col-3 p-0 ml-5">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="名" value="" name="first_name">
                      @if ($errors->has('first_name'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="col-md-3 col-3 p-0 m-0">
                      <input type="text" class="form-control mx-1" id="inputEmail3" placeholder="姓" value="" name="last_name">
                      @if ($errors->has('last_name'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                    </div>
                  </div>
                </div>
              </div>

              <div class="row border">
                <div class="col-md-3 col-3 bg-dark">
                  <p class="pt-3 ">姓</p>
                </div>
                <div class="col-md-9 col-9 ">
                  <div class="row pt-2">
                    <div class="col-md-3 col-3 p-0 ml-5">
                      <input type="text" name="" class="form-control " value="">

                    </div>
                    <div class="col-md-3 col-3 p-0 m-0">
                      <input type="text" name="" class="form-control mx-1" value="">

                    </div>
                  </div>
                </div>
              </div>

              <div class="row border">
                <div class="col-md-3 col-3 bg-dark">
                  <p class="pt-3 ">アイコン画像</p>
                </div>
                <div class="col-md-9 col-9 ">
                  <div class="row pt-2">
                    <div class="col-md-6 col-6 p-0 ml-5">
                      <input type="file" class="form-control" id="inputEmail3" placeholder="アイコン画像" name="pic">
                      @if ($errors->has('pic'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('pic') }}</strong>
                                </span>
                            @endif
                    </div>

                  </div>
                </div>
              </div>


              <div class="row border">
                <div class="col-md-3 col-3 bg-dark">
                  <p class="pt-3 ">フリガナ</p>
                </div>
                <div class="col-md-9 col-9 ">
                  <div class="row pt-2">
                    <div class="col-md-6 col-6 p-0 ml-5">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="フリガナ" value="" name="phonetic">
                      @if ($errors->has('phonetic'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('phonetic') }}</strong>
                                </span>
                            @endif
                    </div>

                  </div>
                </div>
              </div>

              <div class="row border">
                <div class="col-md-3 col-3 bg-dark">
                  <p class="pt-3 ">生年月日</p>
                </div>
                <div class="col-md-9 col-9 ">
                  <div class="row pt-2">
                    <div class="col-md-3 col-3 p-0 ml-5">
                      <select name="birth_year" class="form-control">

        			       		<option value="">1</option>

        			       	</select>
        			        @if ($errors->has('birth_year'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('birth_year') }}</strong>
                                </span>
                            @endif

                    </div>
                    <div class="col-md-2 col-2 p-0 m-0">
                      <select name="birth_month" class="form-control mx-md-1">
        			       		<option value="">1</option>
        			       	</select>
        			        @if ($errors->has('birth_month'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('birth_month') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="col-md-2 col-2 p-0 m-0">
                      <select name="birth_day" class="form-control ml-md-2">
        			       		<option value="">1</option>
        			       	</select>
        			        @if ($errors->has('birth_day'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('birth_day') }}</strong>
                                </span>
                            @endif
                    </div>
                  </div>
                </div>
              </div>

              <div class="row border">
                <div class="col-md-3 col-3 bg-dark">
                  <p class="pt-3 ">性別</p>
                </div>
                <div class="col-md-9 col-9 ">
                  <div class="row pt-2">

                      <div class="col-sm-3 ml-md-5">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="sex" id="gridRadios2" value="1">
                            男性
                          </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="sex" id="gridRadios3" value="2" >
                            女性
                          </label>
                        </div>
                    </div>


                  </div>
                </div>
              </div>
              <div class="row border">
                <div class="col-md-3 col-3 bg-dark">
                  <p class="pt-3 ">電話番号</p>
                </div>
                <div class="col-md-9 col-9 ">
                  <div class="row pt-2">
                    <div class="col-md-6 col-6 p-0 ml-5">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="電話番号" name="phone_no" value="">
                      @if ($errors->has('phone_no'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('phone_no') }}</strong>
                                </span>
                            @endif
                    </div>
                  </div>
                </div>
              </div>

              <div class="row border">
                <div class="col-md-3 col-3 bg-dark">
                  <p class="pt-3 ">住所</p>
                </div>
                <div class="col-md-9 col-9 ">
                  <div class="row pt-2">
                    <div class="col-md-6 col-6 p-0 ml-5">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="郵便番号" name="postal_code" value="">
                      @if ($errors->has('postal_code'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('postal_code') }}</strong>
                                </span>
                            @endif                    </div>
                  </div>
                  <div class="row pt-2">
                    <div class="col-md-3 col-3 p-0 ml-5">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="都道府県" name="division" value="">
                     @if ($errors->has('division'))
                               <span class="help-block text-danger">
                                   <strong>{{ $errors->first('division') }}</strong>
                               </span>
                           @endif
                    </div>
                  </div>
                  <div class="row pt-2">
                    <div class="col-md-6 col-6 p-0 ml-5">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="市区町村" name="municipility" value="">
                      @if ($errors->has('municipility'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('municipility') }}</strong>
                                </span>
                            @endif                    </div>
                  </div>
                  <div class="row pt-2">
                    <div class="col-md-6 col-6 p-0 ml-5">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="それ以降の住所" name="address" value="">
                      @if ($errors->has('address'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif                    </div>
                  </div>
                  <div class="row pt-2">
                    <div class="col-md-6 col-6 p-0 ml-5">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="マンション名・部屋番号" name="room_no" value="">
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
                  <p class="pt-3 ">URL</p>
                </div>
                <div class="col-md-9 col-9 ">
                  <div class="row pt-2">
                    <div class="col-md-6 col-6 p-0 ml-5">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="URL" name="url" value="">
                      @if ($errors->has('url'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('url') }}</strong>
                                </span>
                            @endif                    </div>
                  </div>
                </div>
              </div>
              <div class="row border">
                <div class="col-md-3 col-3 bg-dark">
                  <p class="pt-3 ">プロフィール</p>
                </div>
                <div class="col-md-9 col-9 ">
                  <div class="row pt-2">
                    <div class="col-md-10 col-10 p-0 ml-5">
                      <textarea type="text" class="form-control" id="inputEmail3" placeholder="プロフィール" name="profile"></textarea>
                      @if ($errors->has('profile'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('profile') }}</strong>
                                </span>
                            @endif
                    </div>
                  </div>
                </div>
              </div>

              <div class="row border pb-5">
                <div class="col-md-3 col-3 bg-dark">
                  <p class="pt-3 ">アイコン画像</p>
                </div>
                <div class="col-md-9 col-9 ">
                  <div class="row pt-2">
                    <div class="col-md-3 col-3 p-0 ml-5 mb-2">
                      <div class="bg-dark p-5">

                      </div>
                    </div>
                    <div class="col-md-3 col-3">
                      <a href="#" class="bg-dark px-2">hello</a>
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>

          <div class="row p-5">
            <div class="col-md-12 col-12">
              <h4 class="text-center">	<a href="{{route('101.2')}}" class="btn btn-md btn-bottom">更新する</a></h4>

            </div>
          </div>

	   </div>

</div>

</div>





@stop

@section('custom_js')

@stop
