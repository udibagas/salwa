@extends('layouts.main')

@section('title', 'Salwa Audio')

@section('content')

	<h4 class="title">SALWA AUDIO</h4>
	@each('audio.mobile._list', $audios, 'a')
	<div class="text-center">
		{!! $audios->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
	</div>
	@include('audio._group')

	@if (auth()->check() && auth()->user()->isAdmin())
	<a href="/audio/create">@include('layouts.add-btn-mobile')</a>
	@endif

@stop
