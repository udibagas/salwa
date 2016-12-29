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

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-edit"></i> EDIT INFORMASI</h3>
		</div>
		<div class="panel-body">
			@include('informasi._form', ['url' => '/informasi/'.$informasi->informasi_id, 'method' => 'PUT'])
		</div>
	</div>


@stop
