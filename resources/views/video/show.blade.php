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
	<div class="col-md-3">
		@include('video._group')
	</div>
	<div class="col-md-9">
		<h1>{{ $video->title }}</h1>
		<i class="fa fa-user"></i> {{ $video->user ? $video->user->name : '' }}
		<i class="fa fa-clock-o"></i> {{ $video->updated->diffForHumans() }}
		<hr />

		@if ($video->url_video_youtube)
		<iframe width="600" height="300" src="https://www.youtube.com/embed/{{ $video->url_video_youtube }}" frameborder="0" allowfullscreen></iframe>
		@endif

		@if (count($video->files))
		<div id="video"></div>
		<script type="text/javascript">

			var playlist =[@foreach ($video->files()->web()->get() as $f) {file:"/{{ $f->file_upload }}", image:"/{{ $f->img_file }}", title:"{{ $video->title }}"}, @endforeach];

			jwplayer("video").setup({
		        playlist: playlist,
				width: 600,
				height: 300
			});

        </script>
		@endif

		<br><br>
		{!! $video->desc !!}

		<hr>
		@include('layouts._share')
		<hr>

		@include('comment.index', [
		'comments' => $video->comments()->ofType('video')
			->when(! auth()->user()->isAdmin(), function($query) {
				return $query->approved();
			})->get()
		])

		@if (auth()->check())
			@include('comment.form', ['post_id' => $video->video_id, 'type' => 'video'])
		@else
			<div class="alert alert-danger text-center">
				<strong>Silakan <a href="/login">login</a> untuk menulis komentar.</strong>
			</div>
		@endif

		<h4 class="title">VIDEO TERKAIT</h4>
		<div class="row no-gutter">
			@foreach ($terkait as $t)
				@include('video._list', ['video' => $t])
			@endforeach
		</div>
	</div>

</div>

@endsection
