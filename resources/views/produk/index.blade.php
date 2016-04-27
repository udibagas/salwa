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

	<h1 class="title">SALWA MARKET</h1>

	<div class="row">
		<div class="col-md-8">
			<div class="row">
				@foreach ($produks as $p)
					@include('produk._list', ['produk' => $p])
				@endforeach
			</div>

			<hr>
			<nav class="text-center">
				{!! $produks->links() !!}
			</nav>
		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop
