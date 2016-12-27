@extends('layouts.main')

@section('title', 'Tanya Ustadz : Edit Pertanyaan')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/pertanyaan' => 'TANYA USTADZ',
			'/pertanyaan/'.$pertanyaan->pertanyaan_id => str_limit($pertanyaan->judul_pertanyaan),
			'#' => 'Edit Pertanyaan'
		]
	])

@stop

@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-question-circle-o"></i> EDIT PERTANYAAN</h3>
				</div>
				<div class="panel-body">
					@include('pertanyaan._form', ['url' => '/pertanyaan/'.$pertanyaan->pertanyaan_id, 'method' => 'PUT'])
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-md-4">
			@include('pertanyaan._panduan')
		</div>
	</div>

@stop
