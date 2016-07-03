@extends('layouts.main')

@section('title', 'Video')

@section('content')

	<h4 class="title">SALWA VIDEO</h4>
	@each('video.mobile._list', $videos, 'a')

	<nav class="text-center">
		{{ $videos->appends(['search' => request('search'), 'user_id' => request('user_id')])->links() }}
	</nav>

	@include('video._group')

	@if (auth()->check() && auth()->user()->isAdmin())
	<a href="/video/create">@include('layouts.add-btn-mobile')</a>
	@endif

@stop
