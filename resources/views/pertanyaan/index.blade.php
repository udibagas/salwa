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

		<div class="col-sm-3 hidden-xs">
			@include('pertanyaan._group')
		</div>

		<div class="col-sm-6">

			@if (count($pertanyaans) == 0)
				<div class="alert alert-warning text-center">
					<strong>Tidak ada hasil untuk pencarian terkait.</strong>
				</div>
			@endif

			@each('pertanyaan._list', $pertanyaans, 'p')

			<nav class="text-center">
				{!! $pertanyaans->appends(['search' => request('search'),'group_id' => request('group_id')])->links() !!}
			</nav>

		</div>

		<div class="col-sm-3">
			@include('pertanyaan._panduan')
		</div>

	</div>

@stop
