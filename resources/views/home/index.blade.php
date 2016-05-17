@extends('layouts.main')

@section('title') Home @stop

@section('slider')
	@include('home.slider')
@stop

@section('content')

	@include('home.linkIcon')

	<div class="clearfix"></div>

	@include('home.video')
	@include('home.promo')
	@include('home._aktual')

	<div style="border:1px solid #8EC7FB;">
		<h4 class="title" style="margin:0;">FORUM</h4>
		@each('forum._list', $forumKategori, 'group')
	</div>

	<br>
	<div class="clearfix"></div>
	@include('home._kitab')
	<div class="clearfix"></div>

	<div class="row">
		<div class="col-md-6">
			@include('home.doa')
		</div>
		<div class="col-md-6">
			@include('home.dzikir')
		</div>
	</div>

@stop

@section('script')

<script type="text/javascript">

	var audio = new Audio('http://119.82.232.83:1111/;stream.mp3');

	// audio.play();

	$(document).on('click', '.fa-play', function() {
		audio.play();
		$(this).removeClass('fa-play');
		$(this).addClass('fa-pause');
		return false;
	});

	$(document).on('click', '.fa-pause', function() {
		audio.pause();
		$(this).removeClass('fa-pause');
		$(this).addClass('fa-play');
		return false;
	});

	$('#myCarousel').carousel({
		interval: 10000
	});

</script>

@stop
