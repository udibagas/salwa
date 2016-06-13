@extends('layouts.main')

@section('title', 'Salwa Peduli')

@section('content')

	<h4 class="title"><i class="fa fa-heart-o"></i> SALWA PEDULI</h4>
	@each('peduli.mobile._list', $pedulis, 'a')

	<div class="text-center">
		{!! $pedulis->links() !!}
	</div>

	@include('peduli._group')

@stop
