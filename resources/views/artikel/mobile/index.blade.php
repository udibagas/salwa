@extends('layouts.main')

@section('title', 'Salwa Aktual')

@section('content')

<h4 class="title">SALWA AKTUAL</h4>
@each('artikel.mobile._list', $artikels, 'a')

<div class="text-center">
	{!! $artikels->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
</div>

@include('artikel._group')

@stop
