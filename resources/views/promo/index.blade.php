@extends('layouts.main')

@section('title', 'Promo')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'PROMO',
		]
	])

@stop

@section('content')

	<div class="row">
		<div class="col-md-3">
			@include('promo._group')
		</div>
		<div class="col-md-9">
			<h4 class="title">SALWA PROMO</h4>

			@foreach ($promos as $p)
				<p><a href="{{ $p->url }}" target="_blank"><img src="/{{ $p->img_banner }}" alt="" class="img img-responsive img-thumbnail" style="width:100%" /></a></p>
			@endforeach

			<nav class="text-center">
				{!! $promos->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
			</nav>

		</div>
	</div>

@stop
