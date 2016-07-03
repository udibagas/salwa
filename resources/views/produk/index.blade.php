@extends('layouts.main')

@section('title', 'Salwa Market')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/produk' => 'SALWA MARKET'
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-md-3 hidden-xs">
			@include('produk._group')
		</div>
		<div class="col-md-9">
			<h4 class="title"><i class="fa fa-shopping-cart"></i> SALWA MARKET</h4>
			<div class="row no-gutter">
				@each('produk._list', $produks, 'produk')
			</div>

			<hr>
			<nav class="text-center">
				{!! $produks->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
			</nav>
		</div>
	</div>

@stop
