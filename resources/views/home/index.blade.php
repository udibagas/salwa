@extends('layouts.main')

@section('title') Home @stop

@section('slider')
	@include('home.slider')
@stop

@section('content')

	@include('home.linkIcon')

	@include('home._video')
	<div style="clear:both;"></div>
	<br>
	@include('home.promo')
	<br>
	@if ($isTablet)
		@include('home.tablet._aktual')
		<br>
	@else
		@include('home._aktual')
	@endif
	<br>

	<h4 class="title"><i class="fa fa-comment"></i> FORUM</h4>
	@include('home._forum')

	<h4 class="title"><i class="fa fa-book"></i> SALWA E-BOOK</h4>
	@if ($isTablet)
		@include('home.tablet._kitab')
	@else
		@include('home._kitab')
	@endif
	<div class="clearfix"></div>
	<br>

	<div class="row">
		<div class="col-md-6 col-sm-6">
			@include('home.doa')
		</div>
		<div class="col-md-6 col-sm-6">
			@include('home.dzikir')
		</div>
	</div>

	@include('home._popup')

@stop

@push('script')

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

@endpush
