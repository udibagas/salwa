<div class="media">
	<div class="media-left">
		<div style="width:60px;height:60px;">
			<img class="media-object cover" src="/{{ $produk->img_buku }}" alt="{{ $produk->judul }}">
		</div>
	</div>
	<div class="media-body">
		<strong>
			<a href="{{ $produk->url }}">
				{{ $produk->judul }}
			</a>
		</strong>
		<div class="text-muted">
			{{ $produk->penerbit }}<br>
			Rp. {{ $produk->harga }}
		</div>
	</div>
</div>
