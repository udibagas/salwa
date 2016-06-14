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
	<div class="col-md-3 hidden-xs">
		@include('produk._group')
	</div>

	<div class="col-md-9">
		<h2>{{ $produk->judul }}</h2><hr />

		<div class="row">
			<div class="col-md-7 col-sm-8">
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
			<div class="col-md-5 col-sm-4">
				<img src="/{{ $produk->img_buku }}" style="width:100%;margin-bottom:30px;" alt="" />
			</div>
		</div>

		<hr>
		@include('layouts._share')
		<hr>

		@include('comment.index', [
		'comments' => $produk->comments()
					->when((auth()->check() && !auth()->user()->isAdmin()) || auth()->guest(), function($query) {
						return $query->approved();
					})->get()
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

		<h4 class="title">PRODUK TERKAIT</h4>
		<div class="row no-gutter">
			@each('produk._list', $terkait, 'produk')
		</div>

	</div>
</div>



@stop
