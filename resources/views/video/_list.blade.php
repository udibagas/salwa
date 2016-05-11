<div class="col-md-4 col-sm-6">
	<div class="thumbnail" style="height:270px;">
		<a href="/video/{{ $video->video_id }}-{{ str_slug($video->title) }}">
			@if ($video->img_video)
			<img src="http://www.salamdakwah.com/{{ $video->img_video }}" style="width:100%;height:270px;" alt="">
			@endif
			<div class="caption">
				<h2>{{ $video->title }}</h2>
				<b>{{ $video->user ? $video->user->name : '' }}</b><br />
				<em>{{ $video->updated->diffForHumans() }}</em>
			</div>
		</a>
	</div>
</div>
