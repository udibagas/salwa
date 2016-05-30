@extends('layouts.cms')

@section('title', 'Produk : Edit Produk')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/produk/admin' => 'PRODUK',
			'#' => 'Edit Produk',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-edit"></i> Edit Produk</h4>
	@include('produk._form', ['url' => '/produk/'.$produk->id_produk, 'method' => 'PUT'])

@stop
