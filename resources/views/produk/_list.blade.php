<div class="col-sm-3 col-md-3 col-sm-3 col-md-3">
	<div class="thumbnail" style="height:200px;">
		<a href="{{ $produk->url }}">
			<img src="/{{ $produk->img_buku }}" alt="">
			<div class="thumbnail-block">
				<div class="caption">
					<h4>{{ $produk->judul }}</h4>
					{{ $produk->penerbit }}<br />
					<em>Rp {{ $produk->harga }}</em>
				</div>
			</div>
		</a>
	</div>
</div>
