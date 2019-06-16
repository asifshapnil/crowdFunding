@extends('front.layouts.main')

@section('custom_css')
@stop

@section('content')


<div class="container">

	<iframe src="{{$iframeUrl}}" class="mt50" width="100%" style="height:100vh;border:none;"></iframe>

</div>

@stop

@section('custom_js')
@stop