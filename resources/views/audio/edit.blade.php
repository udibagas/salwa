@extends('layouts.cms')

@section('title', 'Audio : Edit Audio')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/audio/admin' => 'SALWA AUDIO',
			'#' => 'Edit Audio',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-edit"></i> EDIT AUDIO</h3>
		</div>
		<div class="panel-body">
			@include('audio._form', ['url' => '/audio/'.$audio->mp3_download_id, 'method' => 'PUT'])
		</div>
	</div>

@stop
