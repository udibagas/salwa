@extends('layouts.main')

@section('title', 'Kitab & Terjemahan')

@section('content')

	<h4 class="title"><i class="fa fa-book"></i> KITAB & TERJEMAHAN</h4>
	@each('kitab.mobile._list', $kitabs, 'a')

	<div class="text-center">
		{!! $kitabs->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
	</div>

	@include('kitab._group')

@stop
