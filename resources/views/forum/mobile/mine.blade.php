@extends('layouts.main')

@section('title', 'Forum Saya')

@section('content')

	<h4 class="title">FORUM SAYA</h4>
	@each('forum.mobile._list', $forums, 'a')

	<div class="text-center">
		{!! $forums->links() !!}
	</div>

	@include('forum._group', ['group' => null])

	<a href="/forum/create">@include('layouts.add-btn-mobile')</a>

@stop
