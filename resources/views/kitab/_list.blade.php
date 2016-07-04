<div class="col-md-3 col-sm-4">
	<div class="thumbnail" style="height:275px;">
		<a href="/kitab/{{ $b->buku_id }}-{{ str_slug($b->judul) }}">
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
