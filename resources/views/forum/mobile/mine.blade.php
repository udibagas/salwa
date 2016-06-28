@extends('layouts.main')

@section('title', 'Forum Saya')

@section('content')

	<h4 class="title">FORUM SAYA</h4>
	@each('forum.mobile._list', $forums, 'a')

	<div class="text-center">
		{!! $forums->links() !!}
	</div>

	@include('forum._group', ['group' => null])

	<a href="/forum/create">
		<img class="profile img-circle" data-name="+" style="position:fixed;bottom:20px;right:20px;" data-font-size="40" />
	</a>

@stop
