@extends('layouts.main')

@section('title', 'Kajian')

@section('content')

	<h4 class="title">JADWAL KAJIAN</h4>
	@each('kajian.mobile._list', $kajians, 'a')

	<div class="text-center">
		{!! $kajians->appends(['tema' => request('tema'),'ustadz_id' => request('ustadz_id'),'rutin' => request('rutin')])->links() !!}
	</div>

	@include('kajian._group')

	@if (auth()->check() && auth()->user()->isAdmin())
	<a href="/kajian/create">@include('layouts.add-btn-mobile')</a>
	@endif

@stop
