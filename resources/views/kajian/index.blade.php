@extends('layouts.main')

@section('title', 'Kajian')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kajian' => 'KAJIAN'
		]
	])

@stop

@section('content')

	<div class="row">
		<div class="col-md-3">
			@include('kajian._group')
		</div>
		<div class="col-md-9">

			@include('kajian._today', ['today' => \App\Kajian::active()->today()->get()])

			<br>

			<h4 class="title"><i class="fa fa-edit"></i> JADWAL KAJIAN</h4>
			<div class="row no-gutter">
				@each('kajian._list', $kajians, 'kajian')
			</div>

			<nav class="text-center">
				{!! $kajians->appends(['tema' => request('tema'),'ustadz_id' => request('ustadz_id'),'rutin' => request('rutin')])->links() !!}
			</nav>

		</div>
	</div>

@stop
