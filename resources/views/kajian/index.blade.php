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
		<div class="col-sm-3">
			@include('kajian._group')
		</div>
		<div class="col-sm-9">
			<div class="row no-gutter">
				@each('kajian._list', $kajians, 'kajian')
			</div>
		</div>
	</div>

@stop
