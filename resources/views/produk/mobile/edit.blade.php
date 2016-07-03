@extends('layouts.main')

@section('title', 'Produk : Edit Produk')

@section('content')

	<h4 class="title">EDIT PRODUK</h4>
	@include('produk.mobile._form', ['url' => '/produk/'.$produk->id_produk, 'method' => 'PUT'])

@stop
