<style>
	.left_menu_area i.angle{
		position: absolute;
		right: 0px;
		font-size: 20px;
	}
</style>

<div class="list-group text-center">
	<div class="profile_image_area leftmenuarea">
		<div class="img_area">
			<?php
			$pic = parse_url(Auth::user()->pic);
			if(isset($pic['host'])) $pic = Auth::user()->pic;
			else $pic = Request::root().'/uploads/'.Auth::user()->pic;
			?>
			<a href="#"><img src="{{$pic}}" alt="..."></a>
		</div>
		<div class="point_area">
			<a href="#">
				<span>
					保有ポイント
					<br>
					{{Auth::user()->point}} ポイント
				</span>
			</a>
		</div>
	</div>
	<!-- <div style="width: 100%;" class="mt20">
		<h4>{{Auth::user()->first_name.' '.Auth::user()->last_name}}</h4>
	</div> -->
	<div class="left_menu_area leftmenuarea">
		<a href="#" class="list-group-item text-center"><strong><i class="fa fa-user-circle user_icon"></i> アカウント情報</strong></a>
		<a href="{{route('user-profile-update')}}" class="list-group-item text-center">プロフィール編集 
			{!! Route::currentRouteName()=='user-profile-update'?'<i class="fa fa-angle-right angle" aria-hidden="true"></i>':'' !!}			
		</a>
		<a href="{{route('user-email-update')}}" class="list-group-item text-center">メールアドレス変更 
				{!! Route::currentRouteName()=='user-email-update'?'<i class="fa fa-angle-right angle" aria-hidden="true"></i>':'' !!}
		</a>
		<a href="{{route('user-change-password')}}" class="list-group-item text-center">パスワード変更 
			{!! Route::currentRouteName()=='user-change-password'?'<i class="fa fa-angle-right angle" aria-hidden="true"></i>':'' !!}
		</a>
		{{-- <a href="{{route('user-cards-list')}}" class="list-group-item text-center">クレジットカード変更・確認 </a> --}}
		<a href="{{route('user-shipping-address-update')}}" class="list-group-item text-center">配送先情報 
			{!! Route::currentRouteName()=='user-shipping-address-update'?'<i class="fa fa-angle-right angle" aria-hidden="true"></i>':'' !!}
		</a>
		{{-- <a href="{{route('user-social')}}" class="list-group-item text-center">ソーシャル連携</a> --}}
		{{-- <a href="{{route('user-quit-membership')}}" class="list-group-item text-center">退会申請</a> --}}
		{{-- <a href="{{route('user-read-message')}}" class="list-group-item text-center">メッセージ</a> --}}
		<a href="{{route('user-withdrawal')}}" class="list-group-item text-center">退会申請
			{!! Route::currentRouteName()=='user-withdrawal'?'<i class="fa fa-angle-right angle" aria-hidden="true"></i>':'' !!}
		</a>
		<a href="{{route('user-logout')}}" class="list-group-item text-center">ログアウト</a>
	</div>
	<div>
		<select class="leftmenuarea_sm form-control">
			<option value="{{route('user-profile-update')}}" {{Route::currentRouteName()=='user-profile-update'?'selected':''}}>プロフィール編集</option>
			<option value="{{route('user-email-update')}}" {{Route::currentRouteName()=='user-email-update'?'selected':''}}>メールアドレス変更</option>
			<option value="{{route('user-change-password')}}" {{Route::currentRouteName()=='user-change-password'?'selected':''}}>パスワード変更</option>
			{{-- <option value="{{route('user-cards-list')}}" {{Route::currentRouteName()=='user-cards-list'?'selected':''}}>クレジットカード変更・確認</option> --}}
			<option value="{{route('user-shipping-address-update')}}" {{Route::currentRouteName()=='user-shipping-address-update'?'selected':''}}>配送先情報</option>
			{{-- <option value="{{route('user-social')}}" {{Route::currentRouteName()=='user-social'?'selected':''}}>ソーシャル連携</option> --}}
			{{-- <option value="{{route('user-quit-membership')}}" {{Route::currentRouteName()=='user-quit-membership'?'selected':''}}>退会申請</option> --}}
			{{-- <option value="{{route('user-read-message')}}" {{Route::currentRouteName()=='user-read-message'?'selected':''}}>メッセージ</option> --}}
			<option value="{{route('user-withdrawal')}}" {{Route::currentRouteName()=='user-withdrawal'?'selected':''}}>退会申請</option>
			<option value="{{route('user-logout')}}" {{Route::currentRouteName()=='user-logout'?'selected':''}}>ログアウト</option>
		</select>
	</div>
</div>
