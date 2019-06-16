<div class="modal fade" style="width:400px; margin:0 auto;" id="order2">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      {{-- <div class="modal-header">
        <h5 class="modal-title">{{$owner->first_name.' '.$owner->last_name}} へのメッセージ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> --}}
      <form action="{{route('user-order-cancel')}}">
      <input type="hidden" name="to_id" value="">
      <input type="hidden" name="id" value="" id="order_id2">
      <input type="hidden" name="detail_id" value="" id="order_detail_id2">
      <input type="hidden" name="status" value="" id="status2">

      <div class="modal-body modal_body_area row justify-content-center">
        <h6 class="modal-title px-3 col-8"> キャンセルしますか？ </h6>
        <button type="button" class="close col-2 modal_close_btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <p class="col-12 mb-0 pb-0  mt-5" style="font-size:15px;">キャンセルする場合は必ず発注者へ メッセージを送信してキャンセルしてください。 キャンセルすると取引を再開できませんので ご注</p>
        {{-- <div class="form-group col-md-12 mt-0 pt-0">
			     <input class="form-control" type="hidden" name="name" value="{{Auth::user()->first_name.' '.Auth::user()->last_name}}" requried readonly>
		     </div> --}}
        {{-- <div class="form-group col-md-12">
			       <label for="">メッセージ</label>
			          <input class="form-control" name="subject" placeholder="件名" required>
		     </div> --}}
        <div class="form-group col-md-12 mt-3">
			       <label for="" style="font-size:15px;">内容</label>
             <textarea name="cancel_content" rows="4" cols="80" class="form-control" placeholder="内容"></textarea>
    		</div>
    <div class="col-md-12">
      <h4 class="text-center"> <button type="submit" class="btn btn-dark">キャンセルする</button></h4>

    </div>
      </div>
      {{-- <div class="modal-footer ">

        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button> --}}
  {{-- </div> --}}
      </form>
    </div>
  </div>
</div>
