@extends('layouts.cms')

@section('title', 'Video : Add New Video')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/video/admin' => 'VIDEO',
			'#' => 'New Video',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				<i class="fa fa-plus-circle"></i> ADD NEW VIDEO
			</h3>
		</div>
		<div class="panel-body">
			@include('video._form', ['url' => '/video', 'method' => 'POST'])
		</div>
	</div>

@stop
