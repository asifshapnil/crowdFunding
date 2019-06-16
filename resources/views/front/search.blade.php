@extends('front.layouts.main')

@section('custom_css')
@stop

@section('content')


<div class="container">

		@include('front.layouts.search')
	
<div class="mt20">
	<div class="row">
		<div class="col-md-10">
			<div class="tab-content">
				<div class="tab-pane active" id="popular">
					@include('front.layouts.sort')
					<div class="row mt20 projects">
					<?php
					$col = 3; 
					foreach($projects as $p){?>
						<div class="col-md-4">
							@include('front.layouts.project')
						</div>	
					<?php }?>
					</div>

				</div>
				
			</div>
		</div>

		<div class="col-md-2 mt50">
			@include('front.layouts.right_menu')
		</div>
	</div>
	
</div>

</div>


@stop

@section('custom_js')
@yield('sort_js')
@stop