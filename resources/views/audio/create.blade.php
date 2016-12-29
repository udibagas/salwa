@extends('layouts.cms')

@section('title', 'Audio : Create New Audio')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/audio/admin' => 'SALWA AUDIO',
			'#' => 'New Audio',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-plus-circle"></i> ADD NEW AUDIO</h3>
		</div>
		<div class="panel-body">
			@include('audio._form', ['url' => '/audio', 'method' => 'POST'])
		</div>
	</div>

@stop
