@extends('layouts.main')

@section('title') Forum @stop

@section('content')

	@foreach($groups as $group)
		<h4 class="title">{{ strtoupper($group->group_name) }}</h4>
		@each('forum.mobile._list', $group->forums()->active()->orderBy('created', 'DESC')->limit(10)->get(), 'a')
		<div class="row-post text-center text-bold">
			<a href="/forum-category/{{ $group->group_id }}-{{ str_slug($group->group_name) }}">MORE</a>
		</div>
	@endforeach

	@include('forum._group', ['group' => null])

	<a href="/forum/create">@include('layouts.add-btn-mobile')</a>

@stop
