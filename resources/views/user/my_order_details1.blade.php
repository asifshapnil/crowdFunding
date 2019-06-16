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
  select.color1, option.color1{
    color: #FF391A;
  }
  select.color2, option.color2{
    color: #FFBC00;
  }
  select.color3, option.color3{
    color: #6BB82D;
  }
  select.color4, option.color4{
    color: #4B4B4B;
  }
	</style>
@stop


@section('ecommerce')

@stop

@section('content')


@include('user.layouts.tab')


<div class="container">
  <div class="row">
    <div class="col-12 col-md-10 offset-md-1">


      <div class="mt20">
      	<div class="row">
      		<div class="col-md-3">
      			@include('user.layouts.profile')
      		</div>
      		<div class="col-md-9">
      			{{-- @include('user.layouts.tab') --}}


      			{{-- @include('user.layouts.message_modal') --}}
                <div class="row ml-md-1 well">
                  <div class="col-md-12 col-12">
                    <div class="row">
                      <?php
                          $class_data = 'color1';
                      ?>
                      <div class="col-2"><p>対応状況</p></div>
                      <div class="col-3">
                        <select class="form-control order_actions {{ $class_data }}">
                          <option datahref="#" class="color1" value="1">新規受注</option>
                          <option datahref="#" class="color2" value="2">配送準備中</option>
                          <option datahref="#" class="color3" value="3">配送済み</option>
                          <option datahref="#" class="color4" value="4">キャンセル</option>
                        </select>
                      </div>
                      <div class="col-7">
                        <span class="pull-right"><a href=""><i class="fa fa-print" style="font-size: 35px; color: #000000;"></i></a></span>
                      </div>
                    </div>

                    <div class="row inner mt-5">
                      <div class="col-md-2 col-4 bg-dark">
                        <p class="pt-3 ">購入金額</p>
                      </div>
                      <div class="col-md-2 col-3 border">
                        <p class="pt-3"> 191,870 </p>

                      </div>
                    </div>

                    <div class="row inner mt-2">
                      <div class="col-md-2 col-3 bg-dark">
                        <p class="pt-3 ">注文ID </p>
                      </div>
                      <div class="col-md-4 col-3 border">
                        <p class="pt-3">201807220759350000100026</p>

                      </div>
                        <div class="col-md-2 col-3 bg-dark">
                          <p class="pt-3 ">配送会社</p>
                        </div>
                        <div class="col-md-4 col-3 border">
                          <p class="pt-3">ヤマト運輸</p>

                        </div>
                    </div>
                    <div class="row inner mb-5">
                      <div class="col-md-2 col-3 bg-dark">
                        <p class="pt-3 ">氏名</p>
                      </div>
                      <div class="col-md-4 col-3 border">
                        <p class="pt-3">名</p>

                      </div>
                        <div class="col-md-2 col-3 bg-dark">
                          <p class="pt-3 ">氏名</p>
                        </div>
                        <div class="col-md-4 col-3 border">
                          <p class="pt-3">名</p>
                        </div>
                    </div>

                    <div class="row inner mt-5">

                      <div class="table table-responsive col-lg-12 p-md-1 mt-5">
                        <table class="table">
                          <tr class="bg-dark">
                            <td class="text-center">商品ID</td>
                            <td class="text-center">商品名</td>
                            <td class="text-center">色</td>
                            <td class="text-center">サイズ</td>
                            <td class="text-center">価格</td>
                            <td class="text-center">個数</td>
                            <td class="text-center">小計</td>

                          </tr>
                          <tr class=" table-bordered">
                            <td class="text-center">0000001</td>
                            <td class="text-center">１２３４５６７８９１２３４５６</td>
                            <td class="text-center">白</td>
                            <td class="text-center">L</td>
                            <td class="text-center">5,000</td>
                            <td class="text-center">1</td>
                            <td class="text-center">5,000</td>
                          </tr>
                          <tr class=" table-bordered">
                            <td class="text-center">0000001</td>
                            <td class="text-center">１２３４５６７８９１２３４５６</td>
                            <td class="text-center">白</td>
                            <td class="text-center">L</td>
                            <td class="text-center">5,000</td>
                            <td class="text-center">1</td>
                            <td class="text-center">5,000</td>
                          </tr>
                          <tr class="">
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center bg-dark table-bordered">合計</td>
                            <td class="text-center table-bordered">10,000</td>
                          </tr>
                        </table>
                      </div>


                    </div>

                    <div class="row mt-5">
                      <h4 class="col-md-2 col-4 p-0 m-0">配送先</h4>
                    </div>
                    <div class="row inner mt-3">
                      <div class="col-md-2 col-3 bg-dark">
                        <p class="pt-3 ">氏名</p>
                      </div>
                      <div class="col-md-10 col-8 border">
                        <p class="pt-3">桜井 &nbsp;　由紀</p>
                      </div>
                    </div>
                    <div class="row inner">
                      <div class="col-md-2 col-3 bg-dark">
                        <p class="pt-3 ">フリガナ</p>
                      </div>
                      <div class="col-md-10 col-8 border">
                        <p class="pt-3">サクライ &nbsp; ユキ</p>
                      </div>
                    </div>
                    <div class="row inner">
                      <div class="col-md-2 col-3 bg-dark">
                        <p class="pt-3 ">電話番号</p>
                      </div>
                      <div class="col-md-10 col-8 border">
                        <p class="pt-3"> 09021123455</p>
                      </div>
                    </div>
                    <div class="row inner">
                      <div class="col-md-2 col-3 bg-dark">
                        <p class="pt-3 ">郵便番号</p>
                      </div>
                      <div class="col-md-10 col-8 border">
                        <p class="pt-3"> 2710073</p>
                      </div>
                    </div>
                    <div class="row inner">
                      <div class="col-md-2 col-3 bg-dark">
                        <p class="pt-3 "> 都道府県</p>
                      </div>
                      <div class="col-md-10 col-8 border">
                        <p class="pt-3">  千葉県</p>
                      </div>
                    </div>
                    <div class="row inner">
                      <div class="col-md-2 col-3 bg-dark">
                        <p class="pt-3 "> 住所</p>
                      </div>
                      <div class="col-md-10 col-8 border">
                        <p class="pt-3">  松戸市小根本331 小根本コンド101</p>
                      </div>
                    </div>


                    <div class="row mt-5">
                      <h4 class="col-md-2 col-6 p-0 m-0">注文者情報</h4>
                    </div>
                    <div class="row inner mt-3">
                      <div class="col-md-2 col-3 bg-dark">
                        <p class="pt-3 ">氏名</p>
                      </div>
                      <div class="col-md-10 col-8 border">
                        <p class="pt-3">斎藤 雄介</p>
                      </div>
                    </div>
                    <div class="row inner">
                      <div class="col-md-2 col-3 bg-dark">
                        <p class="pt-3 ">フリガナ</p>
                      </div>
                      <div class="col-md-10 col-8 border">
                        <p class="pt-3"> サイトウ ユウスケ</p>
                      </div>
                    </div>
                    <div class="row inner">
                      <div class="col-md-2 col-3 bg-dark">
                        <p class="pt-3 "> メールアドレス</p>
                      </div>
                      <div class="col-md-10 col-8 border">
                        <p class="pt-3"> saitoy33@gmail..com </p>
                      </div>
                    </div>
                    <div class="row inner">
                      <div class="col-md-2 col-3 bg-dark">
                        <p class="pt-3 ">電話番号</p>
                      </div>
                      <div class="col-md-10 col-8 border">
                        <p class="pt-3"> 1010031</p>
                      </div>
                    </div>
                    <div class="row inner">
                      <div class="col-md-2 col-3 bg-dark">
                        <p class="pt-3 "> 都道府県</p>
                      </div>
                      <div class="col-md-10 col-8 border">
                        <p class="pt-3">   東京都 </p>
                      </div>
                    </div>
                    <div class="row inner">
                      <div class="col-md-2 col-3 bg-dark">
                        <p class="pt-3 "> 住所</p>
                      </div>
                      <div class="col-md-10 col-8 border">
                        <p class="pt-3">  松戸市小根本331 小根本コンド101</p>
                      </div>
                    </div>

                    <div class="row mt-5">
                      <h4 class="col-md-2 col-6 p-0 m-0">注文者情報</h4>
                    </div>
                    <div class="row inner mt-3">
                      <div class="col-md-2 col-3 bg-dark">
                        <p class="pt-3 ">支払情報</p>
                      </div>
                      <div class="col-md-10 col-8 border">
                        <p class="pt-3">入金準備中</p>
                      </div>
                    </div>
                    <div class="row inner">
                      <div class="col-md-2 col-3 bg-dark">
                        <p class="pt-3 ">入金予定日</p>
                      </div>
                      <div class="col-md-10 col-8 border">
                        <p class="pt-3"> 2018/09/30 </p>
                      </div>
                    </div>
                    <div class="row inner">
                      <div class="col-md-2 col-3 bg-dark">
                        <p class="pt-3 "> 入金金額</p>
                      </div>
                      <div class="col-md-10 col-8 border">
                        <p class="pt-3"> ￥ 8,000 </p>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="row p-5">
                  <div class="col-md-12 col-12">
                    <h4 class="text-center">	<a href="{{route('101.2')}}" class="btn btn-md btn-bottom">< &nbsp;&nbsp; 戻 る</a></h4>

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
