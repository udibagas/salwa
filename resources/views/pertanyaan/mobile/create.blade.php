@extends('layouts.main')

@section('title', 'Tanya Ustadz : Input Pertanyaan')

@section('content')

	<h4 class="title">INPUT PERTANYAAN</h4>
	@include('pertanyaan.mobile._form', ['url' => '/pertanyaan', 'method' => 'post'])
	@include('pertanyaan._panduan')
	@include('pertanyaan._group')

@endsection
