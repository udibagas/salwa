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

	<h4 class="title"><i class="fa fa-edit"></i> Edit Audio</h4>
	@include('audio._form', ['url' => '/audio/'.$audio->mp3_download_id, 'method' => 'PUT'])

@stop
