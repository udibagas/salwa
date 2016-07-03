@extends('layouts.main')

@section('title', 'Audio : Create New Audio')

@section('content')

	<h4 class="title">TAMBAH AUDIO</h4>
	@include('audio.mobile._form', ['url' => '/audio', 'method' => 'POST'])

@stop
