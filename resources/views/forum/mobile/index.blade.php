@extends('layouts.main')

@section('title') Forum @stop

@section('content')

	@foreach($groups as $group)
		<h4 class="title">{{ $group->group_name }}</h4>
		@each('forum.mobile._list', $group->forums()->active()->orderBy('created', 'DESC')->limit(10)->get(), 'a')
	@endforeach

	@include('forum._group', ['group' => null])

	<a href="/forum/create">
		<img class="profile img-circle" data-name="+" style="position:fixed;bottom:20px;right:20px;" data-font-size="40" />
	</a>

@stop
