@extends('layouts.main')

@section('title', 'Informasi : Create New Informasi')


@section('content')

	<h4 class="title">TAMBAH INFORMASI</h4>
	@include('informasi.mobile._form', ['url' => '/informasi', 'method' => 'POST'])

@stop
