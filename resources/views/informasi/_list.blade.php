<div class="col-md-3 col-sm-3">
	<div class="thumbnail" style="height:200px;">
		<a href="/informasi/{{ $informasi->informasi_id }}-{{ str_slug($informasi->judul) }}">
			@if ($informasi->img_gambar)
			<img src="/{{ $informasi->img_gambar }}" alt="{{ $informasi->judul }}">
			@endif
			<div class="thumbnail-block">
			</div>
			<div class="caption">
				<h4>{{ $informasi->judul }}</h4>
				<em>{{ $informasi->updated->diffForHumans() }}</em>
			</div>
		</a>
	</div>
</div>
