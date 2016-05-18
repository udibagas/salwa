@extends('layouts.cms')

@section('title', 'Artikel : Edit Artikel')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/artikel/admin' => 'ARTIKEL',
			'#' => 'Edit Artikel',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-edit"></i> Edit Artikel</h4>
	@include('artikel._form', ['url' => '/artikel/'.$artikel->artikel_id, 'method' => 'PUT'])

@stop
