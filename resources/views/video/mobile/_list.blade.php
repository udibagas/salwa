<div class="row-post">
	<div class="media">
		<div class="media-left">
			<div class="initial-container">
				@if ($a->img_video)
				<img class="media-object cover img-circle" src="{{ Image::url($a->img_video,50,50,['crop']) }}" alt="{{ $a->title }}">
				@else
				<img class="media-object profile img-circle" data-name="{{ $a->judul }}" alt="{{ $a->judul }}">
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
