@extends('layouts.main')

@section('title', 'Kitab : Add New Kitab')

@section('content')

	<h4 class="title">TAMBAH KITAB</h4>
	@include('kitab.mobile._form', ['url' => '/kitab', 'method' => 'POST'])

@stop
