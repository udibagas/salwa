@extends('layouts.main')

@section('title', 'Forum : '.$group->group_name)

@section('content')

	<h4 class="title">{{ $group->group_name }}</h4>
	@each('forum.mobile._list', $forums, 'a')

	<div class="text-center">
		{!! $forums->links() !!}
	</div>

	@include('forum._group')

	<a href="/forum/create">
		<img class="profile img-circle" data-width="40" data-height="40" data-name="+" style="position:fixed;bottom:20px;right:20px;" />
	</a>

@stop
