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
	<h4 class="title"><i class="fa fa-tags"></i> EDIT POPUP</h4>
	@include('popup._form', ['url' => '/popup/'.$popup->id, 'method' => 'PUT'])
@endsection
