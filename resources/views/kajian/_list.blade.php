<div class="col-md-3 col-sm-4">
	<div class="thumbnail" style="height:200px;">
		<a href="/kajian/{{ $kajian->kajian_id }}-{{ str_slug($kajian->kajian_tema) }}">
			@if ($kajian->img_kajian_photo)
			<img src="/{{ $kajian->img_kajian_photo }}" alt="">
			@endif
			<div class="thumbnail-block">
			</div>
			<div class="caption">
				<h2>{{ $kajian->kajian_tema }}</h2>
				{{ $kajian->ustadz ? $kajian->ustadz->ustadz_name : '' }}<br />
				<em>
					@if ($kajian->jenis_kajian == 1)
					{{ $kajian->kajian_dates }}
					@elseif ($kajian->jenis_kajian == 2)
					{{ \App\Kajian::getHari($kajian->setiap_hari) }}, {{ $kajian->setiap_jam }}
					@else
					{{ $kajian->setiap_tanggal }}
					@endif
				</em>
			</div>
		</a>
	</div>
</div>
