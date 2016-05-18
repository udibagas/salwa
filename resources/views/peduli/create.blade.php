@extends('layouts.cms')

@section('title', 'Peduli : Create New Artikel')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/peduli/admin' => 'PEDULI',
			'#' => 'New Artikel',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-plus-circle"></i> Tambah Artikel Baru</h4>
	@include('peduli._form', ['url' => '/peduli', 'method' => 'POST'])

@stop
