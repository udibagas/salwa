<div class="well track text-center" audiourl="/{{ str_pad($a->surat_id, 3, '0', STR_PAD_LEFT) }}/{{ str_pad($a->ayat_id, 3, '0', STR_PAD_LEFT) }}.mp3" audio-title="Surah {{ $a->surat->nama }} : {{ $a->ayat_id }}">

	<div class="ayat text-info">{{ $a->ayat_text }}</div>

	<hr style="border-top:1px dashed #999;">

	<div class="terjemahan">
		<a href="/quran/{{ $a->surat_id}}:{{$a->ayat_id}}">
			[{{ $a->surat_id}}:{{ $a->ayat_id }}]
		</a>
		{{ $a->terjemahan }}
	</div>

	<hr style="border-top:1px dashed #999;">

	<span style="position:fixed;top:-1000px;left:-1000px;">
		<input type="text" name="ayat{{$a->surat_id}}_{{$a->ayat_id}}" value="{{$a->ayat_text."\n\n".$a->terjemahan}}" id="ayat{{$a->surat_id}}_{{$a->ayat_id}}">
	</span>

	@include('quran._share', [
		'ayah' => $a,
		'copytarget' => '#ayat'.$a->surat_id.'_'.$a->ayat_id
	])

	<div class="detail-ayah"></div>

</div>
