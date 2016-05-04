@extends('layouts.main')

@section('title') Video @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'SALWA VIDEO',
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-md-9">
			<h4 class="title"><i class="fa fa-video-camera"></i> SALWA VIDEO</h4>
			<div class="row">
				@foreach ($videos as $v)
					@include('video._list', ['video' => $v])
				@endforeach
			</div>

			<hr>
			<nav class="text-center">
				{{ $videos->links() }}
			</nav>
		</div>

		<div class="col-md-3">
			@include('home.sidebar')
		</div>

	</div>

@stop
