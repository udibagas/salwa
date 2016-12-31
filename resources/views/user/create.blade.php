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

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-plus-circle"></i> CREATE USER</h3>
		</div>
		<div class="panel-body">
			@include('user._form', ['url' => '/user/', 'method' => 'POST'])
		</div>
	</div>

@stop
