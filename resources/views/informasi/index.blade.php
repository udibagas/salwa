@extends('layouts.main')

@section('title') Informasi @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'INFORMASI'
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-sm-3 col-md-3 hidden-xs">
			@include('informasi._group')
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-info-circle"></i> INFORMASI</h3>
				</div>
				<div class="panel-body">
					<div class="row no-gutter">
						@foreach ($informasis as $a)
						@include('informasi._list', ['informasi' => $a])
						@endforeach
					</div>
				</div>
			</div>

			<nav class="text-center">
				{!! $informasis->appends(['search' => request('search'),'group_id' => request('group_id')])->links() !!}
			</nav>
		</div>
	</div>

@stop
