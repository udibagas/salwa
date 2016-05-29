@extends('layouts.main')

@section('title', 'Kajian')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kajian' => 'KAJIAN'
		]
	])

@stop

@section('content')

	<div class="row">
		<div class="col-md-3">
			@include('kajian._group')
		</div>
		<div class="col-md-9">
			<h1>{{ $kajian->tema }}</h1>
			<h3>{{ $kajian->ustadz ? $kajian->ustadz->ustadz_name : ''}}</h3>

			{{ $kajian->description }}
		</div>
	</div>

@stop
