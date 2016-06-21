<div class="row-post">
	<div class="media">
		<div class="media-left">
			<div class="thumbnail" style="width:80px;height:100px;">
				<img class="media-object cover no-round" src="/{{ $a->img_buku }}" alt="{{ $a->judul }}">
			</div>
		</div>
		<div class="media-body">
			<strong><a href="/produk/{{ $a->id_produk }}-{{ str_slug($a->judul) }}">{{ $a->judul }}</a></strong>
			<br />

			<strong>Rp. {{ $a->harga }}</strong>
			<br>

			{{ strip_tags($a->sinopsis_kecil) }}
		</div>
	</div>
</div>
