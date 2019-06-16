@extends('user.layouts.email')

@section('custom_css')
<style type="text/css">
	@include('user.email.bootstrap')
</style>

@stop

@section('content')


<div class="card">

<p class="text-bold">
仮登録ありがとうございます。
<br>
下記URLよりログインしていただき、会員登録を続けて下さい。
<br>
<i><a href="{{$data['root']}}/register/{{$data['register_token']}}">
	{{$data['root']}}/register/{{$data['register_token']}}
</a></i>
<br>
<br>
or
<br>
<br>
※URL発行後24時間以上が経過すると、上記URLは無効になります。
　お手数をおかけいたしますが、仮登録を再度行ってください。
<br>
<!-- <i>{{$data['root']}}/register/{{$data['register_token']}}</i> -->
<br>
<br>

</p>

</div>


@stop

@section('custom_js')
@stop