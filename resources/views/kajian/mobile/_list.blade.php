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
			<strong>{{ $a->ustadz ? $a->ustadz->ustadz_name : '' }}</strong><br />
			<em>
				@if ($a->jenis_kajian == 1)
				{{ $a->kajian_dates }}
				@elseif ($a->jenis_kajian == 2)
				{{ \App\Kajian::getHari($a->setiap_hari) }}, {{ $a->setiap_jam }}
				@else
				{{ $a->setiap_tanggal }}
				@endif
			</em>
		</div>
	</div>
</div>
