@extends('layouts.cms')

@section('title', 'Image : Edit Image')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/image/admin' => 'SALWA IMAGES',
			'#' => 'Edit Image',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-edit"></i> Edit Image</h4>
	@include('image._form', ['url' => '/image/'.$image->id_salwaimages, 'method' => 'PUT'])

@stop
