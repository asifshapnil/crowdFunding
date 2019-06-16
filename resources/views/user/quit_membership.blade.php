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
						@include('layouts.message')
						<div class="row ml-md-1 well">
							<div class="col-md-12">
								<h4 class="py-2">退会申請</h4>
								<p>いつもcrofun.jpをご利用いただき、誠にありがとうございます。
									退会の手続きを行う場合は、下記事項を必ずご確認ください。
									まずは退会申請を行ってください。
									申請後、内容に問題がなければ10日前後で退会完了となります。
									退会が完了するとログインすることができなくなりますので、 「プロジェクトの作成」
									「プロジェクトの支援」「メッセージ」など、ログインを必要とする機能は利用不可となります。
									また、一度登録したことがあるメールアドレスは、退会後に再登録することはできません。
									間違えて退会申請をされてしまった場合、退会完了前であれば退会申請をキャンセルすることができます。
									退会申請キャンセルの旨をお問合せよりご連絡ください。
								</p>
								<p>プロジェクト起案者として利用している方
									プロジェクトを作成したことがある、終了していないプロジェクトがあるクリエイターは、
									原則として退会することができません。
									やむおえない理由で退会をす場合は、退会申請の理由を明確に入力し、申請してください。
									成功したプロジェクトがある場合は、そのプロジェクトのクリエイターとしての情報は
									削除されませんのでご了承ください。
								</p>
								<p>支援者として利用している方
									現在支援しているプロジェクトがないかどうか、支援プロジェクトの一覧をご確認ください。
									プロジェクトの支援中に退会を行っても、支援はキャンセルされませんのでご注意ください。
									また、支援した成功プロジェクトのリターン受け取り前に退会を行った場合は、リターンを
									受け取れない場合がございますのでご了承ください。
									退会後、コメント欄のユーザー名と写真は削除されますが、支援コメントは残ります。
								</p>
								<p>crofun.fun に関してご不満・ご不明点がある場合はお問合せよりご連絡ください。</p>
							</div>
						</div>
						<div class="row p-5">
							<div class="col-md-12 col-12">
								<h4 class="text-center"><a href="#" class="btn btn-md btn-bottom">退会申請</a></h4>
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
@stop
