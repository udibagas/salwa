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

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-plus-circle"></i> TAMBAH INFORMASI BARU</h3>
		</div>
		<div class="panel-body">
			@include('informasi._form', ['url' => '/informasi', 'method' => 'POST'])
		</div>
	</div>


@stop
