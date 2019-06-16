<div class="modal fade" id="order1">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">

      <form action="{{route('user-order-shipping-info')}}">
      <input type="hidden" name="to_id" value="">
      <div class="modal-body row justify-content-center modal_body_area">
        <h6 class="modal-title px-3 col-9 font-weight-bold text-center">配送情報を入力してください。 </h6>
        <button type="button" class="close col-1 modal_close_btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        {{-- <div class="form-group col-md-12 mt-0 pt-0">
			       <label for=""></label>
			       <input class="form-control" type="hidden" name="name" value="{{Auth::user()->first_name.' '.Auth::user()->last_name}}" requried readonly>
		     </div> --}}
         <input type="hidden" name="id" value="" id="order_id1">
         <input type="hidden" name="detail_id" value="" id="order_detail_id1">
         <input type="hidden" name="status" value="" id="status1">



        <div class="form-group col-md-10 mt-5">
			       <label for="" style="font-size:15px;">伝票番号を入力してください</label>
			          <input class="form-control" name="document_number" placeholder="件名" required>
		     </div>
        <div class="form-group col-md-10">
			       <label for="" style="font-size:15px;">配送会社を選択してください</label>
             <input class="form-control" name="shipping_company" placeholder="件名" required>
    		</div>
    <div class="col-md-12">
      <h4 class="text-center"> <button type="submit" class="btn btn-dark">送信する</button></h4>

    </div>
      </div>
      {{-- <div class="modal-footer ">

        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button> --}}
  {{-- </div> --}}
      </form>
    </div>
  </div>
</div>
