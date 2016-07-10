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
</div>
