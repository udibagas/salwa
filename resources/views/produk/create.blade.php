@extends('layouts.cms')

@section('title', 'Salwa Market : Add New Product')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/produk/admin' => 'PRODUK',
			'#' => 'New Product',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-plus-circle"></i> Tambah Produk Baru</h4>
	@include('produk._form', ['url' => '/produk', 'method' => 'POST'])

@stop
