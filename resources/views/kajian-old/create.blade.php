@extends('layouts.cms')

@section('title', 'Kajian : Add New Kajian')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kajian/admin' => 'KAJIAN',
			'#' => 'New kajian',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-plus-circle"></i> TAMBAH KAJIAN BARU</h3>
		</div>
		<div class="panel-body">
			@include('kajian-old._form', ['url' => '/kajian', 'method' => 'POST'])
		</div>
	</div>

@stop
