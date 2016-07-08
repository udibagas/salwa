@extends('layouts.main')

@section('title', 'Forum Saya')

@section('content')

	<h4 class="title">FORUM SAYA</h4>
	<div id="post-list">
		@each('forum.mobile._list', $forums, 'a')
	</div>

	@if ($forums->lastPage() > 1)
		<div class="text-center text-bold">
			<img src="/images/loading.png" alt="" class="loading hidden" /><br>
			<a href="{{ $forums->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
		</div>
	@endif

	@include('forum._group', ['group' => null])

	<a href="/forum/create">@include('layouts.add-btn-mobile')</a>

@stop
