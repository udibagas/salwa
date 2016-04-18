<div class="col-md-4">
	<div class="thumbnail" style="height:270px;">
		<a href="/video/{{ $video->video_id }}-{{ str_slug($video->title) }}"><img src="http://www.salamdakwah.com/{{ $video->img_video }}" style="width:100%;height:120px;" alt=""></a>
		<div class="caption">
			<h4><a href="/video/{{ $video->video_id }}-{{ str_slug($video->title) }}">{{ $video->title }}</a></h4>
			<b>{{ $video->user ? $video->user->name : '' }}</b><br />
			<em>{{ $video->updated->diffForHumans() }}</em>
		</div>
	</div>
</div>
