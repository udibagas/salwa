@extends('layouts.cms')

@section('title', 'Lokasi : Edit Posisi')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/lokasi' => 'BANNER POSITION',
			'#' => 'Edit Position',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-edit"></i> Edit Position</h4>
	@include('position._form', ['url' => '/position/'.$position->position_id, 'method' => 'PUT'])

@stop
