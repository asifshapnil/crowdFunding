{{-- <div class="modal fade" id="{{isset($message_modal_id)?$message_modal_id:'message'}}"> --}}
<div id="send-message" class="modal fade" role="dialog">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {{-- <div class="modal-header">
        <h5 class="modal-title">{{$owner->first_name.' '.$owner->last_name}} へのメッセージ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> --}}
      <form action="{{route('user-send-message')}}">
        <input type="hidden" name="to_id" value="" id="to_id">
        <div class="modal-body modal_body_area row">
          <h5 class="modal-title px-3 col-10"><span id=""></span> プロジェクト起案者へメッセージ</h5>
          <button type="button" class="close col-2 modal_close_btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <p class="col-12 mb-0 pb-0" id="get_vendor_name"></p>
          <div class="form-group col-md-12 mt-0 pt-0">
			         {{-- <label for="">宛先</label> --}}
			     <input class="form-control" type="hidden" name="name" value="{{ Auth::user()->first_name.' '.Auth::user()->last_name }}" requried readonly>
		     </div>
        <div class="form-group col-md-12">
			       <label for="">件名</label>
			          <input class="form-control" name="subject" placeholder="件名" required>
		     </div>
        <div class="form-group col-md-12">
			       <label for="">内容</label>
             <textarea name="message" rows="4" cols="80" class="form-control" placeholder="内容"></textarea>
    		</div>
    <div class="col-md-12">
      <h4 class="text-center text-white"> <button type="submit" class="btn btn-dark text-white">メッセージ送信</button></h4>

    </div>
      </div>
      {{-- <div class="modal-footer ">

        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button> --}}
  {{-- </div> --}}
      </form>
    </div>
  </div>
</div>
