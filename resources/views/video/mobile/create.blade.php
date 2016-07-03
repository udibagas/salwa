@extends('layouts.main')

@section('title', 'Video : Add New Video')

@section('content')

	<h4 class="title">TAMBAH VIDEO</h4>
	@include('video.mobile._form', ['url' => '/video', 'method' => 'POST'])

@stop
