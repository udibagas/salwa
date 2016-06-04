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
		@include('pertanyaan._group')
	</div>
	<div class="col-md-9">

		@include('pertanyaan._pertanyaan', ['p' => $pertanyaan])

		@if ($pertanyaan->jawaban)
			@include('pertanyaan._jawaban', ['p' => $pertanyaan])
		@else

			<div class="alert alert-danger text-center">
				<strong>Belum ada jawaban untuk pertanyaan terkait.</strong>
			</div>

			@can('jawab-pertanyaan', $pertanyaan)
				@include('pertanyaan.ustadz._form-jawab', ['pertanyaan' => $pertanyaan])
			@endcan

		@endif

		<hr>
		@include('layouts._share')
		<hr>

		<div class="panel panel-blue">
			<div class="panel-heading">
				<h4 class="panel-title">PERTANYAAN TERKAIT</h4>
			</div>
			<ul class="list-group">
				@foreach ($terkait as $p)
				<li class="list-group-item">
					<b><a href="/pertanyaan/{{ $p->pertanyaan_id }}-{{ str_slug($p->judul_pertanyaan) }}">{{ $p->judul_pertanyaan }}</a></b><br>
					<i class="fa fa-user"></i> {{ $p->user ? $p->user->name : '' }}
					<i class="fa fa-clock-o"></i> {{ $p->updated->diffForHumans() }}
				</li>
				@endforeach
			</ul>
		</div>

	</div>
</div>

@stop
