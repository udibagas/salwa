@extends('layouts.cms')

@section('title', 'Kitab : Edit Kitab')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kitab/admin' => 'KITAB',
			'#' => 'Edit Kitab',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-edit"></i> Edit Kitab</h4>
	@include('kitab._form', ['url' => '/kitab/'.$kitab->buku_id, 'method' => 'PUT'])

@stop
