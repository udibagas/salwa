<div class="col-md-4 col-sm-4 col-md-4">
	<div class="thumbnail" style="height:270px;">
		<a href="/video/{{ $video->video_id }}-{{ str_slug($video->title) }}">
			@if ($video->img_video)
			<img src="/{{ $video->img_video }}" alt="{{ $video->title }}">
			@endif
			<div class="video-block">
			</div>
			<div class="caption">
				<h2>{{ $video->title }}</h2>
				{{ $video->user ? $video->user->name : '' }}<br />
				<em>{{ $video->updated->diffForHumans() }}</em>
			</div>
		</a>
	</div>
</div>
