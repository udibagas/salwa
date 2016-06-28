@extends('layouts.main')

@section('title', 'Forum')

@section('content')

	<h4 class="title"><i class="fa fa-search"></i> HASIL PENCARIAN "{{ request('search') }}"</h4>
	@each('forum.mobile._list', $forums, 'a')

	<div class="text-center">
		{!! $forums->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
	</div>

	@include('forum._group')

	<a href="/forum/create">
		<img class="profile img-circle" data-name="+" style="position:fixed;bottom:20px;right:20px;" data-font-size="40" />
	</a>

@stop
