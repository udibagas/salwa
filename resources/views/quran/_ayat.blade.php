<span class="list-group-item track" style="padding:20px;" audiourl="/{{ str_pad($a->surat_id, 3, '0', STR_PAD_LEFT) }}/{{ str_pad($a->ayat_id, 3, '0', STR_PAD_LEFT) }}.mp3" audio-title="Surah {{ $a->surat->nama }} : {{ $a->ayat_id }}">
	<!-- <div class="ayat" audio-title="Surah {{ $a->surat->nama }} : {{ $a->ayat_id }}">
		{{ $a->ayat_text }}
	</div> -->
	<img src="/quran_image/per-ayat/{{ $a->surat_id }}_{{ $a->ayat_id }}.png" class="img-responsive" alt="{{ $a->ayat_text }}" />
	<br>
	<div style="font-size:14px;text-align:justify" class="terjemahan">
		<a href="/quran/{{ $a->surat_id}}:{{$a->ayat_id}}">
			<b>[{{ $a->surat_id}}:{{ $a->ayat_id }}]</b>
		</a>
		{{ $a->terjemahan }}
	</div>
</span>
