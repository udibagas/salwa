@extends('layouts.cms')

@section('title', 'Video : Edit Video')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/video/admin' => 'VIDEO',
			'#' => 'Edit Video',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-edit"></i> Edit Video</h4>
	@include('video._form', ['url' => '/video/'.$video->video_id, 'method' => 'PUT'])

@stop
