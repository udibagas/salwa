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

		<div class="col-md-3">
			@include('pertanyaan._group')
		</div>

		<div class="col-md-9">

			<h4 class="title"><i class="fa fa-question-circle-o"></i> TANYA USTADZ</h4>

			@if (count($pertanyaans) == 0)
				<div class="alert alert-warning text-center">
					<strong>Tidak ada hasil untuk pencarian terkait.</strong>
				</div>
			@endif

			@foreach ($pertanyaans as $p)
				@include('pertanyaan._list', ['p' => $p])
			@endforeach

			<nav class="text-center">
				{!! $pertanyaans->appends(['search' => request('search')])->links() !!}
			</nav>

		</div>

	</div>

@stop
