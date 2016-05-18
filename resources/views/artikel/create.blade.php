@extends('layouts.cms')

@section('title', 'Artikel : Create New Artikel')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/artikel/admin' => 'ARTIKEL',
			'#' => 'New Artikel',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-plus-circle"></i> Tambah Artikel Baru</h4>
	@include('artikel._form', ['url' => '/artikel', 'method' => 'POST'])

@stop
