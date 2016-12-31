@extends('layouts.cms')

@section('title', 'Promo : Edit Promo')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/banner/admin' => 'MUROTTAL',
			'#' => 'Edit Promo',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-edit"></i> EDIT BANNER</h3>
		</div>
		<div class="panel-body">
			@include('banner._form', ['url' => '/banner/'.$banner->id, 'method' => 'PUT'])
		</div>
	</div>

@stop
