<h4 class="title">SALWA MARKET</h4>
<div class="row">
	@foreach ($produk as $p)
		@include('produk._list', ['produk' => $p])
	@endforeach
</div>
