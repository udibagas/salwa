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
	<div class="col-sm-3 col-md-3 hidden-xs">
		@include('produk._group')
	</div>

	<div class="col-sm-6 col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<h2>{{ $produk->judul }}</h2>
				@include('layouts._share')
				<hr />

				<div class="row">
					<div class="col-sm-5 col-sm-4 col-md-4">
						<img src="/{{ $produk->img_buku }}" style="width:100%;margin-bottom:30px;" alt="" />
					</div>
					<div class="col-sm-7 col-md-8">
						<p>{!! $produk->sinopsis !!}</p>
						<table class="table table-hover table-striped table-bordered">
							<tbody>
								<tr>
									<th style="width:150px;">Penerbit</th>
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
				</div>
			</div>
		</div>

		@include('comment.index', [
			'comments' => $produk->comments()->approved()->get()
		])

		@if (auth()->check())
			@include('comment.form', [
				'url' => '/comment', 'method' => 'POST',
				'comment' => new \App\Comment([
					'commentable_id' => $produk->id_produk,
					'commentable_type' => 'produk'
				])
			])
		@else
			<div class="alert alert-danger text-center">
				<strong>Silakan <a href="/login">login</a> untuk menulis komentar.</strong>
			</div>
		@endif

	</div>
	<div class="col-sm-3 col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">PRODUK TERKAIT</h3>
			</div>
			<div class="panel-body">
				@each('produk._list-side', $terkait, 'produk')
			</div>
		</div>
	</div>
</div>



@stop
