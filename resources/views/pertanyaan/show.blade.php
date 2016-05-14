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
	<div class="col-md-3">
		@include('pertanyaan._hashtag')
	</div>
	<div class="col-md-9">

		@include('pertanyaan._pertanyaan', ['p' => $pertanyaan])

		@if ($pertanyaan->jawaban)
			@include('pertanyaan._jawaban', ['p' => $pertanyaan])
		@else
			<div class="alert alert-danger text-center">
				Belum ada jawaban untuk pertanyaan terkait.
			</div>
		@endif

		<hr>
		@include('layouts._share', ['url' => url('/pertanyaan/'.$pertanyaan->pertanyaan_id.'-'.str_slug($pertanyaan->judul_pertanyaan))])
		<hr>

		<h4 class="title">PERTANYAAN TERKAIT</h4>
		<ul class="list-group">
			@foreach ($terkait as $p)
			<li class="list-group-item">
				<a href="/pertanyaan/{{ $p->pertanyaan_id }}-{{ str_slug($p->judul_pertanyaan) }}">{{ $p->judul_pertanyaan }}</a><br>
				<i class="fa fa-user"></i> {{ $p->user ? $p->user->name : '' }}
				<i class="fa fa-clock-o"></i> {{ $p->updated->diffForHumans() }}
			</li>
			@endforeach
		</ul>

	</div>

	<!-- <div class="col-md-3">
		include('home.sidebar')
	</div> -->
</div>

@stop
