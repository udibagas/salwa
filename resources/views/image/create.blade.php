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

	<h4 class="title"><i class="fa fa-plus-circle"></i> Tambah Image Baru</h4>
	@include('image._form', ['url' => '/image', 'method' => 'POST'])

@stop
