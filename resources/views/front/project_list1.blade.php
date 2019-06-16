@extends('front.layouts.main')

@section('custom_css')
@stop

@section('content')


<div class="container">

<div class="mt20">
	<div class="row justify-content-center">
		<div class="col-md-10">
			@include('front.layouts.project-list-tabs')
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="popular">
					<div class="row mt-4 mb-4">
						<div class="col-md-3 offset-md-0">
							<span>すべてのプロジェクト  182件</span>
						</div>
						<div class="col-md-2 offset-md-7">
							@include('front.layouts.sort')

						</div>
					</div>
					<div class="row projects">
					<?php
					$col = 3;
					foreach($projects as $p){?>
						@include('front.layouts.project')
					<?php }?>
					</div>

				</div>

			</div>
		</div>

		{{-- <div class="col-md-2 mt50">
			@include('front.layouts.right_menu')
		</div> --}}
	</div>

</div>

</div>


@stop

@section('custom_js')
@yield('sort_js')
@stop
