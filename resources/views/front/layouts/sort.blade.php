<?php
$Data = new App\Helpers\Data();
$sorts = $Data->projectSortCategories;
// dd($sorts);
?>

<select class="form-control sort" name="s">
	<option value="0">選択</option>
	<?php foreach($sorts as $s){?>
		<option value="{{$s['value']}}" {{Request::get('s') == $s['value']? 'selected' : ''}}>{{$s['name']}}</option>
	<?php }?>
</select>


@section('sort_js')
	<script type="text/javascript">
		$(function(){
			$('.sort').on('change', function(){
				var url = new URL(window.location.href);
	            var searchParams = new URLSearchParams(url.search.slice(1));

				searchParams.delete('s');
				searchParams.append('s', $(this).val());
				// alert(searchParams.toString());
				document.location.replace('?'+searchParams.toString());
			})
		})
	</script>
@stop
