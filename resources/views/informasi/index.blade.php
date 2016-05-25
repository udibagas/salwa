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
		<div class="col-md-3">
			@include('informasi._group')
		</div>
		<div class="col-md-9">
			<h4 class="title"><i class="fa fa-info-circle"></i> INFORMASI</h4>
			<div class="row no-gutter">
				@foreach ($informasis as $a)
					@include('informasi._list', ['informasi' => $a])
				@endforeach
			</div>

			<nav class="text-center">
				{!! $informasis->links() !!}
			</nav>
		</div>
	</div>

@stop
