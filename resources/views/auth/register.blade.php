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
                <div class="col-10 offset-md-1 bg-white area_auth">
                    <div class="row">
                        <div class="col-6 part_1">
                            <h2>新規登録フォーム</h2>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form class="form-horizontal" method="POST" action="">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <label for="first_name" class="control-label">名</label>

                                    <div>
                                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>

                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <label for="last_name" class="control-label">姓</label>

                                    <div>
                                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>

                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">メールアドレス</label>

                                    <div>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="control-label">パスワード <span id="errors_pass"></span> </label>

                                    <div>
                                        <input id="password" type="password" class="form-control"  name="password" value="" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password_confirmation" class="control-label">パスワード確認</label>

                                    <div>
                                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="{{ $user->password_confirmation }}" required>

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary" id="submit">
                                            <b>新規登録する ></b>
                                        </button>
                                    </div>
                                    <!-- <div class="col-md-12 text-center">

                                        <a class="btn btn-link" href="{{ route('login') }}">
                                            Login To Your Account
                                        </a>
                                    </div> -->
                                    <!-- <div class="col-md-12">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div> -->
                                </div>
                            </form>
                        </div>
                        <div class="col-6 part_2">
                            <h2>ソーシャルで新規登録</h2>

                            <div class="panel-body">
                                <a href="{{route('front-facebook')}}" class="btn btn-primary btn-lg btn-block facebook btn-no-border-radius"><i class="fa fa-facebook"></i> Register With Facebook</a>
                                <a href="{{route('front-google')}}" class="btn btn-danger btn-lg btn-block google btn-no-border-radius"><i class="fa fa-google"></i> Register With Google</a>
                                <a href="{{route('front-twitter')}}" class="btn btn-info btn-lg btn-block twitter btn-no-border-radius"><i class="fa fa-twitter"></i> Register With Twitter</a>
                                <!-- <a href="{{route('front-yahoo')}}" class="btn btn-danger btn-lg btn-block"><i class="fa fa-yahoo"></i> Login With Yahoo</a> -->
                                <p class="text-left" style="margin-top: 20px;">
                                    ソーシャルメディアにログイン後、新規登録フォームのメールアドレス欄に、ソーシャルメディアに登録しているメールアドレスが自動的に反映されます。 その他の項目を入力し新規登録を完了させてください。
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
    <script type="text/javascript">
        $(document).ready(functioon(){
            $(document).on('click', '#submit', function(){

                function validPassword(password) {
                    let errors = '';
                    let flag = null;
                    //password < 8
                    if (password.length < 8 ) {
                        errors = "Passwords must be at least 8 characters";
                        flag = 1;
                    }
                    //password has number and chars
                    else if (!password.match(/([a-zA-Z])/)) {
                            errors = "Passwords must contain at least one letter";
                            flag = 1;
                    }
                    else if (!password.match(/([0-9])/)) {
                        errors = "Passwords must contain at least one number";
                        flag = 1;
                    }
                    else if (!password.match(/([!,@,#,$,%,^,&,*,?,_,~])/)){
                        errors = "Passwords must contain at least one symbol";
                        flag = 1;
                    }
                    else if (!password.match(/([A-Z])/)) {
                        errors = "Passwords must contain at least one capitalized letter";
                        flag = 1;
                    }
                    if(flag == 1) {
                        $('#errors_pass').html(errors);
                        alert('fdssd');
                        return false;
                    } else {
                        return '';
                    }
                }

                var password = $('#password').val();
                validPassword(password);
            });
        });
    </script>
@endsection