@extends('layouts.main')

@section('title', 'Informasi : Edit Informasi')

@section('content')

	<h4 class="title">EDIT INFORMASI</h4>
	@include('informasi.mobile._form', ['url' => '/informasi/'.$informasi->informasi_id, 'method' => 'PUT'])

@stop
