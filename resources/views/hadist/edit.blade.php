@extends('layouts.cms')

@section('title', 'Hadist : Edit Hadist')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/hadist/admin' => 'HADIST',
			'#' => 'Edit Hadist',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-edit"></i> EDIT HADIST</h3>
		</div>
		<div class="panel-body">
			@include('hadist._form', ['url' => '/hadist/'.$hadist->hadist_id, 'method' => 'PUT'])
		</div>
	</div>


@stop
