@extends('layouts.cms')

@section('title', 'Kitab : Add New Kitab')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kitab/admin' => 'KITAB & TERJEMAHAN',
			'#' => 'New Kitab',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-plus-circle"></i> TAMBAH KITAB BARU</h3>
		</div>
		<div class="panel-body">
			@include('kitab._form', ['url' => '/kitab', 'method' => 'POST'])
		</div>
	</div>


@stop
