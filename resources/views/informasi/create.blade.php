@extends('layouts.cms')

@section('title', 'Informasi : Create New Informasi')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/informasi/admin' => 'INFORMASI',
			'#' => 'New Informasi',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-plus-circle"></i> Tambah Informasi Baru</h4>
	@include('informasi._form', ['url' => '/informasi', 'method' => 'POST'])

@stop
