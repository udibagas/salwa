<div class="row-post">
	<div class="media">
		<div class="media-left">
			<div class="thumbnail" style="height:60px;width:60px;">
				@if ($a->img_video)
				<img class="media-object cover" src="/{{ $a->img_video }}" alt="{{ $a->title }}">
				@else
				<img class="media-object profile" data-name="{{ $a->judul }}" alt="{{ $a->judul }}">
				@endif
			</div>
		</div>
		<div class="media-body">
			<a href="/video/{{ $a->video_id }}-{{ $a->title_code }}" class="text-bold">{{ $a->title }}</a>
			<br>
			<small>{{ $a->user ? $a->user->name.' | ' : '' }} {{ $a->created->diffForHumans() }}</small>
		</div>
	</div>
</div>
