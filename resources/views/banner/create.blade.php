@extends('layouts.cms')

@section('title', 'Promo : Create New Promo')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/banner/admin' => 'PROMO',
			'#' => 'New Promo',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-plus-circle"></i> Tambah Promo Baru</h4>
	@include('banner._form', ['url' => '/banner', 'method' => 'POST'])

@stop
