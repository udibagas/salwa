<div class="row-post">
	<div class="media">
		<div class="media-left">
			<div class="thumbnail" style="height:60px;width:60px;">
				<img class="media-object cover" src="/images/logo-padding.png" alt="{{ $a->judul_pertanyaan }}">
			</div>
		</div>
		<div class="media-body">
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