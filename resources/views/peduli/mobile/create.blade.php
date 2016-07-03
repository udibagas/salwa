@extends('layouts.main')

@section('title', 'Peduli : Create New Artikel')

@section('content')

	<h4 class="title">Tambah Artikel Baru</h4>
	@include('peduli.mobile._form', ['url' => '/peduli', 'method' => 'POST'])

@stop
