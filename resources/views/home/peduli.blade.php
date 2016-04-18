<h4 class="title">SALWA PEDULI</h4>
<div class="row">
	@foreach ($peduli as $p)
		@include('peduli._list', ['peduli' => $p])
	@endforeach
</div>
