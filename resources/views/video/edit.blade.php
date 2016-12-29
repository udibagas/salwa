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

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				<i class="fa fa-edit"></i> EDIT VIDEO
			</h3>
		</div>
		<div class="panel-body">
			@include('video._form', ['url' => '/video/'.$video->video_id, 'method' => 'PUT'])
		</div>
	</div>


@stop
