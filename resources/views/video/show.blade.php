@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="/" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="/video" class="btn btn-info">VIDEO</a>
			<a href="#" class="btn btn-info">{{ $video->title }}</a>
		</div>
	</div>

@stop

@section('content')

<h1>{{ $video->title }}</h1><hr />
<div class="row">
	<div class="col-md-8">
		<iframe width="100%" height="360" src="https://www.youtube.com/embed/{{ $video->url_video_youtube }}" frameborder="0" allowfullscreen></iframe>

		<hr>
		@include('layouts._share', ['url' => url('/video/'.$video->video_id.'-'.str_slug($video->title))])
		<hr>

		<h4 class="title">VIDEO TERKAIT</h4>
		<div class="row">
			@foreach ($terkait as $t)
				@include('video._list', ['video' => $t])
			@endforeach
		</div>
	</div>

	<div class="col-md-4">
		@include('home.sidebar')
	</div>
</div>



@stop
