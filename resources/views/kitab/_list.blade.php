<div class="col-sm-4 col-md-3">
	<div class="thumbnail" style="height:275px;">
		<a href="{{ $b->url }}">
			<img src="/{{ $b->img_buku }}" alt="{{ $b->judul }}">
			<div class="thumbnail-block">
			</div>
			<div class="caption">
				<strong>{{ $b->judul }}</strong><br>
				{{ $b->penulis }}
			</div>
		</a>
	</div>
</div>
