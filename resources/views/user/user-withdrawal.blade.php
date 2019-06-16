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
						<h4><strong>会申請</strong></h4><br>
						<p>
							いつもcrofun.jpをご利用いただき、誠にありがとうございます。 <br>
							退会の手続きを行う場合は、下記事項を必ずご確認ください。 <br>
							まずは退会申請を行ってください。 <br>
							申請後、内容に問題がなければ10日前後で退会完了となります。 <br>
							退会が完了するとログインすることができなくなりますので、 「プロジェクトの作成」 <br>
							「プロジェクトの支援」「メッセージ」など、ログインを必要とする機能は利用不可となります。 <br>
							また、一度登録したことがあるメールアドレスは、退会後に再登録することはできません。 <br>
							間違えて退会申請をされてしまった場合、退会完了前であれば退会申請をキャンセルすることができます。 <br>
							退会申請キャンセルの旨をお問合せよりご連絡ください。
						</p> <br>
						<p>
							<b>プロジェクト起案者として利用している方</b> <br>
							プロジェクトを作成したことがある、終了していないプロジェクトがあるクリエイターは、 <br>
							原則として退会することができません。 <br>
							やむおえない理由で退会をす場合は、退会申請の理由を明確に入力し、申請してください。 <br>
							成功したプロジェクトがある場合は、そのプロジェクトのクリエイターとしての情報は <br>
							削除されませんのでご了承ください。
						</p> <br>
						<p>
							<b>支援者として利用している方</b> <br>
							現在支援しているプロジェクトがないかどうか、支援プロジェクトの一覧をご確認ください。 <br>
							プロジェクトの支援中に退会を行っても、支援はキャンセルされませんのでご注意ください。 <br>
							また、支援した成功プロジェクトのリターン受け取り前に退会を行った場合は、リターンを <br>
							受け取れない場合がございますのでご了承ください。 <br>
							退会後、コメント欄のユーザー名と写真は削除されますが、支援コメントは残ります。 <br> <br>
							crofun.fun に関してご不満・ご不明点がある場合はお問合せよりご連絡ください。
						</p> <br>


							<h4 class="text-center"><a href="{{route('user-withdrawal2')}}" class="btn btn-md btn-bottom">退会申請</a></h4>


						{{-- <div class="row">
							hello lorem ispom
						</div> --}}

					</div>
				</div>

			</div>

		</div>
	</div>
</div>





@stop

@section('custom_js')

@stop
