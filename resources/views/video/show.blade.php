@extends('layouts.main')

@section('title') Video : {{ $video->title }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/video' => 'VIDEO',
			'#' => str_limit($video->title)
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-3 hidden-xs">
		@include('video._group')
	</div>
	<div class="col-md-6">
		<h2 style="margin-top:0;">{{ $video->title }}</h2>
		<div class="text-muted">
			{{ $video->user ? $video->user->name.' - ' : '' }}
			{{ $video->updated->diffForHumans() }}
		</div>
		<hr />

		@if ($video->url_video_youtube)
		<iframe width="100%" height="300" src="https://www.youtube.com/embed/{{ $video->url_video_youtube }}" frameborder="0" allowfullscreen></iframe>
		@endif

		@if (count($video->files))
		<div id="video"></div>
		@push('script')
		<script type="text/javascript">

			var playlist = {!! json_encode($video->files()->web()->selectRaw('concat("/",file_upload) as file, img_file as image, "'.$video->title.'" as title')->get(), JSON_UNESCAPED_SLASHES) !!};

			var player = jwplayer('video');

			player.setup({
		        playlist: playlist,
				width: 500,
				height: 300
			});

        </script>
		@endpush
		@endif

		<br><br>
		{!! $video->desc !!}

		<hr>
		@include('layouts._share')
		<hr>

		@include('comment.index', [
		'comments' => $video->comments()
			->when((auth()->check() && !auth()->user()->isAdmin()) || auth()->guest(), function($query) {
				return $query->approved();
			})->get()
		])

		@if (auth()->check())
			@include('comment.form', [
				'url' => '/comment', 'method' => 'POST',
				'comment' => new \App\Comment([
					'commentable_id' => $video->video_id,
					'commentable_type' => 'video'
				])
			])
		@else
			<div class="alert alert-danger text-center">
				<strong>Silakan <a href="/login">login</a> untuk menulis komentar.</strong>
			</div>
		@endif


	</div>
	<div class="col-md-3">
		<h4 class="title">VIDEO TERKAIT</h4>
		@each('video._list-side', $terkait, 'video')
	</div>

</div>

@endsection
