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

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-edit"></i> EDIT IMAGE</h3>
		</div>
		<div class="panel-body">
			@include('image._form', ['url' => '/image/'.$image->id_salwaimages, 'method' => 'PUT'])
		</div>
	</div>

@stop
