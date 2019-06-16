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
    <div class="col-md-10 offset-md-1 col-sm-12">
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
											<h4 class=" text-info">{{ session('success') }}</h4>

										</div>
									</div>
								@endif
                <div class="">
                  <h4 class="py-2">プロフィール編集</h4>

                  <div class="col-md-12 col-12">

										{!! Form::open(['route' => 'user-profile-update-action', 'method' => 'post']) !!}

										<div class="row border">
                      <div class="col-md-3 col-3 bg-dark">
                        <p class="pt-3 ">氏名</p>
                      </div>
                      <div class="col-md-9 col-9 ">
                        <div class="row pt-2">
                          <div class="col-md-3 col-3 p-0 ml-5">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="名" value="{{$user->first_name}}" name="first_name">
                            @if ($errors->has('first_name'))
															<span class="help-block text-danger">
																<strong>{{ $errors->first('first_name') }}</strong>
															</span>
														@endif
													</div>
                          <div class="col-md-3 col-3 p-0 m-0">
                            <input type="text" class="form-control mx-1" id="inputEmail3" placeholder="姓" value="{{$user->last_name}}" name="last_name">
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
                        <p class="pt-3 ">フリガナ</p>
                      </div>
                      <div class="col-md-9 col-9 ">
                        <div class="row pt-2">
                          <div class="col-md-3 col-3 p-0 ml-5">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="名" value="{{$user->profile->phonetic}}" name="phonetic1">
                            @if ($errors->has('first_name'))
															<span class="help-block text-danger">
																<strong>{{ $errors->first('phonetic') }}</strong>
															</span>
														@endif
													</div>
													<div class="col-md-3 col-3 p-0 ml-1">
														<input type="text" class="form-control" id="inputEmail3" placeholder="名" value="{{$user->profile->phonetic2}}" name="phonetic2">
														@if ($errors->has('first_name'))
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
              			       		<?php for($i=1917; $i<=date('Y'); $i++){?>
              			       			<option value="{{$i}}" @if (isset($user->profile->dob) && $user->profile->dob)
              			       				{{ date('Y', strtotime($user->profile->dob)) == $i?'selected':'' }}
              									@else
              									{{ 	$user->profile->dob = '' }}
              			       			@endif>{{$i}}</option>
              			       		<?php }?>
              			       	</select>
														@if ($errors->has('birth_year'))
															<span class="help-block text-danger">
																<strong>{{ $errors->first('birth_year') }}</strong>
															</span>
														@endif

													</div>
                          <div class="col-md-2 col-2 p-0 m-0">
                            <select name="birth_month" class="form-control mx-md-1">
              			       		<?php for($i=1; $i<=12; $i++){?>
              			       			<option value="{{$i}}" {{date('m', strtotime($user->profile->dob)) == $i?'selected':'' }}>{{$i}}</option>
              			       		<?php }?>
              			       	</select>
														@if ($errors->has('birth_month'))
															<span class="help-block text-danger">
																<strong>{{ $errors->first('birth_month') }}</strong>
															</span>
														@endif
													</div>
                          <div class="col-md-2 col-2 p-0 m-0">
                            <select name="birth_day" class="form-control ml-md-2">
              			       		<?php for($i=1; $i<=31; $i++){?>
              			       			<option value="{{$i}}" {{date('d', strtotime($user->profile->dob)) == $i?'selected':'' }}>{{$i}}</option>
              			       		<?php }?>
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
                      {{-- <div class="col-md-9 col-9">
                        <div class="row pt-2">
                          <div class="col-md-6 col-6">
                            <select name="sex" class="form-control">
                              <option value="1" {{$user->profile->sex == 1?'selected':''}}>男性</option>
                              <option value="2" {{$user->profile->sex == 2?'selected':''}}>女性</option>
                            </select>
                          </div>
                        </div>
                      </div> --}}
											<div class="col-md-9 col-9 ">
												<div class="row pt-2">
													<div class="col-md-6 col-6 p-0 ml-5">
														<select name="sex" class="form-control">
															<option value="1" {{$user->profile->sex == 1?'selected':''}}>男性</option>
															<option value="2" {{$user->profile->sex == 2?'selected':''}}>女性</option>
														</select>
														@if ($errors->has('sex'))
															<span class="help-block text-danger">
																<strong>{{ $errors->first('sex') }}</strong>
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
                      <div class="col-md-9 col-9 ">
                        <div class="row pt-2">
                          <div class="col-md-6 col-6 p-0 ml-5">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="電話番号" name="phone_no" value="{{$user->profile->phone_no}}">
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
                            <input type="number" class="form-control"  id="postal_code" placeholder="郵便番号" name="postal_code" value="{{$user->profile->postal_code}}">
														<span id="postal_error" style="color:red;"></span>
														@if ($errors->has('postal_code'))
															<span class="help-block text-danger">
																<strong>{{ $errors->first('postal_code') }}</strong>
															</span>
														@endif
													</div>
                        </div>
                        <div class="row pt-2">
                          <div class="col-md-3 col-3 p-0 ml-5">
														@include('user.layouts.prefectures')
														@if ($errors->has('division'))
															<span class="help-block text-danger">
																<strong>{{ $errors->first('division') }}</strong>
															</span>
														@endif

                          </div>
                        </div>
                        <div class="row pt-2">
                          <div class="col-md-6 col-6 p-0 ml-5">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="市区町村" name="municipility" value="{{$user->profile->municipility}}">
                            @if ($errors->has('municipility'))
															<span class="help-block text-danger">
																<strong>{{ $errors->first('municipility') }}</strong>
															</span>
														@endif
													</div>
                        </div>
                        <div class="row pt-2">
                          <div class="col-md-6 col-6 p-0 ml-5">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="それ以降の住所" name="address" value="{{$user->profile->address}}">
                            @if ($errors->has('address'))
															<span class="help-block text-danger">
																<strong>{{ $errors->first('address') }}</strong>
															</span>
														@endif
													</div>
                        </div>
                        <div class="row pt-2 pb-2">
                          <div class="col-md-6 col-6 p-0 ml-5">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="マンション名・部屋番号" name="room_no" value="{{$user->profile->room_no}}">
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
                            <input type="text" class="form-control" id="inputEmail3" placeholder="URL" name="url" value="{{ (isset($user->profile->url) && $user->profile->url) ? $user->profile->url : ''}}">
                            @if ($errors->has('url'))
                                      <span class="help-block text-danger">
                                          <strong>{{ $errors->first('url') }}</strong>
                                      </span>
                                  @endif
													</div>
                        </div>
                      </div>
                    </div>
                    <div class="row border">
                      <div class="col-md-3 col-3 bg-dark">
                        <p class="pt-3 ">コメント</p>
                      </div>
                      <div class="col-md-9 col-9 ">
                        <div class="row pt-2">
                          <div class="col-md-10 col-10 p-0 ml-5">
                            <textarea type="text" class="form-control" id="inputEmail3" placeholder="プロフィール" name="profile">{{isset($user->profile->url) ? $user->profile->url : ''}}</textarea>
                            @if ($errors->has('profile'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('profile') }}</strong>
                                </span>
                            @endif
                            <br>
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
                          <div class="col-md-4 col-3 mb-2">
  												<img id="blah" src="#" alt="your image" class="hide"/>
                          </div>
                          <div class="col-md-3 col-3">
                            <input type="file" onchange="readURL(this);" class="" id="inputEmail3" placeholder="アイコン画像" name="pic">
                          </div>
                        </div>
                      </div>
                    </div>
										<div class="row p-5 justify-content-center">
											<div class="col-md-1 col-1">
												<input type="submit" name="" value="更新する" class="btn btn-md" id="submit">
											</div>
										</div>
										{!! Form::close() !!}
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
			$(document).on('click', '#submit', function(){
				var postal = $('#postal_code').val();
				if(postal.length > 7 || postal.length < 7){
					$('#postal_error').html('Postal code takes only 7 character.');
					return false;
				}else{
					$('#postal_error').html('');

					return true;
				}
			});
		});
	</script>

	<script type="text/javascript">
			function readURL(input) {
					if (input.files && input.files[0]) {
							var reader = new FileReader();
							reader.onload = function (e) {
									$('#blah')
											.attr('src', e.target.result)
											.width(150)
											.height(200);
									$('#blah').removeClass('hide');
							};
							reader.readAsDataURL(input.files[0]);
					}
			}
	</script>

@stop
