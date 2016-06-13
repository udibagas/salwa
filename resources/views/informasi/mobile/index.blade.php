@extends('layouts.main')

@section('title', 'Salwa Info')

@section('content')

<h4 class="title">SALWA INFO</h4>
@each('informasi.mobile._list', $informasis, 'a')

<div class="text-center">
	{!! $informasis->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
</div>

@include('informasi._group')

@stop
