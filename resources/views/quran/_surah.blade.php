<div class="list-group affix" style="height:545px;overflow-x:hidden;overflow-y:auto;width:25%;">
	@foreach (\App\Surah::all() as $s)
	<a href="/quran/{{ $s->id }}" class="list-group-item @if (isset($surah->id) && $s->id == $surah->id) active  @endif">
		<div class="arab pull-right">{{ $s->arab }}</div>
		{{ $s->id }}. {{ strtoupper($s->nama) }} ({{ strtoupper($s->arti) }})
		<br>
		<small>{{ $s->ayat }} ayat &bull; {{ $s->jenis }}</small>
	</a>
	@endforeach
</div>
