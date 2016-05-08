@extends('layouts.main')

@section('title') Produk @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/produk' => 'PRODUK'
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-md-9">
			<h4 class="title">SALWA MARKET</h4>
			<div class="row no-gutter">
				@foreach ($produks as $p)
					@include('produk._list', ['produk' => $p])
				@endforeach
			</div>

			<hr>
			<nav class="text-center">
				{!! $produks->links() !!}
			</nav>
		</div>

		<div class="col-md-3">
			@include('home.sidebar')
		</div>
	</div>

@stop
