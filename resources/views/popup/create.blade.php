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
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-plus-circle"></i> ADD NEW POPUP</h3>
		</div>
		<div class="panel-body">
			@include('popup._form', ['url' => '/popup', 'method' => 'POST'])
		</div>
	</div>
@endsection
