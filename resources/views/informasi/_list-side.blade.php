<div class="media">
	<div class="media-left">
		<div style="width:60px;height:60px;">
			<img class="media-object cover" src="/{{ $informasi->img_gambar }}" alt="{{ $informasi->judul }}">
		</div>
	</div>
	<div class="media-body">
		<strong>
			<a href="/informasi/{{ $informasi->informasi_id }}-{{ str_slug($informasi->judul) }}">
				{{ $informasi->judul }}
			</a>
		</strong>
		<div class="text-muted">
			{{ $informasi->updated->diffForHumans() }}
		</div>
	</div>
</div>
