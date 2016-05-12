@extends('layouts.main')

@section('title') Tanya Ustadz @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'TANYA USTADZ',
		]
	])

@stop

@section('content')

	<div class="row">

		<div class="col-md-3">
			@include('pertanyaan._hashtag')
		</div>

		<div class="col-md-9">

			<h4 class="title"><i class="fa fa-question-circle-o"></i> TANYA USTADZ : {{ Request::get('search') }}</h4>

			@foreach ($pertanyaans as $p)
				@include('pertanyaan._list', ['p' => $p])
			@endforeach

			<nav class="text-center">
				{!! $pertanyaans->links() !!}
			</nav>

		</div>

		<!-- <div class="col-md-3">
			include('home.sidebar')
		</div> -->

	</div>

@stop
