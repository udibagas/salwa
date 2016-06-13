@extends('layouts.main')

@section('title', 'Forum : {{ $group->group_name }}')

@section('content')

	<h4 class="title">{{ $group->group_name }}</h4>
	@each('forum.mobile._list', $forums, 'a')

	<div class="text-center">
		{!! $forums->links() !!}
	</div>

	@include('forum._group')

@stop
