@extends('front.layouts.main')

@section('custom_css')
@stop

@section('content')



<div class="row breadcrump p-0 m-0 project_sorting">
	<div class="col-md-6 col-sm-12">
		<div class="offset-1">
			<div class="row">
				<div class="container">
					<div class="col-md-10 col-12 offset-md-1">
						<ul class="list-inline project_category_data pt-4">
							<li class="list-inline-item">TOP &gt; {{ isset($content->title) ? $content->title : '' }}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="mt20"></div>
	<div class="row">
		<div class="col-10 offset-md-1">
			<h3>{{  isset($content->title) ? $content->title : '' }}</h3>
			<p>
				{!!  html_entity_decode($content->description) !!}
			</p>
		</div>
	</div>
</div>

@stop

@section('custom_js')
@stop






