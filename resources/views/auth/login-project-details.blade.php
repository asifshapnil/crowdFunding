@extends('user.layouts.auth')

@section('content')

<div class="auth_area">
    <header class="front_header">
        <div class="container">
            <div class="row">
                <div class="col-10 offset-md-1">
                    <a href="{{route('front-home')}}" class="logo_area"><img height="50px" src="{{Request::root()}}/assets/front/img/logo.png"></a>
                </div>
            </div>
        </div>
    </header>

    <section class="auth_page_title">
        <div class="container">
            <div class="row">
                <div class="col-10 offset-md-1">
                    <h1><i class="fa fa-lock" aria-hidden="true"></i> {{ __('user.login_main_title') }}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="auth_form_area">
        <div class="container">
            <div class="row">
                <div class="col-10 offset-md-1 bg-white area_auth">
                    <div class="row">
                        <div class="col-6 part_1">
                            <h2>{{ __('user.login_left_title') }}</h2>
                            <form class="form-horizontal" method="POST" action="">
                                {{ csrf_field() }}

                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">登録メールアドレス</label>

                                    <div>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="control-label">パスワード</label>

                                    <div>
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> &nbsp;&nbsp; 次回から自動的にログイン
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">
                                            ログイン &nbsp;&nbsp;&nbsp; >
                                        </button>
                                    </div>
                                    <div class="col-md-12 text-center">

                                        <a class="btn btn-link" href="{{ route('password.request') }}" style="padding-bottom: 0px; margin-top: 20px;">
                                            パスワードをお忘れの方
                                        </a>
                                    </div>
                                    <div class="col-md-12 text-center">

                                        ※ 新規登録がお済みでない方は<a class="btn btn-link" href="{{ route('user-register-request') }}">こちら</a>から登録（無料）してください。

                                    </div>
                                    <!-- <div class="col-md-12 text-center">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit
                                    </div> -->
                                </div>
                            </form>
                        </div>
                        <div class="col-6 part_2">
                            <h2>ソーシャルメディアでログイン</h2>

                            <div class="panel-body">
                                <a href="{{route('front-facebook')}}" class="btn btn-primary btn-lg btn-block facebook"><i class="fa fa-facebook"></i> Login With Facebook</a>
                                <a href="{{route('front-google')}}" class="btn btn-danger btn-lg btn-block google"><i class="fa fa-google"></i> Login With Google</a>
                                <a href="{{route('front-twitter')}}" class="btn btn-info btn-lg btn-block twitter"><i class="fa fa-twitter"></i> Login With Twitter</a>
                                <!-- <a href="{{route('front-yahoo')}}" class="btn btn-danger btn-lg btn-block"><i class="fa fa-yahoo"></i> Login With Yahoo</a> -->

                                <p style="margin-top: 20px;">※ ログイン後、自動的にサイトに移動します。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
