@extends('layouts.cms')

@section('title', 'Lokasi : Edit Lokasi')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/lokasi' => 'Lokasi',
			'#' => 'Edit Area',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-edit"></i> Edit Lokasi</h4>
	@include('lokasi._form', ['url' => '/lokasi/'.$lokasi->id_lokasi, 'method' => 'PUT'])

@stop
