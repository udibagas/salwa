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

<div class="row">
	<div class="col-md-2">
		@include('pertanyaan._hashtag')
	</div>
	<div class="col-md-7">
		<h1>{{ $pertanyaan->judul_pertanyaan }}</h1><hr />

		<div class="alert alert-danger">
			<h4>Pertanyaan:</h4>
			<p>{!! nl2br($pertanyaan->ket_pertanyaan) !!}</p><br />
			<b>
				<i class="fa fa-user"></i> {{ $pertanyaan->user ? $pertanyaan->user->name : '' }} |
				<i class="fa fa-clock-o"></i> {{ $pertanyaan->created->diffForHumans() }}
			</b>

			<span class="pull-right">
				<a href="/pertanyaan/{{$pertanyaan->pertanyaan_id}}/edit"><i class="fa fa-edit"></i> Edit Pertanyaan</a>
			</span>
		</div>

		<div class="alert alert-info">
			<h4>Jawaban:</h4>

			@if ($pertanyaan->jawaban)

			<p>{!! nl2br($pertanyaan->jawaban) !!}</p> <br />
			<b>{{ $pertanyaan->ustadz ? $pertanyaan->ustadz->name : '' }} | {{ $pertanyaan->updated->diffForHumans() }}</b>

			@else
				<b>Belum ada jawaban untuk pertanyaan terkait</b>
			@endif
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

	<div class="col-md-3">
		@include('home.sidebar')
	</div>
</div>

@stop
