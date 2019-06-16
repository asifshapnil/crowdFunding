@extends('user.layouts.email')

@section('custom_css')
@stop

@section('content')


<div class="well">

<p class="text-bold">
     From: {{ $data['name']}}

<br>
     User emaail: {{ $data['user_email'] }}
<br>
    Details :{{ $data['details'] }}
</p>

</div>


@stop

@section('custom_js')
@stop