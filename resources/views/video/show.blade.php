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

@push('script')

	<script type="text/javascript" src="/js/jwplayer.js"></script>
	<script type="text/javascript">jwplayer.key="Po/UoGBXOficWhpXsaov0bySptHn7pVD5NSbKQ==";</script>
	<script type="text/javascript">

	</script>

@endpush

@section('content')

<div class="row">
	<div class="col-md-9">
		<h1>{{ $video->title }}</h1><hr />

		@if ($video->url_video_youtube)
		<iframe width="100%" height="360" src="https://www.youtube.com/embed/{{ $video->url_video_youtube }}" frameborder="0" allowfullscreen></iframe>
		@endif

		<div id="video"></div>

		@if ($video->files)
			<div class="row no-gutter">
				@foreach ($video->files()->web()->get() as $f)
				<div class="col-md-6">
					<video width="100%" height="300" controls  poster="http://www.salamdakwah.com/{{ $f->img_file }}" style="width:100%;height:300px;">
						<source src="http://www.salamdakwah.com/{{ $f->file_upload }}" type="video/3gp">
					</video>
				</div>
				@endforeach
			</div>
		@endif

		<hr>
		@include('layouts._share')
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

@endsection
