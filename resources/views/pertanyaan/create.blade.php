@extends('layouts.user')

@section('title') Tanya Ustadz : Input Pertanyaan @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/pertanyaan' => 'TANYA USTADZ',
			'#' => 'Input Pertanyaan'
		]
	])

@endsection

@section('user-content')

	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-plus"></i> INPUT PERTANYAAN</h3>
				</div>
				<div class="panel-body">
					@include('pertanyaan._form', ['url' => '/pertanyaan', 'method' => 'post'])
				</div>
			</div>

		</div>
		<div class="col-sm-4 col-md-4">
			@include('pertanyaan._panduan')
		</div>
	</div>

@endsection
