@extends('layouts.main')

@section('title') Aktual @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/artikel' => 'AKTUAL'
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-sm-3 hidden-xs">
			@include('artikel._group')
		</div>
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-clock-o"></i> AKTUAL</h3>
				</div>
				<div class="panel-body">
					<div class="row no-gutter">
						@foreach ($artikels as $a)
						@include('artikel._list', ['artikel' => $a])
						@endforeach
					</div>
				</div>
			</div>

			<nav class="text-center">
				{!! $artikels->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
			</nav>
		</div>
	</div>

@stop
