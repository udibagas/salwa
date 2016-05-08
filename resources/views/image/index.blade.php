@extends('layouts.main')

@section('title') Salwa Image @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'SALWA IMAGES',
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-md-9">
			<h4 class="title"><i class="fa fa-image"></i> SALWA IMAGES</h4>
			<div class="row no-gutter">
				@foreach ($images as $v)
					@include('image._list', ['image' => $v])
				@endforeach
			</div>

			<nav class="text-center">
				{{ $images->links() }}
			</nav>
		</div>

		<div class="col-md-3">
			@include('home.sidebar')
		</div>

	</div>

@stop
