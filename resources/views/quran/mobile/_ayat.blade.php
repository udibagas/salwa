<div class="row-post track" audiourl="/quran_audio/misyari/{{ $a->surat_id }}/{{ $a->ayat_id }}.mp3">
	<div class="ayat" audio-title="Surah {{ $a->surat->nama }} : {{ $a->ayat_id }}">
		{{ $a->ayat_text }}
	</div>
	<br>
	<div class="terjemahan">
		<a href="/quran/{{ $a->surat_id}}:{{$a->ayat_id}}">
			<b>[{{ $a->surat_id}}:{{ $a->ayat_id }}]</b>
		</a>
		{{ $a->terjemahan }}
	</div>
</div>
