@extends('layouts.main')

@section('title') Tanya Ustadz @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'TANYA USTADZ',
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-md-9">
			<h4 class="title"><i class="fa fa-question-circle-o"></i> TANYA USTADZ</h4>
			@foreach ($pertanyaans as $p)
				<div class="alert alert-info">
					<h3><a href="/pertanyaan/{{ $p->pertanyaan_id }}-{{ str_slug($p->judul_pertanyaan) }}">{{ $p->judul_pertanyaan }}</a></h3>
					<p>{!! nl2br($p->ket_pertanyaan) !!}</p><br />

					<b>{{ $p->user ? $p->user->name : '' }} | {{ $p->updated->diffForHumans() }}</b>
				</div>
			@endforeach

			<nav class="text-center">
				{!! $pertanyaans->links() !!}
			</nav>
		</div>
		<div class="col-md-3">
			@include('home.sidebar')
		</div>
	</div>

@stop
