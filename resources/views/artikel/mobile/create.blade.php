@extends('layouts.main')

@section('title', 'Artikel : Create New Artikel')

@section('content')

	<h4 class="title">Tambah Artikel Baru</h4>
	<div class="row-post">
		@include('artikel.mobile._form', ['url' => '/artikel', 'method' => 'POST'])
	</div>

@stop
