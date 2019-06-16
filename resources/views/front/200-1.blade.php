@extends('front.layouts.main')

@section('custom_css')
@stop

@section('content')

	@include('front.layouts.banner')
	<section class="project_tabs">
		<div class="container">
			@include('front.layouts.tabs1')
		</div>
	</section>

	<section class="project_sorting">
		<div class="container">
			<div class="row">
				<div class="col-2 offset-md-1">
					@include('front.layouts.search')
				</div>
				<div class="col-2 offset-md-6">
					@include('front.layouts.sort')
				</div>
			</div>
		</div>
	</section>

	<section class="project_list">
		<div class="container">
			<div class="row">
				<div class="col-10 offset-md-1">
					<div class="row">
						@foreach($projects as $p)
							@include('front.layouts.project')
						@endforeach
					</div>
					<div class="row mt20">
						<div class="col">
							<a href="#" class="btn btn-primary pull-right">> もっと</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@stop

@section('custom_js')
	@yield('sort_js')
	<script type="text/javascript">
		$('.banner_slider').slick({
		  centerMode: true,
		  centerPadding: '60px',
		  slidesToShow: 1,
		  responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        arrows: false,
		        centerMode: true,
		        centerPadding: '40px',
		        slidesToShow: 3
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        arrows: false,
		        centerMode: true,
		        centerPadding: '40px',
		        slidesToShow: 1
		      }
		    }
		  ]
		});
	</script>
@stop
