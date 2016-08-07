@extends('layouts.cms')

@section('title', 'Kajian : Add New Kajian')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kajian/admin' => 'KAJIAN',
			'#' => 'New Kajian',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-plus-circle"></i> Tambah Kajian Baru</h4>
	@include('kajian._form', ['url' => '/kajian', 'method' => 'POST'])

@stop
