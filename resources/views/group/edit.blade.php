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
	<h4 class="title"><i class="fa fa-tags"></i> EDIT GROUP</h4>
	@include('group._form', ['url' => '/group/'.$model->group_id, 'method' => 'PUT'])
@endsection
