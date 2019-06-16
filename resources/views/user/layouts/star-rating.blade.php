<style type="text/css">
  .start_rating_modal{
    padding: 25px;
    width: 100%;
    margin-left: 0px;
  }
  .close_btn{
    background-color: #b1afaf !important;
    position: absolute;
    top: -16px;
    right: -14px;
    width: 30px;
    height: 30px;
    color: #ffffff;
    border-radius: 25px;
    font-size: 25px;
  }
  .start_rating_modal .modal-title{
    flex: none !important;
    width: 100% !important;
    max-width: 100% !important;
    padding: 0px !important;
  }
  .starrating{
    padding: 0px;
    margin-top: 20px;
    margin-bottom: 20px;
  }
  .starrating_group{
    width: 100%;
  }
  .starrating_group button{
    padding-left: 30px;
    padding-right: 30px;
  }
  .pl0{
    padding-left: 0px;
  }
  .pr0{
    padding-right: 0px;
  }
</style>
<div class="modal" id="star">
  <div class="modal-dialog">
    <div class="modal-content">
      {{-- <form action="{{route('user-product-rating')}}" method="post" class="p-0 m-0"> --}}
        {!! Form::open(['route'=>'user-product-rating', 'method' =>'post']) !!}
        {{-- {{ csrf_token() }} --}}
      <div class="modal-body modal_body_area row justify-content-center start_rating_modal">
          <input type="hidden" name="user_rating" value="" id="get_rating">
          <input type="hidden" name="product_id" value="" id="get_product_id">
          <input type="hidden" name="my_rate" value="" id="get_my_rate">

        <h5 class="modal-title px-3 col-10">レビューを送信する</h5>
        <button type="button" class="close col-2 modal_close_btn close_btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="col-12 starrating">
          <div class="btn-group starrating_group" role="group" aria-label="Basic example">
            <button type="button" id="one" class="btn btn-secondary btn-warning rating" data-rating = '1'>1 <span class="fa fa-star"></span></button>
            <button type="button" id="two" class="btn btn-secondary btn-warning rating" data-rating = '2'>2 <span class="fa fa-star"></span></button>
            <button type="button" id="three" class="btn btn-secondary btn-warning rating" data-rating = '3'>3 <span class="fa fa-star"></span></button>
            <button type="button" id="four" class="btn btn-secondary btn-warning rating" data-rating = '4'>4 <span class="fa fa-star"></span></button>
            <button type="button" id="five" class="btn btn-secondary btn-warning rating" data-rating = '5'>5 <span class="fa fa-star"></span></button>
          </div>
        </div>
        <div class="col-md-6 pl0">
            <button type="submit" class="p-2 text-white btn btn-md btn-block font-weight-bold btn-warning">レビュー送信 ></button>
        </div>
        <div class="col-md-6 pr0">
            <button type="button"  data-dismiss="modal" aria-label="Close" class="p-2 text-white btn btn-md btn-block font-weight-bold">キャンセル ></button>
        </div>

     </div>
   {{-- </form> --}}
   {!! Form::close() !!}
   </div>
 </div>
</div>
