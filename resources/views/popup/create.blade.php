@extends('layouts.cms')

@section('title', 'Popup : Add New Popup')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/popup' => 'POPUP',
			'#' => 'ADD POPUP',
		]
	])

@stop

@section('cms-content')
	<h4 class="title"><i class="fa fa-image"></i> ADD NEW POPUP</h4>
	@include('popup._form', ['url' => '/popup', 'method' => 'POST'])
@endsection
