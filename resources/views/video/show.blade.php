@extends('layouts.main')

@section('title') Video : {{ $video->title }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/video' => 'VIDEO',
			'#' => $video->title
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-9">
		<h1>{{ $video->title }}</h1><hr />
		<iframe width="100%" height="360" src="https://www.youtube.com/embed/{{ $video->url_video_youtube }}" frameborder="0" allowfullscreen></iframe>

		<hr>
		@include('layouts._share', ['url' => url('/video/'.$video->video_id.'-'.str_slug($video->title))])
		<hr>

		<h4 class="title">VIDEO TERKAIT</h4>
		<div class="row no-gutter">
			@foreach ($terkait as $t)
				@include('video._list', ['video' => $t])
			@endforeach
		</div>
	</div>

	<div class="col-md-3">
		@include('home.sidebar')
	</div>
</div>



@stop
