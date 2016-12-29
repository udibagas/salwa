@extends('layouts.cms')

@section('title', 'Artikel : Create New Artikel')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/artikel/admin' => 'ARTIKEL',
			'#' => 'New Artikel',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				<i class="fa fa-plus-circle"></i> TAMBAH ARTIKEL BARU
			</h3>
		</div>
		<div class="panel-body">
			@include('artikel._form', ['url' => '/artikel', 'method' => 'POST'])
		</div>
	</div>


@stop
