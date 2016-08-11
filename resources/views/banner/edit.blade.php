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

	<h4 class="title"><i class="fa fa-edit"></i> EDIT BANNER</h4>
	@include('banner._form', ['url' => '/banner/'.$banner->id, 'method' => 'PUT'])

@stop
