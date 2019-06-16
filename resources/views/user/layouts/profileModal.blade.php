
<div class="modal fade" aria-hidden="true" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  >
	<div class="modal-dialog modal-lg">

		 <!-- Modal content-->
		 <div class="modal-content">
			 {{-- <div class="modal-header">
			 <button type="button" class="close" data-dismiss="modal">&times;</button>
			 <h4 class="modal-title">Modal Header</h4>
		 </div> --}}
			 <div class="modal-body row justify-content-center">

      	<div class="">
      		<div class="col-md-12">
      			{{-- @include('user.layouts.tab') --}}


      			{{-- @include('user.layouts.message_modal') --}}

                <div class="row well p-0 m-0 justify-content-center">
									<div class="col-md-10 offset-1 my-5">
										<h5 class="">Crofunで活動を行うために下記の情報を記載お願いします。</h5>
									</div>


                  <div class="col-md-11 col-11 ">

										{!! Form::open(['route' => 'user-profile-update-action', 'method' => 'post', 'id'=> 'formID']) !!}

										<div class="row border">
                      <div class="col-md-3 col-3 bg-dark">
                        <p class="pt-3 ">氏名</p>
                      </div>
                      <div class="col-md-9 col-9 ">
                        <div class="row pt-2">
                          <div class="col-md-3 col-3 p-0 ml-5">
                            <input type="text" class="form-control required" id="inputEmail3" placeholder="姓" value="{{$user->first_name}}" name="first_name" required>
                            @if ($errors->has('first_name'))
                                      <span class="help-block text-danger">
                                          <strong>{{ $errors->first('first_name') }}</strong>
                                      </span>
                                  @endif
                          </div>
                          <div class="col-md-3 col-3 p-0 m-0">
                            <input type="text" class="form-control mx-1 required" id="inputEmail3" placeholder="名" value="{{$user->last_name}}" name="last_name" required>
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
                            <input type="text" class="form-control required" id="inputEmail3" placeholder="姓" value="{{isset($user->profile->phonetic)?$user->profile->phonetic:''}}" name="phonetic1" required>
                            @if ($errors->has('first_name'))
                                      <span class="help-block text-danger">
                                          <strong>{{ $errors->first('phonetic') }}</strong>
                                      </span>
                                  @endif
                          </div>
													<div class="col-md-3 col-3 p-0 ml-1">
														<input type="text" class="form-control required" id="inputEmail3" placeholder="名" value="{{isset($user->profile->phonetic2)?$user->profile->phonetic2:''}}" name="phonetic2" required>
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
                            <select name="birth_year" class="form-control required" required>
              			       		<?php for($i=1917; $i<=date('Y'); $i++){?>
              			       			<option value="{{$i}}" @if (isset($user->profile->dob) && $user->profile->dob)
              			       				{{ date('Y', strtotime($user->profile->dob)) == $i?'selected':'' }}
              									@else
              									{{ 	isset($user->profile->dob)?$user->profile->dob:'' }}
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
                            <select name="birth_month" class="form-control mx-md-1 required" required>
              			       		<?php for($i=1; $i<=12; $i++){?>
              			       			<option value="{{$i}}" {{date('m', strtotime(isset($user->profile->dob)?$user->profile->dob:0)) == $i?'selected':'' }}>{{$i}}</option>
              			       		<?php }?>
              			       	</select>
              			        @if ($errors->has('birth_month'))
                                      <span class="help-block text-danger">
                                          <strong>{{ $errors->first('birth_month') }}</strong>
                                      </span>
                                  @endif
                          </div>
                          <div class="col-md-2 col-2 p-0 m-0">
                            <select name="birth_day" class="form-control ml-md-2 required" required>
              			       		<?php for($i=1; $i<=31; $i++){?>
              			       			<option value="{{$i}}" {{date('d', strtotime(isset($user->profile->dob)?$user->profile->dob:0)) == $i?'selected':'' }}>{{$i}}</option>
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
                            <select name="sex" class="form-control required" required>
                              <option value="1" {{$user->profile->sex == 1?'selected':''}}>男性</option>
                              <option value="2" {{$user->profile->sex == 2?'selected':''}}>女性</option>
                            </select>
                          </div>
                        </div>
                      </div> --}}
											<div class="col-md-9 col-9 ">
												<div class="row pt-2">
													<div class="col-md-6 col-6 p-0 ml-5">
														<select name="sex" class="form-control required" required>
															<option value="1" {{isset($user->profile->sex) && $user->profile->sex == 1?'selected':''}}>男性</option>
															<option value="2" {{isset($user->profile->sex) && $user->profile->sex == 2?'selected':''}}>女性</option>
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
                            <input type="text" class="form-control required" id="inputEmail3" placeholder="12312341234" name="phone_no" value="{{isset($user->profile->phone_no)?$user->profile->phone_no:0}}" required>
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
                            <input type="text" class="form-control required" id="inputEmail3" placeholder="郵便番号" name="postal_code" value="{{isset($user->profile->postal_code)?$user->profile->postal_code:''}}" required>
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
                            <input type="text" class="form-control required" id="inputEmail3" placeholder="市区町村" name="municipility" value="{{isset($user->profile->municipility)?$user->profile->municipility:''}}" required>
                            @if ($errors->has('municipility'))
                                      <span class="help-block text-danger">
                                          <strong>{{ $errors->first('municipility') }}</strong>
                                      </span>
                                  @endif
													</div>
                        </div>
                        <div class="row pt-2">
                          <div class="col-md-6 col-6 p-0 ml-5">
                            <input type="text" class="form-control required" id="inputEmail3" placeholder="それ以降の住所" name="address" value="{{isset($user->profile->address)?$user->profile->address:''}}" required>
                            @if ($errors->has('address'))
                                      <span class="help-block text-danger">
                                          <strong>{{ $errors->first('address') }}</strong>
                                      </span>
                                  @endif
													</div>
                        </div>
                        <div class="row pt-2 pb-2">
                          <div class="col-md-6 col-6 p-0 ml-5">
                            <input type="text" class="form-control " id="inputEmail3" placeholder="マンション名・部屋番号" name="room_no" value="{{isset($user->profile->room_no)?$user->profile->room_no:''}}" required>
                            @if ($errors->has('room_no'))
                                      <span class="help-block text-danger">
                                          <strong>{{ $errors->first('room_no') }}</strong>
                                      </span>
                                  @endif
                                </div>
                        </div>

                      </div>
                    </div>


										<div class="row p-5">
											<div class="col-md-1 col-1 offset-5">
												<!-- <button type="submit" name="" value=""   class="btn btn-md btn-dark text-white font-wight-bold" style="cursor:pointer;">
													更新する </button> -->
                          <input type="submit" name="submit" class="btn btn-md btn-dark text-white font-wight-bold" value="更新する">
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
