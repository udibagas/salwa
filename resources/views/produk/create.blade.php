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

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-plus-circle"></i> ADD NEW PRODUCT</h3>
		</div>
		<div class="panel-body">
			@include('produk._form', ['url' => '/produk', 'method' => 'POST'])
		</div>
	</div>

@stop
