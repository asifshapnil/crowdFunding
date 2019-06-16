<?php
$Data = new App\Helpers\Data();
$prefectures = $Data->prefectures;
// dd($sorts);
?>

<select class="form-control required" name="prefectures">
	<option>選択</option>
	<?php foreach($prefectures as $p){?>
		<option value="{{$p['value']}}" {{ isset($user->shipping_prefecture) && $user->shipping_prefecture == $p['value'] ? 'selected' : '' }}>{{$p['name']}}</option>
	<?php }?>
</select>


@section('sort_js')

@stop
