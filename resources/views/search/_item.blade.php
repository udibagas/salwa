<li class="list-group-item">
	@if ($p->nama_tabel == 'forums')
	<a href="/forum/{{ $p->id }}-{{ str_slug($p->judul) }}">
		<h4>{{ $p->judul }}</h4>
	</a>
	@elseif ($p->nama_tabel == 'videos')
	<a href="/video/{{ $p->id }}-{{ str_slug($p->judul) }}">
		<h4>{{ $p->judul }}</h4>
	</a>
	@elseif ($p->nama_tabel == 'mp3_download')
	<a href="/audio/{{ $p->id }}-{{ str_slug($p->judul) }}">
		<h4>{{ $p->judul }}</h4>
	</a>
	@elseif ($p->nama_tabel == 'murotal')
	<a href="/murottal/{{ $p->id }}-{{ str_slug($p->judul) }}">
		<h4>{{ $p->judul }}</h4>
	</a>
	@elseif ($p->nama_tabel == 'salwaimages')
	<a href="/image/{{ $p->id }}-{{ str_slug($p->judul) }}">
		<h4>{{ $p->judul }}</h4>
	</a>
	@else
	<a href="/{{ $p->nama_tabel }}/{{ $p->id }}-{{ str_slug($p->judul) }}">
		<h4>{{ $p->judul }}</h4>
	</a>
	@endif

	<?php
		$text = strip_tags($p->isi);
		$pos = stripos($text,request('q'));
		$start_pos = $pos-74;
		if($start_pos < 0) $start_pos = 0;
		$pot_text = substr($text,$start_pos,150);
	?>

	<p>{{ $pot_text }}</p>

	<div class="text-muted">
		{{ $p->tanggal->diffForHumans() }}
		in
		@if ($p->nama_tabel == 'forums')
		<a href="/forum/search?search={{ request('q') }}">forum</a>
		@elseif ($p->nama_tabel == 'videos')
		<a href="/video?search={{ request('q') }}">video</a>
		@elseif ($p->nama_tabel == 'mp3_download')
		<a href="/audio?search={{ request('q') }}">audio</a>
		@elseif ($p->nama_tabel == 'murotal')
		<a href="/murottal?search={{ request('q') }}">murottal</a>
		@elseif ($p->nama_tabel == 'salwaimages')
		<a href="/image?search={{ request('q') }}">image</a>
		@else
		<a href="/{{ $p->nama_tabel }}?search={{ request('q') }}">{{ $p->nama_tabel }}</a>
		@endif
	</div>
</li>
