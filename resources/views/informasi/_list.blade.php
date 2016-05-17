<div class="col-md-3">
	<div class="thumbnail" style="height:200px;">
		<a href="/informasi/{{ $informasi->informasi_id }}-{{ str_slug($informasi->judul) }}">
			@if ($informasi->img_gambar)
			<img src="/{{ $informasi->img_gambar }}" style="width:100%;height:200px;" alt="">
			@endif
			<div class="thumbnail-block">
				<div class="caption">
					<h4>{{ $informasi->judul }}</h4>
					<em>{{ $informasi->updated->diffForHumans() }}</em>
				</div>
			</div>
		</a>
	</div>
</div>
