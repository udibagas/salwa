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

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-edit"></i> EDIT PRODUCT</h3>
		</div>
		<div class="panel-body">
			@include('produk._form', ['url' => '/produk/'.$produk->id_produk, 'method' => 'PUT'])
		</div>
	</div>


@stop
