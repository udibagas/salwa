@extends('layouts.main')

@section('title') Tanya Ustadz : Input Pertanyaan @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/pertanyaan' => 'TANYA USTADZ',
			'#' => 'Input Pertanyaan'
		]
	])

@endsection

@section('content')

	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-question-circle-o"></i> INPUT PERTANYAAN</h3>
				</div>
				<div class="panel-body">
					@include('pertanyaan._form', ['url' => '/pertanyaan', 'method' => 'post'])
				</div>
			</div>

		</div>
		<div class="col-sm-4">
			@include('pertanyaan._panduan')
		</div>
	</div>

@endsection
