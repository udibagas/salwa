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
	<h4 class="title"><i class="fa fa-tags"></i> ADD NEW GROUP</h4>
	@include('group._form', ['url' => '/group', 'method' => 'POST'])
@endsection
