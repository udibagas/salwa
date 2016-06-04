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

	<div class="col-md-offset-2 col-md-8">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-question-circle-o"></i> INPUT PERTANYAAN</h3>
			</div>
			<div class="panel-body">
				@include('pertanyaan._form', ['url' => '/pertanyaan', 'method' => 'post'])
			</div>
		</div>

	</div>
	<div class="clearfix"></div>

@endsection
