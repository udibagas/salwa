@extends('layouts.main')

@section('title', 'Murottal')

@section('content')

	<h4 class="title"><i class="fa fa-music"></i> MUROTTAL</h4>
	@each('murottal.mobile._list', $murottals, 'a')
	<div class="text-center">
		{!! $murottals->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
	</div>
	@include('murottal._group')

@stop
