@extends('layouts.main')

@section('title') Video @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'VIDEO',
		]
	])

@stop

@section('content')

	<h1 class="title">VIDEO</h1>

	<div class="row">
		<div class="col-md-9">
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
