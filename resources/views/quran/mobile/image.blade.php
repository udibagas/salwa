@extends('quran.mobile.layout')

@section('title', 'Quran')

@section('content')
	<div id="post-list">
		<img src="/quran_image/page{{ sprintf("%03d", $page) }}.png" class="img-responsive" alt="" />
	</div>
@stop
