@extends('layouts.main')

@section('title') Tanya Ustadz : {{ $pertanyaan->judul_pertanyaan }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/pertanyaan' => 'TANYA USTADZ',
			'#' => $pertanyaan->judul_pertanyaan,
		]
	])

@stop

@section('content')

<h1>{{ $pertanyaan->judul_pertanyaan }}</h1><hr />
<div class="row">
	<div class="col-md-8">

		<div class="alert alert-danger">
			<h4>Pertanyaan:</h4>
			<p>{{ $pertanyaan->ket_pertanyaan }}</p><br />
			<b>{{ $pertanyaan->user ? $pertanyaan->user->name : '' }} | {{ $pertanyaan->created->diffForHumans() }}</b>
		</div>

		<div class="alert alert-info">
			<h4>Jawaban:</h4>
			<p>{!! $pertanyaan->jawaban !!}</p> <br />
			<b>{{ $pertanyaan->ustadz ? $pertanyaan->ustadz->name : '' }} | {{ $pertanyaan->updated->diffForHumans() }}</b>
		</div>

		<hr>
		@include('layouts._share', ['url' => url('/pertanyaan/'.$pertanyaan->pertanyaan_id.'-'.str_slug($pertanyaan->judul_pertanyaan))])
		<hr>

		<h4 class="title">PERTANYAAN TERKAIT</h4>
		@foreach ($terkait as $p)
			<a href="/pertanyaan/{{ $p->pertanyaan_id }}-{{ str_slug($p->judul_pertanyaan) }}"><h4>{{ $p->judul_pertanyaan }}</h4></a>
			<b> {{ $p->user ? $p->user->name : '' }} | {{ $p->updated->diffForHumans() }}</b>
		@endforeach

	</div>

	<div class="col-md-4">
		@include('home.sidebar')
	</div>
</div>

@stop
