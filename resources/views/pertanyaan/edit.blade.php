@extends('layouts.main')

@section('title') Tanya Ustadz : Edit Pertanyaan @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/pertanyaan' => 'TANYA USTADZ',
			'/pertanyaan/'.$pertanyaan->pertanyaan_id => $pertanyaan->judul_pertanyaan,
			'#' => 'Edit Pertanyaan'
		]
	])

@stop

@section('content')

	<div class="row">
		<div class="col-md-3">
			@include('pertanyaan._group')
		</div>
		<div class="col-md-9">
			<h4 class="title"><i class="fa fa-question-circle-o"></i> EDIT PERTANYAAN</h4>
			@include('pertanyaan._form', ['url' => '/pertanyaan/'.$pertanyaan->pertanyaan_id, 'method' => 'PUT'])
		</div>
	</div>

@stop
