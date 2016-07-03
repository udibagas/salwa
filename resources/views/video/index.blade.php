@extends('layouts.main')

@section('title', 'Video')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'SALWA VIDEO',
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-md-3 hidden-xs">
			@include('video._group')
		</div>
		<div class="col-md-9">
			<h4 class="title"><i class="fa fa-video-camera"></i> SALWA VIDEO</h4>
			<div class="row no-gutter">
				@foreach ($videos as $v)
					@include('video._list', ['video' => $v])
				@endforeach
			</div>

			<nav class="text-center">
				{{ $videos->appends(['search' => request('search'), 'user_id' => request('user_id')])->links() }}
			</nav>
		</div>

	</div>

@stop
