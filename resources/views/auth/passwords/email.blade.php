@extends('user.layouts.auth')

@section('content')
<style type="text/css">
    .norightborder:after{
        display: none !important;
    }
</style>
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
                    <h1><i class="fa fa-lock" aria-hidden="true"></i> パスワードリマインダー</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="auth_form_area">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-sm-12 bg-white area_auth">
                    <div class="row">
                        <div class="col-md-8 offset-md-2 col-sm-12 part_1 norightborder">
                            <h2>パスワード再設定用URLの送信</h2>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">登録メールアドレス</label>

                                    <div>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                                            送信する &nbsp;&nbsp;&nbsp; >
                                        </button>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <br>
                                        <p>パスワードを忘れた方は、上記のフォームにメールアドレスを入力して「送信」を押してください。 入力したメールアドレスにパスワード再設定用のURLをメールで送信します。</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
