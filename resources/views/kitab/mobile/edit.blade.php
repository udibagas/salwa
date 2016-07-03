@extends('layouts.main')

@section('title', 'Kitab : Edit Kitab')

@section('content')

	<h4 class="title">EDIT KITAB</h4>
	@include('kitab.mobile._form', ['url' => '/kitab/'.$kitab->buku_id, 'method' => 'PUT'])

@stop
