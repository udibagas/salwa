@extends('layouts.main')

@section('title', 'Salwa Images')

@section('content')

	<h4 class="title"><i class="fa fa-image"></i> SALWA IMAGES</h4>
	<div class="row-post">
		@each('image.mobile._list', $images, 'a')
	</div>

	<div class="text-center">
		{{ $images->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() }}
	</div>

	@include('image._group')

	@if (auth()->check() && auth()->user()->isAdmin())
	<a href="/image/create">@include('layouts.add-btn-mobile')</a>
	@endif

@stop
