@extends('layouts.main')

@section('title') Informasi @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'INFORMASI'
		]
	])

@stop

@section('content')

	<h1 class="title">INFORMASI</h1>

	<div class="row">
		<div class="col-md-8">
			<div class="row">
				@foreach ($informasis as $a)
					@include('informasi._list', ['informasi' => $a])
				@endforeach
			</div>

			<hr>
			<nav class="text-center">
				{!! $informasis->links() !!}
			</nav>
		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop
