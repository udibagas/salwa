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

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-edit"></i> EDIT MUROTTAL</h3>
		</div>
		<div class="panel-body">
			@include('murottal._form', ['url' => '/murottal/'.$murottal->murotal_id, 'method' => 'PUT'])
		</div>
	</div>


@stop
