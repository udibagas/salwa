@extends('layouts.cms')

@section('title', 'Promo : Create New Promo')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/banner/admin' => 'PROMO',
			'#' => 'New Promo',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-plus-circle"></i> ADD BANNER</h3>
		</div>
		<div class="panel-body">
			@include('banner._form', ['url' => '/banner', 'method' => 'POST'])
		</div>
	</div>

@stop
