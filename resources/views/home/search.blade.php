@extends('layouts.main')

@section('title') Search : {{ request('search') }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'Search : "'.request('search').'"',
		]
	])

@stop

@section('content')

	<div class="row">
		<div class="col-sm-2">
			@include('home._navsearch')
		</div>
		<div class="col-md-10">
			<div class="row">
				@include('home._search-result')
			</div>
		</div>
	</div>

@stop
