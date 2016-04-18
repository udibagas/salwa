<h4 class="title">SALWA MARKET</h4>
<div class="row">
	@foreach ($produk as $p)
	<div class="col-md-4">
		<div class="thumbnail" style="height:270px;">
			<a href="/market/show"><img src="http://www.salamdakwah.com/{{ $p->img_buku }}" style="width:100%;height:120px;" alt=""></a>
			<div class="caption">
				<h4><a href="/market/show">{{ $p->judul }}</a></h4>
				<b>{{ $p->penerbit }}</b><br />
				<em>Rp {{ $p->harga }}</em>
			</div>
		</div>
	</div>
	@endforeach
</div>
