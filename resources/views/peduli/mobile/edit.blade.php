@extends('layouts.main')

@section('title', 'Peduli : Edit Artikel')

@section('content')

	<h4 class="title">Edit Artikel</h4>
	@include('peduli.mobile._form', ['url' => '/peduli/'.$peduli->peduli_id, 'method' => 'PUT'])

@stop
