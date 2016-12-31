@extends('layouts.cms')

@section('title', 'Murottal : Create New Murottal')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/murottal/admin' => 'MUROTTAL',
			'#' => 'New Murottal',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-plus-circle"></i> TAMBAH MUROTTAL BARU</h3>
		</div>
		<div class="panel-body">
			@include('murottal._form', ['url' => '/murottal', 'method' => 'POST'])
		</div>
	</div>

@stop
