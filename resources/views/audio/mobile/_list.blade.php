<div class="row-post">
	<div class="media">
		<div class="media-left">
			<div class="initial-container">
				<img class="media-object profile img-circle" alt="{{ $a->judul }}" data-name="{{ $a->judul }}" />
			</div>
		</div>
		<div class="media-body">
			<strong><a href="/audio/{{ $a->mp3_download_id }}-{{ str_slug($a->judul) }}">{{ $a->judul }}</a></strong>
			<br>
			<small>{{ $a->updated->diffForHumans() }}</small>
		</div>
	</div>
</div>
