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
	<div class="col-md-8">
		<h1>{{ $artikel->judul }}</h1><hr />
		<b>{{ $artikel->user ? $artikel->user->name : '' }} | {{ $artikel->updated->diffForHumans() }}</b><br />
		<hr>

		<img src="http://www.salamdakwah.com/{{ $artikel->img_artikel }}" style="width:100%;margin-bottom:30px;" alt="" />

		 <!-- preg_replace('/(<[^>]+) style=".*?"/i', '$1', strip_tags($artikel->isi, '<p><br><i><em><strong><hr><img>')) -->
		{!! $artikel->isi !!}

		<hr>
		@include('layouts._share', ['url' => url('/artikel/'.$artikel->artikel_id.'-'.str_slug($artikel->judul))])
		<hr>

		<h4 class="title">ARTIKEL TERKAIT</h4>
		<div class="row">
			@foreach ($terkait as $t)
				@include('artikel._list', ['artikel' => $t])
			@endforeach
		</div>

	</div>

	<div class="col-md-4">
		@include('home.sidebar')
	</div>
</div>



@stop
