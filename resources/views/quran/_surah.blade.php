<div class="list-group" id="sidr-right">
	@foreach (\App\Surah::all() as $s)
	<a href="/quran/{{ $s->id }}" class="list-group-item @if (isset($surah->id) && $s->id == $surah->id) active  @endif">
		<div class="pull-right" style="font-size:18px;">{{ $s->arab }}</div>
		{{ $s->id }}. {{ strtoupper($s->nama) }} ({{ strtoupper($s->arti) }})
		<br>
		<small>{{ $s->ayat }} ayat &bull; {{ $s->jenis }}</small>
	</a>
	@endforeach
</div>
