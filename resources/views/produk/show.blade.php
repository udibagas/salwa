@extends('layouts.main')

@section('title') Produk : {{ $produk->judul }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/produk' => 'PRODUK',
			'#' => $produk->judul
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-9">
		<h1>{{ $produk->judul }}</h1><hr />

		<div class="row">
			<div class="col-md-5">
				<img src="http://www.salamdakwah.com/{{ $produk->img_buku }}" style="width:100%;margin-bottom:30px;" alt="" />
			</div>
			<div class="col-md-7">
				<p>{!! $produk->sinopsis !!}</p>
				<table class="table table-hover table-striped">
					<tbody>
						<tr>
							<th>Penerbit</th>
							<td>: {{ $produk->penerbit }}</td>
						</tr>
						<tr>
							<th>Harga</th>
							<td>: Rp. {{ $produk->harga }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<hr>
		@include('layouts._share', ['url' => url('/produk/'.$produk->id_produk.'-'.str_slug($produk->judul))])
		<hr>

		<h4 class="title">PRODUK TERKAIT</h4>
		<div class="row">
			@foreach ($terkait as $t)
				@include('produk._list', ['produk' => $t])
			@endforeach
		</div>

	</div>

	<div class="col-md-3">
		@include('home.sidebar')
	</div>
</div>



@stop
