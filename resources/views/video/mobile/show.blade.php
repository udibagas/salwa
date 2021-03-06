@extends('layouts.main')

@section('title') Video : {{ $video->title }} @stop
@section('image', 'http://www.salamdakwah.com/'.$video->img_video)
@section('description', $video->desc)

@section('content')

<div class="row-post">
	<h3>{{ $video->title }}</h3>
	<small>
		{{ $video->user ? $video->user->name.' | ' : '' }}
		{{ $video->created->diffForHumans() }}
	</small>

	<br><br>

	@if ($video->url_video_youtube)
	<iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ $video->url_video_youtube }}" frameborder="0" allowfullscreen></iframe>
	@endif

	@if (count($video->files))
		<div id="video"></div>
		@push('script')
			<script type="text/javascript">

				var playlist = {!! json_encode($video->files()->mobile()->selectRaw('concat("/",file_upload) as file, img_file as image, "'.$video->title.'" as title')->get(), JSON_UNESCAPED_SLASHES) !!};

				var player = jwplayer('video');

				player.setup({
			        playlist: playlist,
					width: 300,
					height: 200,
					// primary: 'html5',
					// modes: [
					// 	{ type: "html5" },
						// { type: "flash", src: "jwplayer.flash.swf" }
					// ]
				});

		    </script>
		@endpush
	@endif

	<br><br>
	{!! $video->desc !!}

</div>

<div class="row-post text-center">
	@include('layouts._share')
</div>

@include('comment.mobile.index', [
'comments' => $video->comments()
	->when((auth()->check() && !auth()->user()->isAdmin()) || auth()->guest(), function($query) {
		return $query->approved();
	})->get()
])

@if (auth()->check())
	@include('comment.mobile.form', [
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

<h4 class="title">VIDEO TERKAIT</h4>
@each('video.mobile._list', $terkait, 'a')

@include('video._group')

@if (auth()->check() && auth()->user()->isAdmin())
	{!! Form::open(['method' => 'DELETE']) !!}
		{!! Form::hidden('redirect', '/video') !!}
		@include('layouts.delete-btn-mobile')
		@include('layouts.edit-btn-mobile')
		<a href="/video/create">@include('layouts.add-btn-mobile')</a>
	{!! Form::close() !!}
@endif

@endsection
