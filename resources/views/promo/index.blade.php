@extends('layouts.main')

@section('title') Promo @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'PROMO',
		]
	])

@stop

@section('content')

@section('content')


	<div class="row">
		<div class="col-md-9">
			<h4 class="title">SALWA PROMO</h4>

			@foreach ($promos as $p)
				<p><a href="{{ $p->url }}"><img src="http://www.salamdakwah.com/{{ $p->img_banner }}" alt="" class="img img-responsive img-thumbnail" style="width:100%" /></a></p>
			@endforeach

			<nav class="text-center">
				{!! $promos->links() !!}
			</nav>

		</div>

		<div class="col-md-3">
			@include('home.sidebar')
		</div>
	</div>

@stop
