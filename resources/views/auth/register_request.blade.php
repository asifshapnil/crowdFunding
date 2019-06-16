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
                    <h1><i class="fa fa-lock" aria-hidden="true"></i> 新規登録</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="auth_form_area">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-sm-12 bg-white area_auth">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 part_1">
                            <h2>メールアドレスで新規登録</h2>
                            @include('layouts.message')

                            <form class="form-horizontal" method="POST" action="">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">登録メールアドレス</label>

                                    <div>
                                        <input id="email" type="email" class="form-control required" name="email" value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-warning">
                                            認証メールを送信
                                        </button>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 20px;">
                                        <p>
                                            メールアドレスを入力し、「認証メールを送信」を押してください。確認メールをお送りいたします。メールに記載してあるURLより必要情報を入力し、新規登録を完了させてください。
                                        </p>
                                        <p>
                                            ※すでに新規登録がお済みの方は <a href="{{route('login')}}">こちら</a> よりログインしてください
                                        </p>
                                        <p>
                                            ※@road-frontier.comよりメールをお送りいたします。迷惑メール設定を行っている場合は、メールを受信できるよう設定を変更してください。
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 col-sm-12 part_2">
                            <h2>ソーシャルで新規登録</h2>

                            <div class="panel-body">
                                <a href="{{route('front-facebook')}}" class="btn btn-primary btn-lg btn-block facebook"><i class="fa fa-facebook"></i> Register With Facebook</a>
                                <a href="{{route('front-google')}}" class="btn btn-danger btn-lg btn-block google"><i class="fa fa-google"></i> Register With Google</a>
                                <a href="{{route('front-twitter')}}" class="btn btn-info btn-lg btn-block twitter"><i class="fa fa-twitter"></i> Register With Twitter</a>
                                <!-- <a href="{{route('front-yahoo')}}" class="btn btn-danger btn-lg btn-block"><i class="fa fa-yahoo"></i> Login With Yahoo</a> -->


                                 <p class="text-left" style="margin-top: 20px;">
                                     ソーシャルメディアにログイン後、新規登録フォームのメールアドレス欄に、ソーシャルメディアに登録しているメールアドレスが自動的に反映されます。その他の項目を入力し新規登録を完了させてください。
                                 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection

@section('custom_js')
    <script type="text/javascript" src="{{Request::root()}}/js/jquery.validate.min.js"></script>
@endsection