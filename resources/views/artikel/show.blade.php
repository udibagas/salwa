@extends('layouts.main')

@section('title') Aktual : {{ $artikel->judul }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/artikel' => 'AKTUAL',
			'#' => $artikel->judul
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-3">
		@include('artikel._group')
	</div>
	<div class="col-md-9">
		<h1>{{ $artikel->judul }}</h1>

		<i class="fa fa-user"></i> {{ $artikel->user ? $artikel->user->name : '' }}
		<i class="fa fa-clock-o"></i> {{ $artikel->updated->diffForHumans() }}
		<br /><br />

		@if ($artikel->img_artikel)
		<img src="http://www.salamdakwah.com/{{ $artikel->img_artikel }}" style="margin-bottom:30px;" alt="" />
		@endif

		 <!-- preg_replace('/(<[^>]+) style=".*?"/i', '$1', strip_tags($artikel->isi, '<p><br><i><em><strong><hr><img>')) -->
		{!! $artikel->isi !!}

		<hr>
		@include('layouts._share', ['url' => url('/artikel/'.$artikel->artikel_id.'-'.str_slug($artikel->judul))])
		<hr>

		<h4 class="title">ARTIKEL TERKAIT</h4>
		<div class="row no-gutter">
			@foreach ($terkait as $t)
				@include('artikel._list', ['artikel' => $t])
			@endforeach
		</div>

	</div>

	<!-- <div class="col-md-4">
		include('home.sidebar')
	</div> -->
</div>



@stop
