<div class="row-post">
	<div class="media">
		<div class="media-left">
			<div class="thumbnail" style="height:40px;width:40px;">
				<img class="media-object profile" alt="{{ $a->judul_pertanyaan }}" data-name="{{ $a->judul_pertanyaan }}">
			</div>
		</div>
		<div class="media-body danger">
			<a href="/pertanyaan/{{ $a->pertanyaan_id }}-{{ $a->kd_judul }}" class="text-bold">
				{{ $a->judul_pertanyaan }}
			</a>
			<br>
			<small>
				{{ $a->user ? $a->user->jenis_kelamin == 'p' ? 'Ikhwan | ' : 'Akhwat | ' : '' }} {{ $a->created->diffForHumans() }}
			</small>
		</div>
	</div>
</div>
