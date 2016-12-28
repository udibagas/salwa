@extends('layouts.main')

@section('title') Tanya Ustadz : {{ $pertanyaan->judul_pertanyaan }} @stop
@section('image', $pertanyaan->img)
@section('imageSquare', $pertanyaan->imgSquare)
@section('description', strip_tags($pertanyaan->ket_pertanyaan))

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/pertanyaan' => 'TANYA USTADZ',
			'#' => str_limit($pertanyaan->judul_pertanyaan),
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-sm-3 col-md-3 hidden-xs">
		@include('pertanyaan._group')
	</div>
	<div class="col-sm-6 col-md-6">

		@include('pertanyaan._pertanyaan', ['p' => $pertanyaan])

		@if ($pertanyaan->jawaban)
			@include('pertanyaan._jawaban', ['p' => $pertanyaan])
		@else

			<div class="alert alert-danger text-center">
				<strong>Belum ada jawaban untuk pertanyaan terkait.</strong>
			</div>

		@endif

	</div>
	<div class="col-sm-3 col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">PERTANYAAN TERKAIT</h3>
			</div>
			<ul class="list-group">
				@foreach ($terkait as $p)
				<li class="list-group-item">
					<div class="media">
						<div class="media-left">
							<img class="profile media-object img-circle" data-name="{{ $p->judul_pertanyaan }}" data-width="30" data-height="30" data-font-size="17" />
						</div>
						<div class="media-body">
							<b><a href="/pertanyaan/{{ $p->pertanyaan_id }}-{{ str_slug($p->judul_pertanyaan) }}">{{ $p->judul_pertanyaan }}</a></b>
							<div class="text-muted">
								{{ ($p->user && $p->user->jenis_kelamin == 'p') ? 'Ikhwan - ' : 'Akhwat - ' }}
								{{ $p->updated->diffForHumans() }}
							</div>
						</div>
					</div>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

@stop
