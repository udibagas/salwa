@extends('layouts.cms')

@section('title', 'Area : Edit Area')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/area' => 'AREA',
			'#' => 'Edit Area',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-edit"></i> Edit Area</h4>
	@include('area._form', ['url' => '/area/'.$area->id_area, 'method' => 'PUT'])

@stop
