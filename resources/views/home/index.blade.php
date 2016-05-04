@extends('layouts.main')

@section('slider')
	@include('home.slider')
@stop

@section('content')

	@include('home.linkIcon')

	<div class="clearfix"></div>

	@include('home.video')
	@include('home.promo')
	@include('home.aktual')


	<div style="border:1px solid #8EC7FB;">
		<h4 class="title" style="margin:0;">FORUM</h4>
		@foreach ($forumKategori as $g)
			@include('forum._list', ['group' => $g])
		@endforeach
	</div>

	@include('home.kitab')
	@include('home.doa')
	@include('home.dzikir')

@stop
