@extends('layouts.main')

@section('title', 'Salwa Aktual')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/artikel' => 'AKTUAL'
		]
	])

@stop

@section('content')

@include('artikel._group')

<h4 class="title">SALWA AKTUAL</h4>
@each('artikel.mobile._list', $artikels, 'a')

<div class="text-center">
	{!! $artikels->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
</div>

@stop
