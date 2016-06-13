@extends('layouts.main')

@section('title', 'Salwa Market')

@section('content')

	<h4 class="title"><i class="fa fa-shopping-cart"></i> SALWA MARKET</h4>
	@each('produk.mobile._list', $produks, 'a')

	<div class="text-center">
		{!! $produks->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
	</div>

	@include('produk._group')

@stop
