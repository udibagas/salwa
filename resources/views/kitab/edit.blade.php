@extends('layouts.cms')

@section('title', 'Kitab : Edit Kitab')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kitab/admin' => 'KITAB',
			'#' => 'Edit Kitab',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-edit"></i> EDIT KITAB</h3>
		</div>
		<div class="panel-body">
			@include('kitab._form', ['url' => '/kitab/'.$kitab->buku_id, 'method' => 'PUT'])
		</div>
	</div>

@stop
