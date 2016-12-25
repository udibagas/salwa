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
		<div class="col-sm-3 hidden-xs">
			@include('peduli._group')
		</div>
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-heart-o"></i> SALWA PEDULI</h3>
				</div>
				<div class="panel-body">
					<div class="row no-gutter">
						@foreach ($pedulis as $a)
						@include('peduli._list', ['peduli' => $a])
						@endforeach
					</div>
				</div>
			</div>

			<nav class="text-center">
				{!! $pedulis->links() !!}
			</nav>
		</div>
	</div>

@stop
