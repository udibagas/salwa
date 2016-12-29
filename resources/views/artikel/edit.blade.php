@extends('layouts.cms')

@section('title', 'Artikel : Edit Artikel')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/artikel/admin' => 'ARTIKEL',
			'#' => 'Edit Artikel',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				<i class="fa fa-edit"></i> EDIT ARTIKEL
			</h3>
		</div>
		<div class="panel-body">
			@include('artikel._form', ['url' => '/artikel/'.$artikel->artikel_id, 'method' => 'PUT'])
		</div>
	</div>


@stop
