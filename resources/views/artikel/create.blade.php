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

	<h4 class="title">Buat Artikel Baru</h4>
	@include('artikel._form', ['url' => '/artikel', 'method' => 'POST'])

@stop
