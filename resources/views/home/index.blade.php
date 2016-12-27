@extends('layouts.main')

@section('title') Home @stop
@section('description', 'video kajian, audio kajian, forum islami, jadwal kajian dan artikel, yang berdasarkan Al-Quran dan As-Sunnah sebagaimana pemahaman para sahabat Rosululloh Shallallahu Alaihi Wasallam')
@section('image', 'http://www.salamdakwah.com/images/logo.png')

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
		<div class="col-sm-6 col-md-6 col-sm-6 col-md-6">
			<hadist limit="5" group="doa" header="DOA" icon="heartbeat"></hadist>
		</div>
		<div class="col-sm-6 col-md-6 col-sm-6 col-md-6">
			<hadist limit="5" group="dzikir" header="DZIKIR" icon="hand-stop-o"></hadist>
		</div>
	</div>

	@include('home._popup')

@stop
