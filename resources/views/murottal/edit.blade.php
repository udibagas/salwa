@extends('layouts.cms')

@section('title', 'Murottal : Edit Murottal')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/murottal/admin' => 'MUROTTAL',
			'#' => 'Edit Murottal',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-edit"></i> Edit Murottal</h4>
	@include('murottal._form', ['url' => '/murottal/'.$murottal->murotal_id, 'method' => 'PUT'])

@stop
