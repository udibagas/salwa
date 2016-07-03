@extends('layouts.main')

@section('title', 'Informasi : Edit Informasi')

@section('content')

	<h4 class="title"><i class="fa fa-edit"></i> Edit Informasi</h4>
	@include('informasi.mobile._form', ['url' => '/informasi/'.$informasi->informasi_id, 'method' => 'PUT'])

@stop
