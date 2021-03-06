@extends('layouts.main')

@section('title', 'Salwa Market: '. $produk->judul)

@section('content')

	<h4 class="title">SALWA MARKET</h4>
	<div class="row-post">
		<div class="media">
			<div class="media-left">
				<div class="thumbnail" style="width:80px;height:100px;">
					<img class="media-object cover" src="/{{ $produk->img_buku }}" alt="">
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

		<table class="table table-hover table-striped table-bordered table-condensed">
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

	@if (auth()->check() && auth()->user()->isAdmin())
		{!! Form::open(['method' => 'DELETE']) !!}
			{!! Form::hidden('redirect', '/produk') !!}
			@include('layouts.delete-btn-mobile')
			@include('layouts.edit-btn-mobile')
			<a href="/produk/create">@include('layouts.add-btn-mobile')</a>
		{!! Form::close() !!}
	@endif
@stop
