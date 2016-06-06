@extends('layouts.cms')

@section('title', 'Kajian : Edit Kajian')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kajian/admin' => 'KAJIAN',
			'#' => 'Edit Kajian',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-edit"></i> Edit Kajian</h4>
	@include('kajian._form', ['url' => '/kajian/'.$kajian->kajian_id, 'method' => 'PUT'])

@stop
