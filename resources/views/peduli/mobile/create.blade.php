@extends('layouts.main')

@section('title', 'Peduli : Create New Peduli')

@section('content')

	<h4 class="title">TAMBAH PEDULI</h4>
	@include('peduli.mobile._form', ['url' => '/peduli', 'method' => 'POST'])

@stop
