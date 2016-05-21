@extends('layouts.cms')

@section('title', 'Area : Add New Area')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/area/admin' => 'AREA',
			'#' => 'New Area',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-plus-circle"></i> Tambah Area Baru</h4>
	@include('area._form', ['url' => '/area', 'method' => 'POST'])

@stop
