<div class="player">
	<span class="btn-group">
		<a href="#" class="btn btn-info btn-lg prev">
			<i class="fa fa-step-backward"></i>
		</a>
		<a href="#" class="btn btn-info btn-lg pause">
			<i class="fa fa-pause"></i>
		</a>
		<a href="@if ($ayats->count()) /quran_audio/misyari/{{ $ayats->first()->surat_id }}/{{ $ayats->first()->ayat_id }}.mp3 @endif" class="btn btn-info btn-lg play">
			<i class="fa fa-play"></i>
		</a>
		<a href="#" class="btn btn-info btn-lg next">
			<i class="fa fa-step-forward"></i>
		</a>
	</span>
</div>
