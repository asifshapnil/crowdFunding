<div class="modal fade" id="{{isset($rank_modal_id)?$rank_modal_id:'rank'}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Rank This Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('user-send-rank')}}">
      <input type="hidden" name="product_id" value="{{$p->id}}">	
      <div class="modal-body text-center">
          <?php $rank = 5; if(isset($p->rank->rank)) $rank = $p->rank->rank;?>
        	<div class="btn-group" data-toggle="buttons">
    			  <label class="btn btn-warning {{$rank == 1 || $rank == ''?'active':''}}">
    			    <input type="radio" name="rank" value="1" id="option1" autocomplete="off" checked {{$rank == 1 || $rank == ''?'checked':''}}> 1★
    			  </label>
    			  <label class="btn btn-warning {{$rank == 2?'active':''}}">
    			    <input type="radio" name="rank" value="2" id="option2" autocomplete="off" {{$rank == 2?'checked':''}}> 2★
    			  </label>
    			  <label class="btn btn-warning {{$rank == 3?'active':''}}">
    			    <input type="radio" name="rank" value="3" id="option3" autocomplete="off" {{$rank == 3?'checked':''}}> 3★
    			  </label>
    			  <label class="btn btn-warning {{$rank == 4?'active':''}}">
    			    <input type="radio" name="rank" value="4" id="option3" autocomplete="off" {{$rank == 4?'checked':''}}> 4★
    			  </label>
    			  <label class="btn btn-warning {{$rank == 5?'active':''}}">
    			    <input type="radio" name="rank" value="5" id="option3" autocomplete="off" {{$rank == 5?'checked':''}}> 5★
    			  </label>
    			</div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning">メッセージ送信</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
      </div>
      </form>
    </div>
  </div>
</div>