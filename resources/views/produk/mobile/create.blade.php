@extends('layouts.main')

@section('title', 'Salwa Market : Add New Product')

@section('content')

	<h4 class="title">TAMBAH PRODUK</h4>
	@include('produk.mobile._form', ['url' => '/produk', 'method' => 'POST'])

@stop
