<?php
$categories = App\Models\ProjectCategory::where('status', 1)->get(); 
$Data = new App\Helpers\Data();
$sorts = $Data->sortCategories;
// dd($sorts);
?>

<ul class="right-menu list-unstyled">
	<li class="mt20 popular">ランキング(総合)
		<ul class="list-unstyled">
			<?php foreach($sorts as $s){?>
				<li><a href="{{route('front-project-list', ['c'=>'p','s'=>$s['value']])}}">>{{$s['name']}}</a></li>
			<?php }?>
		</ul>
	</li>

	<?php foreach($categories as $c){?>
	<li class="mt20 {{$c->categoryClass()}}">{{$c->name}}
		<ul class="list-unstyled">
			<?php foreach($sorts as $s){?>
				<li><a href="{{route('front-project-list', ['c'=>$c->id,'s'=>$s['value']])}}">>{{$s['name']}}</a></li>
			<?php }?>
		</ul>
	</li>
	<?php }?>
	
</ul>