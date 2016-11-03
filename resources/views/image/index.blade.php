@extends('layouts.main')

@section('title', 'Salwa Images')
@section('image', 'http://www.salamdakwah.com/'.$images->first()->img_images)
@section('description', 'Poster Dakwah')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'SALWA IMAGES',
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-md-3 hidden-xs">
			@include('image._group')
		</div>
		<div class="col-md-9">
			<h4 class="title"><i class="fa fa-image"></i> SALWA IMAGES</h4>
			<div class="row no-gutter">
				@each('image._list', $images, 'image')
			</div>

			<nav class="text-center">
				{{ $images->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() }}
			</nav>
		</div>
	</div>

@stop
