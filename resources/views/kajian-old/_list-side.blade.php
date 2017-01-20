<div class="media">
	<div class="media-left">
		<div style="width:70px;height:80px;">
			@if ($kajian->img_kajian_photo)
			<img class="media-object cover" src="/{{ $kajian->img_kajian_photo }}" alt="{{ $kajian->kajian_tema }}">
			@else
			<img class="media-object profile cover" data-name="{{ $kajian->kajian_tema }}" alt="{{ $kajian->kajian_tema }}">
			@endif
		</div>
	</div>
	<div class="media-body">
		<strong>
			<a href="/kajian/{{ $kajian->kajian_id }}-{{ str_slug($kajian->kajian_tema) }}">
				{{ $kajian->kajian_tema }}
			</a>
		</strong><br>
		{{ $kajian->ustadz ? $kajian->ustadz->ustadz_name : '' }} <br />
		<i>
			@if ($kajian->jenis_kajian == 1)
			{{ $kajian->kajian_dates }}
			@elseif ($kajian->jenis_kajian == 2)
			{{ \App\KajianOld::getHari($kajian->setiap_hari) }}, {{ $kajian->setiap_jam }}
			@else
			{{ $kajian->setiap_tanggal }}
			@endif
		</i>
	</div>
</div>
