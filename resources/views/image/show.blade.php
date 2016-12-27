@extends('layouts.main')

@section('title', 'Salwa Image : '.$image->judul)
@section('image', 'http://www.salamdakwah.com/'.$image->img_images)
@section('description', $image->judul)

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/image' => 'SALWA IMAGES',
			'#' => $image->judul
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-sm-3 col-md-3 hidden-xs">
		@include('image._group')
	</div>
	<div class="col-sm-6 col-md-6">
		<h2 style="margin-top:0;">{{ $image->judul }}</h2><hr />
		<img src="/{{ $image->img_images }}" alt="{{ $image->judul }}" class="img-responsive" />

		<hr>
		@include('layouts._share')
	</div>
	<div class="col-sm-3 col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">IMAGE TERKAIT</h3>
			</div>
			<div class="row no-gutter">
				@each('image._list-side', $terkait, 'image')
			</div>
		</div>

	</div>
</div>

@stop
