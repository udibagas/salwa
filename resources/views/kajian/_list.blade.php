<div class="col-sm-4 col-sm-6">
	<div class="thumbnail" style="height:270px;">
		<a href="/kajian/{{ $kajian->id }}-{{ str_slug($kajian->tema) }}">
			@if ($kajian->brosur)
			<img src="/{{ $kajian->brosur }}" alt="">
			@endif
			<div class="thumbnail-block">
			</div>
			<div class="caption">
				<h2>{{ $kajian->tema }}</h2>
				{{ $kajian->ustadz ? 'Ustadz '.$kajian->ustadz->ustadz_name : '' }}<br />
				<em>{{ $kajian->waktuParsed }}</em><br>
				{{ $kajian->tempat_lengkap }}
			</div>
		</a>
	</div>
</div>
