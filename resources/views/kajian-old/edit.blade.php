@extends('layouts.cms')

@section('title', 'Kajian : Edit Kajian')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kajian/admin' => 'KAJIAN',
			'#' => 'Edit Kajian',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-edit"></i> EDIT KAJIAN</h3>
		</div>
		<div class="panel-body">
			@include('kajian-old._form', ['url' => '/kajian/'.$kajian->kajian_id, 'method' => 'PUT'])
		</div>
	</div>

@stop
