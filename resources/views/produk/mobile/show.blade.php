@extends('layouts.main')

@section('title', 'Salwa Market: '. $produk->judul)

@section('content')

	<h4 class="title"><i class="fa fa-book"></i> SALWA MARKET</h4>
	<div class="row-post">
		<div class="media">
			<div class="media-left">
				<div class="thumbnail" style="width:80px;height:100px;">
					<img class="media-object cover no-round" src="/{{ $produk->img_buku }}" alt="" style="width:200px;">
				</div>
			</div>
			<div class="media-body">
				<h3 style="margin-top:0;">{{ $produk->judul }}</h3>
				<strong>Rp. {{ $produk->harga }}</strong><br>
			</div>
		</div>
	</div>

	<div class="row-post">
		<p>{!! $produk->sinopsis !!}</p>
	</div>

	<div class="row-post">
		<table class="table table-hover table-striped table-bordered">
			<tbody>
				<tr>
					<th>Penerbit</th>
					<td>: {{ $produk->penerbit }}</td>
				</tr>
				<tr>
					<th>Penulis</th>
					<td>: {{ $produk->penulis }}</td>
				</tr>
				<tr>
					<th>Harga</th>
					<td>: Rp. {{ $produk->harga }}</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="row-post text-center">
		@include('layouts._share')
	</div>

	<h4 class="title">PRODUK TERKAIT</h4>
	@each('produk.mobile._list', $terkait, 'a')
	@include('produk._group')
@stop
