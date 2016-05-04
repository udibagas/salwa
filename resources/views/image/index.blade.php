@extends('layouts.main')

@section('title') Salwa Image @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'SALWA IMAGE',
		]
	])

@stop

@section('content')

	<h1 class="title">IMAGES</h1>

	<div class="row">
		<div class="col-md-8">
			<div class="row">
				@foreach ($images as $v)
					@include('image._list', ['image' => $v])
				@endforeach
			</div>

			<hr>
			<nav class="text-center">
				{{ $images->links() }}
			</nav>
		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>

	</div>

@stop
