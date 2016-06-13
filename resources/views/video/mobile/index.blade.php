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

<h4 class="title"><i class="fa fa-video-camera"></i> SALWA VIDEO</h4>
@each('video.mobile._list', $videos, 'a')

<nav class="text-center">
	{{ $videos->appends(['search' => request('search'), 'user_id' => request('user_id')])->links() }}
</nav>

@stop