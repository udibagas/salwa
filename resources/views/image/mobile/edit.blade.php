@extends('layouts.main')

@section('title', 'Image : Edit Image')

@section('content')

	<h4 class="title">EDIT IMAGE</h4>
	@include('image.mobile._form', ['url' => '/image/'.$image->id_salwaimages, 'method' => 'PUT'])

@stop
