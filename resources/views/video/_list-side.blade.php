<div class="media">
	<div class="media-left">
		<div style="width:60px;height:60px;">
			<img class="media-object cover" src="/{{ $video->img_video }}" alt="{{ $video->title }}">
		</div>
	</div>
	<div class="media-body">
		<strong>
			<a href="{{ $video->url }}">
				{{ $video->title }}
			</a>
		</strong>
		<div class="text-muted">
			{{ $video->user ? $video->user->name.' - ' : '' }}
			{{ $video->created->diffForHumans() }}
		</div>
	</div>
</div>
