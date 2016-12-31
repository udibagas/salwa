@extends('layouts.cms')

@section('title', 'Popup : Add New Popup')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/popup' => 'POPUPS',
			'#' => 'EDIT POPUP',
		]
	])

@stop

@section('cms-content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-edit"></i> EDIT POPUP</h3>
		</div>
		<div class="panel-body">
			@include('popup._form', ['url' => '/popup/'.$popup->id, 'method' => 'PUT'])
		</div>
	</div>
@endsection
