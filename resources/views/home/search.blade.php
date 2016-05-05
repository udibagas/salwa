@extends('layouts.main')

@section('title') Search : {{ $q }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'Search : '.$q,
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-md-9">
			<h4 class="title">Search Result for : {{ $q }}</h4>

		</div>

		<div class="col-md-3">
			@include('home.sidebar')
		</div>
	</div>


@stop
