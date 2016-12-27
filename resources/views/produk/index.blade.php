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
		<div class="col-sm-3 col-md-3 hidden-xs">
			@include('produk._group')
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-shopping-cart"></i> SALWA MARKET</h3>
				</div>
				<div class="panel-body">
					<div class="row no-gutter">
						@each('produk._list', $produks, 'produk')
					</div>
				</div>
			</div>

			<nav class="text-center">
				{!! $produks->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
			</nav>
		</div>
	</div>

@stop
