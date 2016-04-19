@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="/" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="/informasi" class="btn btn-info">INFORMASI</a>
			<a href="#" class="btn btn-info">{{ $informasi->judul }}</a>
		</div>
	</div>

@stop

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>{{ $informasi->judul }}</h1><hr />
		<b>{{ $informasi->updated->diffForHumans() }}</b><br />
		<hr>

		<img src="http://www.salamdakwah.com/{{ $informasi->img_gambar }}" style="width:100%;margin-bottom:30px;" alt="" />

		{!! $informasi->content !!}

		<hr>
		@include('layouts._share', ['url' => url('/informasi/'.$informasi->informasi_id.'-'.str_slug($informasi->judul))])
		<hr>

		<h4 class="title">INFORMASI TERKAIT</h4>
		<div class="row">
			@foreach ($terkait as $t)
				@include('informasi._list', ['informasi' => $t])
			@endforeach
		</div>

	</div>

	<div class="col-md-4">
		@include('home.sidebar')
	</div>
</div>

@stop
