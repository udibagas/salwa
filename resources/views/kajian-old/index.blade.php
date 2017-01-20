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
		<div class="col-sm-3 col-md-3 hidden-xs">
			@include('kajian-old._group')
		</div>
		<div class="col-md-9">

			@include('kajian-old._today', ['today' => \App\KajianOld::active()->today()->get()])

			<br>

			<h4 class="title"><i class="fa fa-edit"></i> JADWAL KAJIAN</h4>
			<div class="row no-gutter">
				@each('kajian-old._list', $kajians, 'kajian')
			</div>

			<br>

			<nav class="text-center">
				{!! $kajians->appends(['tema' => request('tema'),'ustadz_id' => request('ustadz_id'),'rutin' => request('rutin')])->links() !!}
			</nav>

		</div>
	</div>

@stop
