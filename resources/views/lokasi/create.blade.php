@extends('layouts.cms')

@section('title', 'Lokasi : Add New Lokasi')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/lokasi/admin' => 'USTADZ',
			'#' => 'New Lokasi',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-plus-circle"></i> Tambah Lokasi Baru</h4>
	@include('lokasi._form', ['url' => '/lokasi', 'method' => 'POST'])

@stop
