@extends('layouts.cms')

@section('title', 'Group : Add New Group')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/group' => 'GROUPS',
			'#' => 'EDIT GROUP',
		]
	])

@stop

@section('cms-content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-edit"></i> EDIT GROUP</h3>
		</div>
		<div class="panel-body">
			@include('group._form', ['url' => '/group/'.$group->group_id, 'method' => 'PUT'])
		</div>
	</div>
@endsection
