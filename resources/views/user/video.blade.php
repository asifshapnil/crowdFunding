@extends('user.layouts.main')

@section('custom_css')

	<link href="http://vjs.zencdn.net/6.4.0/video-js.css" rel="stylesheet">

  	<!-- If you'd like to support IE8 -->
  	<script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

	<style type="text/css">
		.wizard > .steps > ul > li {
		    width: 25%;
		}
		.amount{
			border: 1px solid black !important;
			padding: 5px;
		}
		.no-border{
			border: none;
		}
		.box{
			border: 1px solid black !important;
		}
		.padding{
			padding: 10px;
		}
		.hide{
			display: none;
		}
		.facebook{
        background-color: #3B5998;
      }
      .google{
        background-color: #d34836;
      }
      .twitter{
        background-color: #0084b4;
      }
      .video{
      	width: auto;
      	display: inline-block;
      	clear: both;
      }


      	/* Video.js Controls Style Overrides */
		.vjs-default-skin .vjs-progress-control,
		.vjs-default-skin .vjs-time-controls,
		.vjs-default-skin .vjs-time-divider,
		.vjs-default-skin .vjs-captions-button,
		.vjs-default-skin .vjs-mute-control,
		.vjs-default-skin .vjs-volume-control,
		.vjs-default-skin .vjs-fullscreen-control {
		    display: none;  
		}
	</style>
@stop


@section('ecommerce')
	
@stop

@section('content')


<div class="container" id="new-project">


<div class="mt20">
	<div class="row">
		<div class="col-md-3">
			@include('user.layouts.profile')
		</div>
		<div class="col-md-9">

			
			@include('layouts.message')

			<?php foreach($video as $v){?>
			<div class="video">
			<div class="card padding">
				<div class="card-title">{{$v->title}} <small>Watch full video to get {{$v->point}} P</small></div>
				<video id="my-video{{$v->id}}" class="video-js" controls preload="auto" width="640" height="264"
				  poster="" data-setup="{}">
				    <source src="{{Request::root()}}/uploads/videos/{{$v->file}}" type='video/mp4'>
				    <source src="{{Request::root()}}/uploads/videos/{{$v->file}}" type='video/webm'>
				    <p class="vjs-no-js">
				      To view this video please enable JavaScript, and consider upgrading to a web browser that
				      <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
				    </p>
				  </video>
			</div>
			</div>


			


			<?php }?>


			

			
			


		</div>
	</div>
	
</div>

</div>





@stop

@section('custom_js')

<script src="http://vjs.zencdn.net/6.4.0/video.js"></script>

<?php foreach($video as $v){?>
<script type="text/javascript">
	var video = videojs('my-video{{$v->id}}').ready(function(){
	  	var player = this;
	  	// player.bigPlayButton.show();
		player.on('play', function() {
	  		this.startTime = new Date();
	  	});
	  	player.on('ended', function() {
	  		console.log(new Date()-this.startTime);
	  		if(player.duration() <= (new Date()-this.startTime)/100){
	  			window.location.href = '{{Request::root()}}/user/video-watch/{{$v->id}}';
	  		}else{
	  			alert('full not showed');
	  		}
	  	});
	});
</script>
<?php }?>

@stop