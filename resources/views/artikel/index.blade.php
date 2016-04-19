@extends('layouts.main')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/artikel' => 'AKTUAL'
		]
	])

@stop

@section('content')

	<h1 class="title">AKTUAL</h1>

	<div class="row">
		<div class="col-md-8">
			<div class="row">
				@foreach ($artikels as $a)
					@include('artikel._list', ['artikel' => $a])
				@endforeach
			</div>

			<hr>
			<nav class="text-center">
				{!! $artikels->links() !!}
			</nav>
		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop
