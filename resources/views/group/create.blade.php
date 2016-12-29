@extends('layouts.cms')

@section('title', 'Group : Add New Group')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/group' => 'GROUPS',
			'#' => 'ADD GROUP',
		]
	])

@stop

@section('cms-content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-plus-circle"></i> ADD NEW GROUP</h3>
		</div>
		<div class="panel-body">
			@include('group._form', ['url' => '/group', 'method' => 'POST'])
		</div>
	</div>
@endsection
