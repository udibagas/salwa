@extends('layouts.main')

@section('title') Salwa Peduli @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'SALWA PEDULI',
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-md-3">
			@include('peduli._group')
		</div>
		<div class="col-md-9">
			<h4 class="title"><i class="fa fa-heart-o"></i> SALWA PEDULI</h4>
			<div class="row no-gutter">
				@foreach ($pedulis as $a)
					@include('peduli._list', ['peduli' => $a])
				@endforeach
			</div>

			<nav class="text-center">
				{!! $pedulis->links() !!}
			</nav>
		</div>
	</div>

@stop
