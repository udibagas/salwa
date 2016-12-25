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
		<div class="col-sm-3 hidden-xs">
			@include('video._group')
		</div>
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-video-camera"></i> SALWA VIDEO</h3>
				</div>
				<div class="panel-body">
					<div class="row no-gutter">
						@foreach ($videos as $v)
						@include('video._list', ['video' => $v])
						@endforeach
					</div>
				</div>
			</div>

			<nav class="text-center">
				{{ $videos->appends(['search' => request('search'), 'user_id' => request('user_id')])->links() }}
			</nav>
		</div>

	</div>

@stop
