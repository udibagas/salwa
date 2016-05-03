@extends('layouts.main')

@section('slider')
	@include('home.slider-ori')
@stop

@section('content')

	<ul class="link-icon text-center">
		<li><a href="/kitab"><i class="fa fa-book"></i><br />Kitab &amp; Terjemahan</a></li>
		<li><a href="/doa"><i class="fa fa-heartbeat"></i><br />Do'a</a></li>
		<li><a href="/dzikir"><i class="fa fa-hand-stop-o"></i><br />Dzikir</a></li>
		<li><a href="/hadist"><i class="fa fa-list-alt"></i><br />Hadist</a></li>
		<li><a href="/mp3"><i class="fa fa-file-audio-o"></i><br />Salwa Audio</a></li>
		<li><a href="/murottal"><i class="fa fa-microphone"></i><br />Murottal Al Quran</a></li>
		<li><a href="/image"><i class="fa fa-image"></i><br />Salwa Images</a></li>
		<li><a href="/info"><i class="fa fa-info-circle"></i><br />Salwa Info</a></li>
		<li><a href="/promo"><i class="fa fa-tags"></i><br />Salwa Promo</a></li>
	</ul>

	<div class="clearfix"></div>

	@include('home.video')
	@include('home.promo')
	@include('home.aktual')


	<div style="border:1px solid #8EC7FB;">
		<h4 class="title" style="margin:0;">FORUM</h4>
		@foreach ($forumKategori as $g)
			@include('home.forum', ['group' => $g])
		@endforeach
	</div>

	@include('home.kitab')
	@include('home.doa')
	@include('home.dzikir')

@stop
