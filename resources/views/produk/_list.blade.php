<div class="col-md-4">
	<div class="thumbnail" style="height:270px;">
		<a href="/produk/{{ $produk->id_produk }}-{{ str_slug($produk->judul) }}"><img src="http://www.salamdakwah.com/{{ $produk->img_buku }}" style="width:100%;height:120px;" alt=""></a>
		<div class="caption">
			<h4><a href="/produk/{{ $produk->id_produk }}-{{ str_slug($produk->judul) }}">{{ $produk->judul }}</a></h4>
			<b>{{ $produk->penerbit }}</b><br />
			<em>Rp {{ $produk->harga }}</em>
		</div>
	</div>
</div>
