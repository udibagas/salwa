@extends('layouts.main')

@section('title') Forum @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'FORUM',
		]
	])

@stop

@section('content')

	<div class="row">

		<div class="col-md-3 hidden-xs">
			@include('forum._group', ['group' => null])
		</div>

		<div class="col-md-6">
			@each('forum._list', $groups, 'group')
		</div>

		<div class="col-md-3">
			@include('forum._panduan')
		</div>

	</div>

@stop
