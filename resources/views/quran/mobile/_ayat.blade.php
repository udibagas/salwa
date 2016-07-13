<div class="row-post track" audiourl="/quran_audio/misyari/{{ $a->surat_id }}/{{ $a->ayat_id }}.mp3">
	<div class="text-right" audio-title="Surah {{ $a->surat->nama }} : {{ $a->ayat_id }}" style="font-size:22px;">
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
