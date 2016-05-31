@extends('layouts.main')

@section('title') Forum @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'FORUM',
		]
	])

@stop

@section('content')

	<div class="row">

		<div class="col-md-3">
			@include('forum._group', ['group' => null])
		</div>

		<div class="col-md-9">

			<h4 class="title"><i class="fa fa-clock-o"></i> FORUM TERBARU</h4>

			@foreach ($groups as $g)
				@include('forum._list', ['group' => $g])
			@endforeach

		</div>

	</div>

@stop
