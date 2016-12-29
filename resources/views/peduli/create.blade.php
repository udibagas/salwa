@extends('layouts.cms')

@section('title', 'Peduli : Create New Artikel')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/peduli/admin' => 'PEDULI',
			'#' => 'New Artikel',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-plus-circle"></i> TAMBAH PEDULI BARU</h3>
		</div>
		<div class="panel-body">
			@include('peduli._form', ['url' => '/peduli', 'method' => 'POST'])
		</div>
	</div>

@stop
