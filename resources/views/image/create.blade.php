@extends('layouts.cms')

@section('title', 'Image : Create New Image')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/image/admin' => 'SALWA IMAGE',
			'#' => 'New Image',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-plus-circle"></i> ADD NEW IMAGE</h3>
		</div>
		<div class="panel-body">
			@include('image._form', ['url' => '/image', 'method' => 'POST'])
		</div>
	</div>

@stop
