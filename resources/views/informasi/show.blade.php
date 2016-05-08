@extends('layouts.main')

@section('title') Informasi : {{ $informasi->judul }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/informasi' => 'INFORMASI',
			'#' => $informasi->judul
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-9">
		<h1>{{ $informasi->judul }}</h1><hr />
		<b>{{ $informasi->updated->diffForHumans() }}</b><br />
		<hr>

		<img src="http://www.salamdakwah.com/{{ $informasi->img_gambar }}" style="width:100%;margin-bottom:30px;" alt="" />

		{!! $informasi->content !!}

		<hr>
		@include('layouts._share', ['url' => url('/informasi/'.$informasi->informasi_id.'-'.str_slug($informasi->judul))])
		<hr>

		<h4 class="title">INFORMASI TERKAIT</h4>
		<div class="row no-gutter">
			@foreach ($terkait as $t)
				@include('informasi._list', ['informasi' => $t])
			@endforeach
		</div>

	</div>

	<div class="col-md-3">
		@include('home.sidebar')
	</div>
</div>

@stop
