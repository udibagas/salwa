<div class="row-post">
	<div class="text-right" style="font-size:22px;">
		{{ $a->ayat_text }}
	</div>
	<br>
	<div class="terjemahan">
		<a href="/quran/{{ $a->surat_id}}:{{$a->ayat_id}}">
			<b>[{{ $a->surat_id}}:{{ $a->ayat_id }}]</b>
		</a>
		{{ $a->terjemahan }}
	</div>
	<br>

	<audio controls="controls" preload="none" style="width:100%"><source src="/quran_audio/misyari/{{ $a->surat_id }}/{{ $a->ayat_id }}.mp3" type="application/ogg"></source></audio>
</div>
