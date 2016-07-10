<span class="list-group-item" style="padding:20px;">
	<div class="text-right" style="font-size:30px;">
		{{ $a->ayat_text }}
	</div>
	<br>
	<div style="font-size:16px;text-align:justify" class="terjemahan">
		<a href="/quran/{{ $a->surat_id}}:{{$a->ayat_id}}">
			<b>[{{ $a->surat_id}}:{{ $a->ayat_id }}]</b>
		</a>
		{{ $a->terjemahan }}
	</div>
</span>
