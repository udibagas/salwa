@extends('layouts.cms')

@section('title', 'Hadist : Edit Hadist')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/hadist/admin' => 'HADIST',
			'#' => 'Edit Hadist',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-edit"></i> Edit Hadist</h4>
	@include('hadist._form', ['url' => '/hadist/'.$hadist->hadist_id, 'method' => 'PUT'])

@stop
