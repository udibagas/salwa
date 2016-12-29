@extends('layouts.cms')

@section('title', 'Artikel : Add New Hadist')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/hadist/admin' => 'HADIST',
			'#' => 'New Hadist',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-plus-circle"></i> ADD NEW HADIST</h3>
		</div>
		<div class="panel-body">
			@include('hadist._form', ['url' => '/hadist', 'method' => 'POST'])
		</div>
	</div>

@stop
