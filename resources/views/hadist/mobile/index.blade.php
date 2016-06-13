@extends('layouts.main')

@section('title', 'Hadist')

@section('content')

	<h4 class="title"><i class="fa fa-list-alt"></i> {{ $groupName or "Hadist" }}</h4>
	@each('hadist.mobile._list', $hadists, 'a')

	<div class="text-center">
		{!! $hadists->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
	</div>

	@include('hadist._group')

@stop
