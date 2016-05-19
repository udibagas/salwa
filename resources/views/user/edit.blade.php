@extends('layouts.cms')

@section('title', 'User : Edit User')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/user' => 'USER',
			'#' => 'Edit User',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-edit"></i> Edit User</h4>
	@include('user._form', ['url' => '/user/'.$user->user_id, 'method' => 'PUT'])

@stop
