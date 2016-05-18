@extends('layouts.cms')

@section('title', 'Informasi : Edit Informasi')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/informasi/admin' => 'INFORMASI',
			'#' => 'Edit Informasi',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-edit"></i> Edit Informasi</h4>
	@include('informasi._form', ['url' => '/informasi/'.$informasi->informasi_id, 'method' => 'PUT'])

@stop
