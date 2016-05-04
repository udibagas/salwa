@extends('layouts.main')

@section('title') Salwa Peduli @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'SALWA PEDULI',
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-md-8">
			<h1 class="title">SALWA PEDULI</h1>
			<div class="row">
				@foreach ($pedulis as $a)
					@include('peduli._list', ['peduli' => $a])
				@endforeach
			</div>

			<hr>
			<nav class="text-center">
				{!! $pedulis->links() !!}
			</nav>
		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop
