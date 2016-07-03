@extends('layouts.main')

@section('title', 'Image : Create New Image')

@section('content')

	<h4 class="title">TAMBAH IMAGE</h4>
	@include('image.mobile._form', ['url' => '/image', 'method' => 'POST'])

@stop
