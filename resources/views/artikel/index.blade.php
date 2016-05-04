@extends('layouts.main')

@section('title') Aktual @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/artikel' => 'AKTUAL'
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-md-9">
			<h4 class="title">AKTUAL</h4>
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

		<div class="col-md-3">
			@include('home.sidebar')
		</div>
	</div>

@stop
