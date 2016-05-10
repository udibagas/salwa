@extends('layouts.main')

@section('title') Tanya Ustadz : Input Pertanyaan @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/pertanyaan' => 'TANYA USTADZ',
			'#' => 'Input Pertanyaan'
		]
	])

@stop

@section('content')

	<div class="row">
		<div class="col-md-2">
			@include('pertanyaan._hashtag')
		</div>
		<div class="col-md-7">
			<h4 class="title"><i class="fa fa-question-circle-o"></i> INPUT PERTANYAAN</h4>
			@include('pertanyaan._form', ['url' => '/pertanyaan', 'method' => 'post'])
		</div>

		<div class="col-md-3">
			@include('home.sidebar')
		</div>

	</div>

@stop
