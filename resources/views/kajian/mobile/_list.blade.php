<div class="row-post">
	<div class="media">
		<div class="media-left">
			<div style="height:100px;width:80px;">
				@if ($a->img_kajian_photo)
				<img class="media-object cover" src="/{{ $a->img_kajian_photo }}" alt="{{ $a->kajian_tema }}">
				@else
				<img class="media-object profile" data-width="80" data-height="100" data-name="{{ $a->kajian_tema }}" alt="{{ $a->kajian_tema }}">
				@endif
			</div>
		</div>

		<div class="media-body">
			<strong>
				<a href="/kajian/{{ $a->kajian_id }}-{{ str_slug($a->kajian_tema) }}">{{ $a->kajian_tema }}</a>
			</strong>
			<br>
			<i class="fa fa-user"></i> <strong>{{ $a->ustadz ? $a->ustadz->ustadz_name : '' }}</strong><br>
			<i class="fa fa-clock-o"></i> <em>
				@if ($a->jenis_kajian == 1)
				{{ $a->kajian_dates }}
				@elseif ($a->jenis_kajian == 2)
				{{ \App\Kajian::getHari($a->setiap_hari) }}, {{ $a->setiap_jam }}
				@else
				{{ $a->setiap_tanggal }}
				@endif
			</em><br>
			<i class="fa fa-map-marker"></i> {{ $a->kajian_tempat }}
		</div>
	</div>
</div>
