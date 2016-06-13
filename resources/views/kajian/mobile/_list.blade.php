<div class="row-post">
	<div class="media">
		@if ($a->img_kajian_photo)
		<div class="media-left">
			<div class="thumbnail" style="height:100px;width:80px;">
				<img class="media-object cover no-round" src="/{{ $a->img_kajian_photo }}" alt="{{ $a->kajian_tema }}">
			</div>
		</div>
		@endif

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
