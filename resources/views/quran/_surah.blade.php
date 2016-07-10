<div class="list-group" id="sidr-right">
	@foreach (\App\Surah::all() as $s)
	<a href="/quran/{{ $s->id }}" class="list-group-item info @if (isset($surah->id) && $s->id == $surah->id) active  @endif">
		<div class="pull-right" style="font-size:18px;">{{ $s->arab }}</div>
		<strong>{{ $s->id }}. {{ $s->nama }} ({{ $s->arti }})</strong>
		<br>
		<small class="">
			{{ $s->ayat }} ayat &bull; {{ $s->jenis }}
		</small>
	</a>
	@endforeach
</div>
