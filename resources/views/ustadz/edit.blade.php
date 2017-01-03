@extends('layouts.cms')

@section('title', 'Ustadz : Edit Ustadz')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/ustadz/admin' => 'USTADZ',
			'#' => 'Edit Ustadz',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-edit"></i> EDIT USTADZ</h3>
		</div>
		<div class="panel-body">
			@include('ustadz._form', ['url' => '/ustadz/'.$ustadz->ustadz_id, 'method' => 'PUT'])
		</div>
	</div>

@stop
