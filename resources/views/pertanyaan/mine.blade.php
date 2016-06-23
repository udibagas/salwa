@extends('layouts.main')

@section('title', 'Pertanyaan Saya')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'PERTANYAAN SAYA',
		]
	])

@stop

@section('content')

<h4 class="title"><i class="fa fa-question-circle-o"></i> PERTANYAAN SAYA</h4>

@if (count($pertanyaans) == 0)
	<div class="alert alert-warning text-center">
		<strong>Tidak ada pertanyaan.</strong>
	</div>
@endif

@each('pertanyaan._list', $pertanyaans, 'p')

<div class="text-center">
	{!! $pertanyaans->appends(['search' => request('search'),'group_id' => request('group_id')])->links() !!}
</div>

@stop
