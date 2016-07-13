<span class="list-group-item track" style="padding:20px;" audiourl="/quran_audio/misyari/{{ $a->surat_id }}/{{ $a->ayat_id }}.mp3" audio-title="Surah {{ $a->surat->nama }} : {{ $a->ayat_id }}">
	<div class="text-right ayat" style="font-size:24px;">
		{{ $a->ayat_text }}
	</div>
	<br>
	<div style="font-size:14px;text-align:justify" class="terjemahan">
		<a href="/quran/{{ $a->surat_id}}:{{$a->ayat_id}}">
			<b>[{{ $a->surat_id}}:{{ $a->ayat_id }}]</b>
		</a>
		{{ $a->terjemahan }}
	</div>
</span>
