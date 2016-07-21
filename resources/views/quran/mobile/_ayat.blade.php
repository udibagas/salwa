<div class="row-post track" audiourl="/{{ str_pad($a->surat_id, 3, '0', STR_PAD_LEFT) }}/{{ str_pad($a->ayat_id, 3, '0', STR_PAD_LEFT) }}.mp3" audio-title="Surah {{ $a->surat->nama }} : {{ $a->ayat_id }}">
	<div class="ayat">
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
