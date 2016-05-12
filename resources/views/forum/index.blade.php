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
			@include('forum.list-category', ['group' => null])
		</div>

		<div class="col-md-9">

			<h4 class="title"><i class="fa fa-clock-o"></i> FORUM TERBARU</h4>

			<div style="border:1px solid #8EC7FB;">
				@foreach ($groups as $g)
					@include('forum._list', ['group' => $g])
				@endforeach
			</div>

		</div>

		<!-- <div class="col-md-3">
			include('home.sidebar')
		</div> -->

	</div>

@stop
