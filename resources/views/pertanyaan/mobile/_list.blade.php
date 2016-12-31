<div class="row-post">
	<div class="media">
		<div class="media-left">
			<div class="initial-container">
				<img class="media-object profile img-circle" alt="{{ $a->judul_pertanyaan }}" data-name="{{ $a->judul_pertanyaan }}">
			</div>
		</div>
		<div class="media-body danger">
			<a href="{{ $a->url }}" class="text-bold">{{ $a->judul_pertanyaan }}</a>
			<br>
			<small>
				{{ $a->user ? $a->user->jenis_kelamin == 'p' ? 'Ikhwan | ' : 'Akhwat | ' : '' }} {{ $a->created->diffForHumans() }}
			</small>
		</div>
	</div>
</div>
