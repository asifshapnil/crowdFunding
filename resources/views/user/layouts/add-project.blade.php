{{-- <div class="modal fade" id="{{isset($message_modal_id)?$message_modal_id:'message'}}"> --}}
<div id="add-project" class="modal fade" role="dialog">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {{-- <div class="modal-header">
        <h5 class="modal-title">{{$owner->first_name.' '.$owner->last_name}} へのメッセージ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> --}}

        <div class="modal-body modal_body_area row">
          <div class="col-10 p-0">
            <h5 class="modal-title px-2"><span id="project_user_name"></span> Crofunポイントとは？</h5>

          </div>
          <button type="button" class="close col-2 modal_close_btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="row mt-3">
            <div class="col-md-12 p-0">
              <p class="px-4" style="font-size:14px;">Crofunポイントはプロジェクトを支援した支援者に貯まるポイントです。 <br>
              支援者は貯まったポイント数に応じてCrofunに登録されている様々な <br>
            商品と交換できます。起案者(あなた)にお支払いされる支援金は <br>
          [金額－Crofunポイント(1ポイント＝1円)] の残り金額がお支払いされます。 <br>
          </p>

            </div>
            <div class="col-md-12 p-0">
              <p class="px-4" style="font-size:12px;">
               例)金額3,000円、Crofunポイント 2,000ポイント ⇒ あなたが受け取る支援金 1,000円</p>
            </div>
          </div>
    <div class="col-md-12">
      <h4 class="text-center text-white"> <button type="submit" class="btn btn-dark text-white">閉じる</button></h4>

    </div>
      </div>
      {{-- <div class="modal-footer ">

        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button> --}}
  {{-- </div> --}}
    </div>
  </div>
</div>
