@extends('front.layouts.main')

@section('custom_css')
	<style media="screen" type="text/css">
		.title:hover{
			color: #039AFF;
		}
		.category:hover{
			color: #039AFF;
		}


	</style>
@stop

@section('content')

	@include('front.layouts.banner')
	<section class="project_tabs">
		<div class="container">
			@include('front.layouts.tabs')
		</div>
	</section>

	<section class="project_sorting">
		<div class="container">
			<div class="row">
				<div class="col-md-3 offset-md-1 col-sm-12 search_area">
					@include('front.layouts.search')
				</div>
				<div class="col-md-2 offset-md-5 col-sm-12">
					@include('front.layouts.sort')
				</div>
			</div>
		</div>
	</section>

	<section class="project_list">
		<div class="container">
			<div class="row">
				<div class="col-md-10 offset-md-1 col-sm-12">
					<div class="row">
						@foreach($projects as $p)
							<div class="col-md-4">
								@include('front.layouts.project')
							</div>
						@endforeach
					</div>
					<div class="row text-center">
						{!! $projects->render(); !!}
					</div>

					{{-- <div class="row mt20 justify-content-center all_project_show" style="margin-bottom: 30px;">
						<div class="col">
							<a href="{{ route('front-project-list') }}" class="btn btn-primary pull-right">> もっと</a>
						</div>
					</div> --}}
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
