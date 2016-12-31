@extends('layouts.user')

@section('title', 'Profile : '.$user->name)

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'USER PROFILE',
			'' => $user->name
		]
	])

@stop

@section('user-content')

	@if (session('error'))
		<div class="alert alert-danger text-center">
			<strong>{{ session('error') }}</strong>
		</div>
	@endif

	@if (session('success'))
		<div class="alert alert-success text-center">
			<strong>{{ session('success') }}</strong>
		</div>
	@endif

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				<i class="fa fa-user"></i> USER PROFILE
			</h3>
		</div>
		<div class="panel-body">
			@include('user._form', ['url' => '/user/'.$user->user_id, 'method' => 'PUT'])
		</div>
	</div>
@stop
