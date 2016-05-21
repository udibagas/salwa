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

	<h4 class="title"><i class="fa fa-edit"></i> Edit Ustadz</h4>
	@include('ustadz._form', ['url' => '/ustadz/'.$ustadz->ustadz_id, 'method' => 'PUT'])

@stop
