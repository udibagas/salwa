@extends('layouts.cms')

@section('title', 'Peduli : Edit Artikel')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/peduli/admin' => 'PEDULI',
			'#' => 'Edit Artikel',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-edit"></i> Edit Artikel</h4>
	@include('peduli._form', ['url' => '/peduli/'.$peduli->peduli_id, 'method' => 'PUT'])

@stop
