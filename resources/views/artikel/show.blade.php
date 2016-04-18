@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="/" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="/artikel" class="btn btn-info">AKTUAL</a>
			<a href="#" class="btn btn-info">{{ $artikel->judul }}</a>
		</div>
	</div>

@stop

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>{{ $artikel->judul }}</h1><hr />
		<b>{{ $artikel->user ? $artikel->user->name : '' }} | {{ $artikel->updated->diffForHumans() }}</b><br />
		<hr>

		<img src="http://www.salamdakwah.com/{{ $artikel->img_artikel }}" style="width:100%;margin-bottom:30px;" alt="" />

		{!! $artikel->isi !!}

		<hr>
		@include('layouts._share', ['url' => url('/artikel/'.$artikel->artikel_id.'-'.str_slug($artikel->judul))])

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
