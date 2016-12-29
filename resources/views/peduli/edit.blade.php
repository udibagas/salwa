@extends('layouts.cms')

@section('title', 'Peduli : Edit Artikel')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/peduli/admin' => 'PEDULI',
			'#' => 'Edit Artikel',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-edit"></i> EDIT PEDULI</h3>
		</div>
		<div class="panel-body">
			@include('peduli._form', ['url' => '/peduli/'.$peduli->peduli_id, 'method' => 'PUT'])
		</div>
	</div>

@stop
