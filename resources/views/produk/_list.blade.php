<div class="col-md-3 col-sm-3">
	<div class="thumbnail" style="height:200px;">
		<a href="/produk/{{ $produk->id_produk }}-{{ str_slug($produk->judul) }}">
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
